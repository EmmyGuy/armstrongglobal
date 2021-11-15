<?php

namespace App\Http\Controllers;

use App\Project;
use App\Message;
use App\Transaction;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Yajra\Datatables\Facades\Datatables;
use App\Http\Requests\ProjectAddRequest;

use Paystack;
use Alert;
use Validator;
use DB;
use Session;

// use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display index/landing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('visible', '=', 1)->get();
        return view('web.book-master.index', compact('projects'));
    }

    /**
     * Display about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('web.about');
    }

    /**
     * Display Services page.
     *
     * @return \Illuminate\Http\Response
     */
    public function services()
    {
        return view('web.services');
    }

    /**
     * Display Services page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('web.contact');
    }

    /**
     * Display Services page.
     *
     * @return \Illuminate\Http\Response
     */
    public function research()
    {
        $projects = Project::where('visible', '=', 1)->get();
        return view('web.research.index', compact('projects'));
    }

    /**
     * show Project (Modal) on research.index page
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
     * Display Services page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCheckOutPage($id, $email, $transact_id)
    {
        // dd($transact_id);
        $project = Project::find($id);
        // dd($project);
        $price   = $project->price;
        $title   = $project->title;

        $transaction = Transaction::find($transact_id);
       // dd($transaction);
        $buyer = ['email'=>$email, 'price'=>$price, 'title'=>$title, 'transact_id'=>$transact_id, 'transactRef'=>$transaction->authorization_code];
        // dd($buyer['email']);
        //return view('web.research.checkOutModal', compact('buyer'))->render();
        $modaldata['buyer'] = $buyer;
        $modaldata['view'] = view('web.research.checkOutModal')->render();

        return ($modaldata);
    }

    /**
     * Send Message to admin
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMessage(Request $request)
    {
        //   dd($request);
        // return response()->json($request);
        $message = new Message;

        $message->user_email    = $request->contact_email;
        $message->full_name     = "Client User";
        $message->phone_number  = "+1234567890";
        $message->message       = $request->contact_message;
        $message->subject       = $request->contact_subject;
        $message->status_id     = 2;
        $message->visible       = 1;
        // return response()->json($message);
        if($message->save()){
            Alert::message('Your message has been sent success!');
            $alert = "Your message has been sent success. Please check your email for response after 24 hours";
        }else{
            $Alert::message('messagewas not sent, Please try again');
            $alert = "Your message was not sent success. Please try again";
        }
        return response()->json($alert);
        //return redirect()->action('UserController@index');
    }

    /**
     * save buyer contacts
     *
     * @return \Illuminate\Http\Response
     */
    public function saveBuyerContacts(Request $request)
    {
         //dd($request);
        //return response()->json($request);
        $transact = new Transaction;

        $transact->price            = $request->Price;
        $transact->buyer_email      = $request->email;
        $transact->buyer_phone_num  = $request->phone;
        $transact->status_id        = 1;
        $transact->visible        = 1;
        $transact->project_id       = $request->id;
        $transact->authorization_code  = Paystack::genTranxRef();
        
        if($transact->save()){
            $alert = "Your message has been sent success. Please check your email for response after 24 hours";
        }else{
            $alert = "message was not sent, Please try again";
        }
                //  dd($transact["id"]);

        return response()->json($transact->id);
    }

    /**
     * update buyer contacts with transaction reference
     *
     * @return \Illuminate\Http\Response
     */
    public function updateBuyerContactsWithTransactRef(Request $request)
    {
        // dd($request);
        //return response()->json($request->reference);
        $transact = Transaction::find($request->orderID);
         //return response()->json($transact);

        $transact->remember_token     = $request->reference;
        
        if($transact->save()){
            $alert = "data updated successfully";
        }else{
            $alert = "data not updated, Please try again";
        }
        return response()->json($alert);
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

         var_dump($paymentDetails);
        $transaction_id     = $paymentDetails['data']['id'];
        $transaction_date   = $paymentDetails['data']['transaction_date'];
        $transaction_status = $paymentDetails['data']['status'];
        $transaction_ref    = $paymentDetails['data']['reference'];
        $client_auth_code   = $paymentDetails['data']['authorization']['authorization_code'];

        $transact = Transaction::where('remember_token', '=', $transaction_ref)->first();
        // dd($transact->project_id);
        // check if payment was successful and update datebase
        if($transaction_status == 'success' && !empty($transact)){
            // $transact = Transaction::where('remember_token', '=', $transaction_ref)->first();
            $transact->status_id          = 2;
            $transact->authorization_code = $client_auth_code;

            $transact->save();

            //get project name and create downloadlink
            $project = Project::find($transact->project_id);
            $downloadlink =   $project->file_name;

            Session::flash('downloadLink', $downloadlink);
            return redirect()->action('UserController@index');

        }
        dd('Error');
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function download( $filename = '' )
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() . "/app/projects/" . $filename;
        $headers = array(
            'Content-Type: docx',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );
        } else {
            // Error
            exit( 'Error, please check the email you supplied for download link!' );
        }
    }

    /**
     * Get all projects name and return a list.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllProjectsName()
    {
        $projects = Project::where('visible', '=', 1)->select('title')->get();
        $result = json_decode(json_encode($projects, true));
    return ($result);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
