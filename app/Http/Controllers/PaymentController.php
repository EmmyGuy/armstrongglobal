<?php

namespace App\Http\Controllers;

// require_once 'HTTP/Request2.php';

use App\Project;
use App\Message;
use App\Transaction;


use Illuminate\Http\Request;
use Illuminate\Http\Client;
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

    public function showPaymentValidation()
    {
        $projects = null;
        return view('admin.paymentvalidation', compact('projects'));
    }


    public function confirmPay(Request $request)
    {
        // dd($request);
        // $request = new HTTP_Request2();
        // $request->setUrl('http://www.remitademo.net/remita/ecomm/{{merchantId}}/{{rrr}}/{{apiHash}}/status.reg');
        // $request->setMethod(HTTP_Request2::METHOD_GET);
        // $request->setConfig(array(
        // 'follow_redirects' => TRUE
        // ));
        // $request->setHeader(array(
        // 'Content-Type' => 'application/json',
        // 'Authorization' => 'remitaConsumerKey={{merchantId}},remitaConsumerToken={{apiHash}}'
        // ));
        // try {
        // $response = $request->send();
        // if ($response->getStatus() == 200) {
        //     echo $response->getBody();
        // }
        // else {
        //     echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
        //     $response->getReasonPhrase();
        // }
        // }
        // catch(HTTP_Request2_Exception $e) {
        // echo 'Error: ' . $e->getMessage();
        // }
        $apiKey = "142368";
        $merchantId = "540814763";
        $rrr = $request->ref;
        $email = $request->email;
        $apiHash = hash('sha256', $rrr + $apiKey + 350576529261);
        // $client = new http\Client;
        // $request = new http\Client\Request;
        // $request->setRequestUrl('http://www.remitademo.net/remita/ecomm/{{$merchantId}}/{{$rrr}}/{{$apiHash}}/status.reg');
        // $request->setRequestMethod('GET');
        // $request->setOptions(array());
        // $request->setHeaders(array(
        // 'Content-Type' => 'application/json',
        // 'Authorization' => 'remitaConsumerKey={{$merchantId}},remitaConsumerToken={{$apiHash}}'
        // ));
        // $client->enqueue($request)->send();
        // $response = $client->getResponse();
        // dd($response->getBody());

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://www.remitademo.net/remita/ecomm/{{'.$merchantId.'}}/{{'.$rrr.'}}/{{'.$apiHash.'}}/status.reg',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: remitaConsumerKey={{'.$merchantId.'}},remitaConsumerToken={{'.$apiHash.'}}'
        ),
        ));
        dd($curl);
        $response = curl_exec($curl);

        curl_close($curl);
        dd($response);

        return view();
    }
}