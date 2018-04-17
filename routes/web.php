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
Route::get('proposals/recent', 'WebsiteController@index');
Route::get('proposals/no-vote', 'WebsiteController@novoteProposals');
Route::get('proposals/results', 'WebsiteController@proposalsResult');




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

Route::post('user/profile/update/{id}', 'UserController@profileUpdate');

Route::get('user/report/issue', function() {
    return "Coming soon.";
});

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

Route::get('proposals/pending', 'Manager\ProposalController@pendingProposals');
Route::get('proposals/blocked', 'Manager\ProposalController@blockedProposals');
Route::get('proposal/show/{id}', 'Manager\ProposalController@showProposal');
Route::get('proposal/edit/{id}', 'Manager\ProposalController@editProposal');
Route::post('proposal/update/{id}', 'Manager\ProposalController@updateProposal');
Route::get('proposal/approve/{id}', 'Manager\ProposalController@proposalApprove');
Route::get('proposal/disapprove/{id}', 'Manager\ProposalController@proposalDisapprove');

Route::get('account/user/all', 'Manager\ManagerController@getAllUsers');

Route::post('manager/profile/update/{id}', 'Manager\ManagerController@profileUpdate');






/*
* Admin Auth routes
*/
Route::get('admin-login', 'Admin\Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('admin-login', 'Admin\Auth\LoginController@login');
Route::get('admin/home', 'Admin\AdminController@index');

Route::get('account/manager/create', 'Admin\AdminController@managerCreate');
Route::post('account/manager/save', 'Admin\AdminController@saveManager');

Route::get('accounts/manager/all', 'Admin\AdminController@managerAccounts');
Route::get('accounts/manager/suspended', 'Admin\AdminController@blockedManagers');
Route::get('accounts/user/all', 'Admin\AdminController@userAccounts');
Route::get('accounts/user/suspended', 'Admin\AdminController@blockedUsers');

Route::get('accounts/manager/active/{id}', 'Admin\AdminController@managerAccountEnable');
Route::get('accounts/manager/block/{id}', 'Admin\AdminController@managerAccountDisable');
Route::get('accounts/manager/delete/{id}', 'Admin\AdminController@deleteManagerAccount');

Route::get('accounts/user/active/{id}', 'Admin\AdminController@userAccountEnable');
Route::get('accounts/user/block/{id}', 'Admin\AdminController@userAccountDisable');
Route::get('accounts/user/delete/{id}', 'Admin\AdminController@deleteUserAccount');

Route::get('proposals/all', 'Admin\AdminController@proposalsAll');
Route::get('proposal/delete/{id}', 'Admin\AdminController@proposalDelete');
Route::get('proposals/top-votes', 'Admin\AdminController@proposalsListByVote');
Route::get('proposal/authorize/{id}', 'Admin\AdminController@proposalAuthorize');
Route::get('proposal/publish/{id}', 'Admin\AdminController@proposalPublish');
Route::get('proposal/unpublish/{id}', 'Admin\AdminController@proposalUnpublish');
Route::get('proposals/authorized/all', 'Admin\AdminController@proposalAuthorizedList');
Route::get('proposals/unpublished/all', 'Admin\AdminController@proposalUnpublishedList');
Route::get('proposal/display/{id}', 'Admin\AdminController@displayProposal');


























//
