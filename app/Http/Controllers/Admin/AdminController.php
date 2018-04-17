<?php

namespace App\Http\Controllers\Admin;

use App\Proposal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Manager;
use App\Vote;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $users = User::count();
        $managers = Manager::count();
        $proposals = Proposal::count();
        $votes = Vote::count();
        return view('admin.home', [
            'users'=>$users,
            'managers'=>$managers,
            'proposals'=>$proposals,
            'votes'=>$votes,
        ]);
    }


    // Create new manager account show form
    public function managerCreate()
    {
      return view('admin.managerCreate');
    }

    // Save manager account
    public function saveManager( Request $request )
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);
      DB::table('managers')->insert([
        'name'    => $request->input('name'),
        'email'    => $request->input('email'),
        'password'    => bcrypt($request->input('password'))
      ]);
      return redirect()->back()->with('status', 'Manager account created successfully.');
    }

    // Manager accounts list
    public function managerAccounts()
    {
      $managers = DB::table('managers')->where('isActive', 1)->get();
      return view('admin.accountManagers', ['managers'=>$managers]);
    }
    // Manager accounts list - suspended or blocked accounts
    public function blockedManagers()
    {
      $managers = DB::table('managers')->where('isActive', 0)->get();
      return view('admin.blockedManagers', ['managers'=>$managers]);
    }
    //
    // Manager account activate by id
    //
    public function managerAccountEnable($id)
    {
        DB::table('managers')->where('id', $id)->update([
            'isActive'=>1
        ]);
        return redirect()->back()->with('status', 'Account activated.');
    }

    //
    // Manager account deactivate by id
    //
    public function managerAccountDisable($id)
    {
        DB::table('managers')->where('id', $id)->update([
            'isActive'=>0
        ]);
        return redirect()->back()->with('status', 'Account blocked!!.');
    }
    //
    // Manager account delete by id
    //
    public function deleteManagerAccount($id)
    {
        DB::table('managers')->where('id', $id)->delete();
        return redirect()->back()->with('status', 'Account deleted!!.');
    }

    // list of user accounts
    public function userAccounts()
    {
      $users = DB::table('users')->where('isActive', 1)->get();
      return view('admin.accountUsers', ['users'=>$users]);
    }
    // list of user accounts - blocked
    public function blockedUsers()
    {
      $users = DB::table('users')->where('isActive', 0)->get();
      return view('admin.blockedUsers', ['users'=>$users]);
    }

    //
    // user account activate by id
    //
    public function userAccountEnable($id)
    {
      DB::table('users')->where('id', $id)->update([
        'isActive'=>1
      ]);
      return redirect()->back()->with('status', 'Account activated.');
    }

    //
    // Manager account deactivate by id
    //
    public function userAccountDisable($id)
    {
      DB::table('users')->where('id', $id)->update([
        'isActive'=>0
      ]);
      return redirect()->back()->with('status', 'Account blocked!!.');
    }
    // Manager account deactivate by id
    //
    public function deleteUserAccount($id)
    {
      DB::table('users')->where('id', $id)->delete();
      return redirect()->back()->with('status', 'Account deleted!!.');
    }





    // get all proposals list
    public function proposalsAll()
    {
//        status 1 : approved
        $proposals = DB::table('proposals')->where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.proposalsAll', ['proposals'=>$proposals]);
    }

    // delete a proposal by id
    public function proposalDelete($id)
    {
//        status 1 : approved
        DB::table('proposals')->where('id', $id)->delete();
        return back()->with('status', 'Successfully deleted!');
    }

    // get top voted proposals list
    public function proposalsListByVote()
    {
//        status 1 : approved
        $proposals = DB::table('proposals')->where('status', 1)->orderBy('total_votes', 'DESC')->get();
        return view('admin.proposalsListByVote', ['proposals'=>$proposals]);
    }


//    Authorize a proposal
    public function proposalAuthorize($id)
    {
        DB::table('results')->insert([
            'proposal_id' => $id
        ]);
        DB::table('proposals')->where('id', $id)->update([
            'status' => 9 //status: 9 set to result
        ]);
        return back()->with('status', 'Proposal authorized.');
    }


//    list of all authorized proposals
    public function proposalAuthorizedList()
    {
        $proposals = DB::table('results')
            ->join('proposals', 'results.proposal_id', '=', 'proposals.id')
            ->where('proposals.status', 9)
            ->orderBy('results.created_at', 'DESC')
            ->get();
        return view('admin.proposalsAuthorized', ['proposals'=>$proposals]);
    }
//    list of all authorized proposals
    public function proposalUnpublishedList()
    {
        $proposals = DB::table('proposals')
            ->join('managers', 'proposals.approved_by', '=', 'managers.id')
            ->where('proposals.status', 2)
            ->select('proposals.*', 'managers.name')
            ->get();

        return view('admin.unpublishedProposals', ['proposals'=>$proposals]);
    }

    public function proposalPublish($pid)
    {
       DB::table('proposals')
            ->where('id', $pid)
            ->update([ 'status' => 1]);

       return redirect()->back()->with('status', 'Proposal published.');
    }

    public function proposalUnpublish($pid)
    {
       DB::table('proposals')
            ->where('id', $pid)
            ->update([ 'status' => 2]);

       return redirect()->back()->with('status', 'Proposal unpublished.');
    }


//    display proposal by id
    public function displayProposal($id)
    {
        $proposal = DB::table('proposals')->where('id', $id)->first();
        return view('admin.displayProposal', ['proposal'=>$proposal]);
    }


}
