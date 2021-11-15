<?php

namespace App\Http\Controllers;

use App\Project;
use App\Message;
use App\Transaction;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

         dd($paymentDetails);
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
            $downloadlink = $project->file_path;
            // dd($downloadlink);


            //return a partial view with variable--project-- through ajax
            return view('web.research.index', compact('project'));

        }
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
}