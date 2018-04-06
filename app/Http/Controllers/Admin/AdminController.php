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
      $managers = DB::table('managers')->get();
      return view('admin.accountManagers', ['managers'=>$managers]);
    }

    // list of user accounts
    public function userAccounts()
    {
      $users = DB::table('users')->get();
      return view('admin.accountUsers', ['users'=>$users]);
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





    // get all proposals list
    public function proposalsAll()
    {
//        status 1 : approved
        $proposals = DB::table('proposals')->orderBy('id', 'DESC')->get();
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
            ->where('proposals.status', 2)
            ->get();
        return view('admin.unpublishedProposals', ['proposals'=>$proposals]);
    }


//    display proposal by id
    public function displayProposal($id)
    {
        $proposal = DB::table('proposals')->where('id', $id)->first();
        return view('admin.displayProposal', ['proposal'=>$proposal]);
    }


}
