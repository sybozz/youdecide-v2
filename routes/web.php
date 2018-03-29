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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
 *
 * Website routes
 * */
Route::get('/recent-proposals', 'WebsiteController@index');




/*
 * UserController
 * */
Route::get('/activity/published', 'UserController@proposalsPublished');
Route::get('/activity/pending', 'UserController@proposalsPending');
Route::get('/activity/unpublished', 'UserController@proposalsUnpublished');
Route::get('/account', 'UserController@accountSettings');
Route::get('/create-proposal', 'UserController@createProposal');
Route::post('/proposal/save', 'UserController@saveProposal');
Route::get('proposal/view/{id}', 'UserController@viewProposal');
Route::get('proposal/vote/{id}', 'UserController@voteProposal');
/*
 *
 * ProposalController
 * */
// Route::post('/proposal/save', 'ProposalController@insert');



/*
 * Manager routs
 * */
// Route::get('/manager', 'ManagerController@index');
// Route::get('/pending-proposals', 'ManagerController@pendingList');
// Route::get('/trending-debates', 'ManagerController@trendingList');


// Route::get('manager-login', function() {
//   return view('manager.auth.login');
// });



Route::get('manager-login', 'Manager\Auth\LoginController@showLoginForm')->name('manager.login');
Route::post('manager-login', 'Manager\Auth\LoginController@login');
Route::get('/manager/home', 'Manager\ManagerController@index');
Route::get('/manager/profile', 'Manager\ManagerController@index');

Route::get('pending-proposals', 'Manager\ProposalController@pendingProposals');
Route::get('proposal/detail/{id}', 'Manager\ProposalController@showProposal');
Route::get('proposal/approve/{id}', 'Manager\ProposalController@proposalApprove');
Route::get('proposal/disapprove/{id}', 'Manager\ProposalController@proposalDisapprove');

Route::post('manager/profile/update', 'Manager\ManagerController@updateProfile');





/*
* Admin Auth routes
*/
Route::get('admin-login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login', 'Admin\Auth\LoginController@login');
Route::get('admin/home', 'Admin\AdminController@index');

Route::get('accouts/manager/create', 'Admin\AdminController@managerCreate');
Route::post('accouts/manager/save', 'Admin\AdminController@saveManager');

Route::get('accouts/manager', 'Admin\AdminController@managersAccount');
Route::get('accouts/user', 'Admin\AdminController@usersAccount');

Route::get('proposals/top-voted', 'Admin\AdminController@proposalsListByVote');
























//
