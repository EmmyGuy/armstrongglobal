<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Mail\MyMail; 

// Route::get('/', function () {
//     return view('welcome');
// });

//Users controllers
Route::get('/template', 'UserController@template');
Route::get('/', 'UserController@index');
Route::get('/about', 'UserController@about');
Route::get('/services', 'UserController@services');
//contact routes
//Route::get('/contact', 'UserController@contact');
Route::POST('/send-message', ['as' => 'send-message', 'uses' => 'UserController@sendMessage']);

Route::get('show-project/{id}', 'UserController@showProject');
Route::get('get-all-projects-names', 'UserController@getAllProjectsName');

//services controllers
Route::get('/services/research', ['as' => 'research', 'uses' => 'UserController@research']);
Route::post('save-buyer-contacts', ['as' => 'save-buyer-contacts', 'uses' => 'UserController@saveBuyerContacts']);
Route::get('/services/check-out/{id}/{email}/{transact_id}', 'UserController@showCheckOutPage');
Route::post('update-buyer-contacts-transact-ref', ['as' => 'update-buyer-contacts-ref', 'uses' => 'UserController@updateBuyerContactsWithTransactRef']);
Route::get( '/download/{filename}', 'PaymentController@download');


//redirects to paystack payment gateway
//handles call back from payment gateway.


Auth::routes();

Route::get('/home/{id?}', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::get('payment/callback', ['uses' => 'HomeController@handleGatewayCallback']);
Route::post('/pay', ['uses' => 'PaymentController@redirectToGateway', 'as' => 'pay']);


Route::get('show-upload', ['as' => 'show-upload-form', 'uses' => 'HomeController@showUploadForm']);

// Route::resource('show-upload', 'AdminController');

Route::post('upload-project', ['as' => 'do-upload-project', 'uses' => 'HomeController@storeProject']);

Route::get('project-list', ['as' => 'show-project-list', 'uses' => 'HomeController@showProjectList']);
// Route::get('project-list-data', ['as' => 'show-project-list.data', 'uses' => 'HomeController@allDataProjectList']);
Route::post('edit-project', ['as' => 'edit-project', 'uses' => 'HomeController@editProject']);

Route::get('show-project-edit/{id}', 'HomeController@showProjectEdit');

Route::post('delete-project', 'HomeController@deleteProject');

//get number of unread message
Route::get('get-unread-message-count', ['as' => 'get-unread-message', 'uses' => 'HomeController@unreadMessageCount']);
//get new transaction count
Route::get('get-new-transaction-count', ['as' => 'get-new-transactions', 'uses' => 'HomeController@newTransacctionCount']);

//show messages controller
Route::get('show-messages', ['as' => 'show-message', 'uses' => 'HomeController@showUnreadMessage']);

//reports --- Transaction
Route::get('transaction-report-all', ['as' => 'show-all', 'uses' => 'HomeController@showAllTransaction']);

//send Email
Route::post('send-mail', ['as' => 'send-mail', 'uses' => 'HomeController@sendMail']);

//change read message status
Route::get('change-message-status/{id}', ['as' => 'change-message-status', 'uses' => 'HomeController@changeReadMesgStatus']);


// students survey routes
Route::get('get-enter-question', ['as' => 'enter-question', 'uses' => 'HomeController@getEnterQuestion']);

Route::post('get-student', ['as' => 'get-student', 'uses' => 'HomeController@getStudent']);

Route::post('save-question', ['as' => 'save-question', 'uses' => 'HomeController@saveQuestion']);

Route::get('student-all', ['as' => 'show-all-students', 'uses' => 'HomeController@showAllStudents']);

Route::get('show-student-respondent/{id}', ['as' => 'show-student-respondent', 'uses' => 'HomeController@showStudentsRespondent']);

Route::get('payments', ['as' => 'payments', 'uses' => 'HomeController@payments']);

Route::get('application', ['as' => 'fill-form', 'uses' => 'HomeController@startApplication']);

Route::post('save-application', ['as' => 'save-application', 'uses' => 'HomeController@saveApplication']);

Route::get('print-application/{id}', 'HomeController@showPrintOutPage');

Route::get('show-validate', 'PaymentController@showPaymentValidation');

Route::post('validation', ['as' => 'send-validation', 'uses' => 'PaymentController@confirmPay']);

// });
?>