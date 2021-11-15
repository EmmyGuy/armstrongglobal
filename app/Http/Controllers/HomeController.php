<?php

namespace App\Http\Controllers;

use App\Project;
use App\Message;
use App\Transaction;
use App\Mail\MyMail;
use App\Student;
use App\Question;
use App\Response;
use App\Applications;
use App\Participant;
use App\TrainingSchedule;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\ProjectAddRequest;


use Alert;
use Validator;
use DB;
use Mail;
use Redirect;
use Paystack;
use Session;

// use Project;

class HomeController extends Controller
{
    var $last_check = 0;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        // $user = auth()->user();
        $status = null;
        // if($id != null){
            $id = (int)$id;
            $transact = Transaction::where('buyer_email', '=',  auth()->user()->email)
                                    ->select('status_id')
                                    ->get();

            $status = count($transact) > 0 ? "success" : "pending"; 
        // }
        $getUser = DB::table('user_roles')
                        ->join('users', 'user_roles.user_id', '=', 'users.id')
                        ->join('roles', 'user_roles.role_id', '=', 'roles.id')
                        // ->select('users.*', 'roles.name as roleName')
                        ->select('roles.name as roleName')
                        ->where('user_roles.user_id', '=', auth()->user()->id)
                        ->first();

        $projects = Project::where('visible', '=', 1)->get();
        
        $user = $getUser->roleName;
        Session::set('role', $user);
        Session::put('transactStatus', $status);
        // var_dump();

        return view('home', compact('user', 'projects', 'status'));
    }

    public static function getRole()
    {
        return $roleName = DB::table('user_roles')
                    ->join('users', 'user_roles.user_id', '=', 'users.id')
                    ->join('roles', 'user_roles.role_id', '=', 'roles.id')
                    ->select('roles.name as roleName')
                    ->where('user_roles.user_id', '=', auth()->user()->id)
                    ->first();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function landingPage()
    {
        return view('web.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUploadForm()
    {
        return view('admin.uploadProject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeProject(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(), [
            'project_title' => 'required|max:255',
            'project_price' => 'required|numeric',
            'abstract'      => 'required',
            //'project'      => 'mimes:doc,pdf,docx,zip',
        ]);

        if ($validator->fails()) {

            flash('Ooops! Please check your input(s).')->error();
            // flash()->overlay('Modal Message', 'Modal Title');
            // flash('You are now a Laracasts member!', 'Yay')->overlay();
            Alert::message('Oopss You have some errors!');
            return redirect('show-upload')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $project = new Project;
        $project->title = $request->project_title;
        $project->price = $request->project_price;
        $project->abstract = $request->abstract;
        $project->file_name = $request->project->getClientOriginalName();

        $path = storage_path().'/app/projects/'.$request->project->getClientOriginalName();
        $project->file_path = $path;

        // check if a file has already been uploaded
        if(file_exists($path)){
            // dd('File is exists.');
            flash('Ooops! File already Exist')->warning();
            return redirect('show-upload');
                        
        }else{

            $path = Storage::putFileAs(
                'projects', $request->file('project'), $request->project->getClientOriginalName());
            $project->save();
            // dd('File is not exists.');
            flash('File uploaded was successful')->success();
            return redirect('show-upload');

        }
        
    
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProjectList()
    {   
        $projects = Project::where('visible', '=', 1)->get();
        return view('admin.projects', compact('projects'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function allDataProjectList()
    {
        $projects = Project::where('visible', '=', 1)->get();

        $start = 1;
        return Datatables::of($projects)
        ->addColumn('sn', function($list_) use (&$start) {
                   return $start++;
                })
        ->make(true);
        // return view('home');
    }

    /**
     * show Project (Modal)
     *
     * @return \Illuminate\Http\Response
     */
    public function showProject($id)
    {

        $project = Project::find($id);
        // return Response::json($project);
        return response()->json($project);
    }

    /**
     * show Project (Modal)
     *
     * @return \Illuminate\Http\Response
     */
    public function showProjectEdit($id)
    {

        $project = Project::find($id);
        // return Response::json($project);
        return response()->json($project);
    }

    /**
     * Edit Project (Modal)
     *
     * @return \Illuminate\Http\Response
     */
    public function editProject(Request $request)
    {
        //   dd($request);
        //return response()->json($request);
        
        if ($request->file('project')->isValid()) {

            $id = $request->id;
           
            $project = Project::find($id);
            //return response()->json($project);
             

            $project->title     = $request->title;
            $project->price     = $request->price;
            $project->abstract  = $request->abstract;
            $project->file_name = $request->project->getClientOriginalName();
            $project->file_path = storage_path().'/app/projects/'.$request->project->getClientOriginalName();


            //remove existing file
            if(file_exists($project->file_path)){

                Storage::delete($project->file_name);
            }
            // File::delete($project->file_path);
            // return response()->json($project->file_path);

            //upload  file
             $path = Storage::putFileAs(
                    'projects', $request->file('project'), $request->project->getClientOriginalName());

            $project->save();
            // return response()->json($request->project->getClientOriginalName());
            return response()->json($request);
        }else{
            return response()->json('Upload fail due to Invalid file');
        }  
    }

    /**
     * Delete Project (Modal)
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteProject(Request $request)
    {
        $project = Project::find($request->id);
        $file_path = $project->file_path;
        // return response()->json($project->file_path);

        if(file_exists($project->file_path)){
                
            unlink($file_path);
            Project::find($request->id)->delete();
            // return response()->json();
            return response()->json("File successfully Deleted!");
        }else{
            return response()->json('Upload fail due to Invalid file');   
        }
    }  

    /**
     * get unread message count
     *
     * @return \Illuminate\Http\Response
     */
    public function unreadMessageCount(Request $request)
    {

        $count = DB::table('messages')
                ->where('status_id', '=', 2)
                ->count();
        return response()->json($count);
    }  

    /**
     * get new transaction count
     *
     * @return \Illuminate\Http\Response
     */
    public function newTransacctionCount(Request $request)
    {
        $last_check = 0;
        $count = 0;
        $now = time();
        // return response()->json($now );
        if($last_check == 0){
            $last_check = $now;
        }
        // if(($now - $last_check) >  60*60){
        $records = DB::table('transactions')
                ->where('status_id', '>', 0)
                ->get();

        foreach ($records as $key => $value) {
        //if last login is greater than 2 hrs ie 2*60*60

           if($now - strtotime($value->created_at) < 1*60*60){
                $count++;
           }
        }
            return response()->json($now);
    }    

    /**
     * Show selected unread messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUnreadMessage()
    {   
        $messages = Message::where('status_id', '=', 2)->get();
        // dd($messages);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllTransaction()
    {   
        // $transactions = Transaction::where('visible', '>', 0)->get();

        $transactions = DB::table('transactions')
                        ->join('projects', 'transactions.project_id', '=', 'projects.id')
                        ->select('transactions.*', 'projects.title as title')
                        ->get();
        return view('admin.transactions.reportAll', compact('transactions'));
    }

    /**
         * change read message status
         *
         * @return \Illuminate\Http\Response
         */
        public function changeReadMesgStatus($id)
        {   
            $message = Message::find($id);
            $message->status_id     = 1;
            $message->save();
            return response()->json("Email successfully sent!");
        }

    /**

     * Send My Test Mail Example

     *

     * @return void

     */

    public function sendMail(Request $request)
    {
        //dd($request);
        //return response()->json($request->reply);

        $myEmail = 'eiemmieguy93@yahoo.com';
        $userEmail        = $request->user_email;
        $replyMessage     = $request->reply;
        $sender           = $request->sender_name;
        $subject          = $request->subject;

        $data = array('message' => $replyMessage, 'sender'=>$sender, 'subject'=>$subject);
        // return response()->json($data['message']);
        // Mail::to($myEmail)->send(new MyMail());

        Mail::to($userEmail)->queue(new MyMail($data));
         // return response()->json($request->sender_name);
         return view('mails.replyMail', compact('sender'));

    }

    /**
     * Show the get student interface
     *
     * @return \Illuminate\Http\Response
     */
    public function getEnterQuestion()
    {   
       // die('here!');
        return view('admin.student.index');
    }

    /**
     * get student interface
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudent(Request $request)
    {   
       // dd($request->registration_no);

            $student = Student::where('age', '=', $request->registration_no)->first();
        // dd($student);
        return view('admin.student.show', compact('student'));
        
        
    }

    /**
     * save question via ajax form show blade
     *
     * @return \Illuminate\Http\Response
     */
    public function saveQuestion(Request $request)
    {   
       // return response()->json($request->stu_id);

       $question = new Question;
       $question->question = $request->que;
        $question->student_id = $request->stu_id;

        if($question->save()){
            $lastQuestion = Question::where('student_id', '=', $request->stu_id)->get();
            return response()->json($lastQuestion);
        }
        return response()->json('Oopss!, question not Saved');
    }

    /**
     * Show all students using the survey app.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAllStudents()
    {   
        // $transactions = Transaction::where('visible', '>', 0)->get();

        $students = Student::where('status', '=', 1)->get();

        return view('admin.student.students', compact('students'));

    }

    /**
     * Show all students using the survey app.
     *
     * @return \Illuminate\Http\Response
     */
    public function payments()
    {   
        $status = null;
        // if($id != null){
            $transact = Transaction::where('buyer_email', '=',  auth()->user()->email)
                                    ->select('status_id')
                                    ->get();

            $status = count($transact) > 0 ? "success" : "pending"; 
        // }
        $getUser = DB::table('user_roles')
                        ->join('users', 'user_roles.user_id', '=', 'users.id')
                        ->join('roles', 'user_roles.role_id', '=', 'roles.id')
                        // ->select('users.*', 'roles.name as roleName')
                        ->select('roles.name as roleName')
                        ->where('user_roles.user_id', '=', auth()->user()->id)
                        ->first();

        
        $user = $getUser->roleName;
        Session::set('role', $user);
        Session::put('transactStatus', $status);
        // $transactions = Transaction::where('visible', '>', 0)->get();
        $transactions = DB::table('transactions')
                        ->join('projects', 'transactions.project_id', '=', 'projects.id')
                        ->select('transactions.*', 'projects.title as title')
                        ->where('buyer_email', '=', auth()->user()->email)
                        ->where('status_id', '=', 2)
                        ->get();

        $applications = DB::table('applications')
                            ->join('training_schedules', 'applications.group', '=', 'training_schedules.group')
                            ->select('applications.*', 'training_schedules.*')
                            ->where('applications.email', '=', auth()->user()->email)->distinct()->get();
        // dd($applications);
        return view('admin.transaction', compact('transactions', 'applications'));

    }

    /**
     * Show student's respondents.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStudentsRespondent($id)
    {   

        // dd($id);
        $responses = Response::where('student', '=', $id)->get();

        $responseArray  = array();
        for ($i=0; $i < count($responses); $i++) { 
            # code...
            $responseArray[$i] = $responses[$i]->answer_id;
        }

        $countRes = count($responseArray);
         $questions = DB::table('students')
                            ->join('questions', 'students.id', '=', 'questions.student_id')
                            ->join('responses', 'students.age', '=','responses.Student')
                            ->where('students.age', '=', $id)
                            -> select('questions.*')
                            ->distinct()
                            ->get();

        $countQue = count($questions);

        return view('admin.student.responses.showResponses', compact('responseArray','responses', 'countQue', 'countRes'));

    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        // return response()->json($paymentDetails);
        $transaction_id     = $paymentDetails['data']['id'];
        $transaction_date   = $paymentDetails['data']['transaction_date'];
        $transaction_status = $paymentDetails['data']['status'];
        $transaction_ref    = $paymentDetails['data']['reference'];
        $client_auth_code   = $paymentDetails['data']['authorization']['authorization_code'];

        $transact = Transaction::where('authorization_code', '=', $transaction_ref)->first();
        $transactId = $transact->id;

        // check if payment was successful and update database
        if($transaction_status == 'success' && !empty($transact)){
            // $transact = Transaction::where('remember_token', '=', $transaction_ref)->first();
            $transact->status_id          = 2;
            //$transact->authorization_code = $client_auth_code;

            $transact->save();
            Session::put('transactStatus', $transaction_status);
            //get project name and create downloadlink
            $project = Project::find($transact->project_id);
            $downloadlink =   $project->file_name;


            return redirect()->action('HomeController@payments');

        }
        dd('Error');
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveApplication(Request $request)
    {
        // dd($request);
        try {
            $application = new Applications;
            $application->state                   = $request->state;
            $application->lga                     = $request->lga;
            $application->category                = $request->school_category;
            $application->group                   = Participant::getCategory($request->lga);
            $application->private_sch_category    = $request->private_cat_option;
            $application->name_of_sch             = $request->school_name;
            $application->est_year                = $request->est_date;
            $application->staff_srength           = $request->staff_strength;
            $application->num_of_std              = $request->num_std;
            $application->phone                   = $request->phone;
            $application->email                   = $request->email;
            $application->user_id                 = auth()->user()->id;
            $application->visible                 = 1;
            //return view('admin.applicationForm');

            if($application->save()){

                for($i=0; $i < count($request->fullname); $i++)
                {

                    $participant = new Participant;
                    $participant->fullname = $request->fullname[$i];
                    $participant->designation = $request->designation[$i];
                    $participant->application_id = $application->id;
                    $participant->visible = 1;
                    $participant->save();
                }
            }
        } catch (Throwable $e) {
            report($e);

            return false;
        }
        $transaction = DB::table('transactions')
                        ->join('projects', 'transactions.project_id', '=', 'projects.id')
                        ->select('transactions.*', 'projects.*')
                        ->where('transactions.id', '=', $request->transact_id)
                        ->get();
        //  dd($transaction);               
        $participants = Participant::where("application_id", "=", $application->id)->get();
        $trainingSchedule = TrainingSchedule::where("group", "=", $application->group)->first();

        $data = ['application'=>$application, 'participants'=>$participants, 'transaction'=>$transaction, 'trainingSchedule'=>$trainingSchedule];
        // dd($buyer['email']);
        //return view('web.research.checkOutModal', compact('buyer'))->render();
        $modaldata['appllicationDetail'] = $data;
        $modaldata['view'] = view('web.research.applicationPrintOut')->render();
        return ($modaldata);


        //return response()->json($application);
    }

    public function getCategory($lga){
        dd($lga);
        if($lga == 'Jos North' || $lga == 'Jos East'|| $lga == 'Bassa'){
            return 'Category A';
        }elseif($lga == 'Jos South'|| $lga == 'Riyom'|| $lga == 'B/Ladi' || $lga == 'Bokkos'){
            return 'Category B';
        }elseif($lga == 'Mangu'|| $lga == 'Pankshin'|| $lga == 'Kanam'){
            return 'Category C';
        }elseif($lga == 'Wase'|| $lga == 'Langtang North'|| $lga == 'Langtang South'){
            return 'Category D';
        }else{
            return 'Category E';
        }

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showPrintOutPage( $id)
    {
        $application = Application::find($id);
        dd($application);
    }

}
