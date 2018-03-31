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


  //
  // Get proposal by idea
  //
  protected function getProposalById($pid)
  {
    return DB::table('proposals')
                    ->join('users', 'proposals.created_by', '=', 'users.id')
                    ->select('proposals.*', 'users.name')
                    ->where('proposals.id', $pid)
                    ->first();
  }
  // Show proposal
  public function showProposal($id)
  {
    $proposal = $this->getProposalById($id);
    return view('manager.showProposal', ['proposal'=>$proposal]);
  }
  // Edit profile by idea
  public function editProposal( $id )
  {
    $proposal = $this->getProposalById($id);
    return view('manager.proposalEdit', ['proposal'=>$proposal]);
  }

  // update profile by idea
  public function updateProposal( Request $request, $id )
  {
    $proposal = DB::table('proposals')
                                ->where('id', $id)
                                ->update([
                                  'title'         => $request->input('title'),
                                  'description'   => $request->input('description'),
                                ]);
    return redirect()->back()->with('status', 'Proposal updated successfully!');
  }
  //
  // Function Approve a proposal by its id
  //
  protected function approveProposalById($pid)
  {
    return DB::table('proposals')
                      ->where('id', $pid)
                      ->update([ 'status' => 1, 'approved_by' => Auth::id() ]);
  }
  // Approve a proposal
  public function proposalApprove($id)
  {
    $this->approveProposalById($id);
    return redirect()->back()->with('status', 'Proposal approved.');
  }
  //
  // Function :: disapprove proposal by id
  //
  protected function disapproveProposalById($pid)
  {
    return DB::table('proposals')
                      ->where('id', $id)
                      ->update([ 'status' => 2, 'approved_by' => Auth::id() ]);
  }
  // Disapprove proposal
  public function proposalDisapprove($id)
  {
    $this->disapproveProposalById($id);
    return redirect()->back()->with('status', 'Proposal disapproved!!');
  }




}
