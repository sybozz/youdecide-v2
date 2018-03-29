<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:manager');
  }

  public function pendingProposals()
  {
    $proposals = DB::table('proposals')
                                  ->join('users', 'proposals.created_by', '=', 'users.id')
                                  ->select('proposals.*', 'users.name')
                                  ->where('proposals.status', 0)
                                  ->get();

    return view('manager.pendingProposals', ['proposals'=>$proposals]);
  }


  public function showProposal($id)
  {
    $proposal = DB::table('proposals')
                                ->join('users', 'proposals.created_by', '=', 'users.id')
                                ->select('proposals.*', 'users.name')
                                ->where('proposals.id', $id)
                                ->first();
    return view('manager.proposalDetail', ['proposal'=>$proposal]);
  }


  public function proposalApprove($id)
  {
    DB::table('proposals')
                      ->where('id', $id)
                      ->update([ 'status' => 1, 'approved_by' => Auth::id() ]);
    return redirect()->back()->with('status', 'Proposal approved.');
  }



  public function proposalDisapprove($id)
  {
    DB::table('proposals')
                      ->where('id', $id)
                      ->update([ 'status' => 2, 'approved_by' => Auth::id() ]);
    return redirect()->back()->with('status', 'Proposal disapproved!!');
  }




}
