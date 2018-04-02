<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    protected $currentUser;

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Published proposals
    public function proposalsPublished()
    {
      $currentUser = DB::table('users')
                                        ->where('id', Auth::user()->id)
                                        ->first();
      $proposals = DB::table('proposals')
                                        ->where('created_by', $currentUser->id)
                                        ->where('status', 1)
                                        ->get();
      return view('user.proposalsPublished', ['proposals'=>$proposals]);
    }

    // Pending proposals
    public function proposalsPending()
    {
      $currentUser = DB::table('users')
                                        ->where('id', Auth::user()->id)
                                        ->first();
      $proposals = DB::table('proposals')
                                        ->where('created_by', $currentUser->id)
                                        ->where('status', 0)
                                        ->get();
      // dd($proposals);
      return view('user.proposalsPending', ['proposals'=>$proposals]);
    }

    // Published proposals
    public function proposalsUnpublished()
    {
      $currentUser = DB::table('users')
                                        ->where('id', Auth::user()->id)
                                        ->first();
      $proposals = DB::table('proposals')
                                        ->where('created_by', $currentUser->id)
                                        ->where('status', 2)
                                        ->get();

      return view('user.proposalsUnpublished', ['proposals'=>$proposals]);
    }

    public function accountSettings()
    {
        return view('user.accountSettings');
    }

    // Offer creating a proposal
    public function createProposal()
    {
        return view('user.createProposal');
    }
    // Insert Proposal to db
    public function saveProposal(Request $request)
    {

      // app('profanityFilter')->replaceWith('#')->replaceFullWords(false)->filter($request->input('title'));

      // Validator::make($request->input('title'), 'profanity', 'Offensive words detected.');

      $this->validate($request, [
        'title'=> 'required|profanity|max:255',
        'description'=> 'required|profanity'
      ]);

      DB::table('proposals')->insert([
        'title' => $request->title,
        'description' => $request->description,
        'created_by'  => Auth::user()->id
      ]);
      return redirect()->back()->with('status', 'Proposal has been submitted for approval.');
    }


    public function viewProposal($id)
    {
      $proposal = DB::table('proposals')
                                  ->where('proposals.id', $id)
                                  ->first();

      return view('user.proposalView', ['proposal'=>$proposal]);
    }


    // vote on a proposal, only once, if logged incl
    public function voteProposal($id)
    {

      $hasVote = DB::table('user_votes')
                              ->where('proposal_id', $id)
                              ->where('user_id', Auth::id())
                              ->value('vote');

      if(!$hasVote) {

        DB::table('proposals')->where('id', $id)->increment('votes');

        DB::table('user_votes')->insert([
          'user_id'     => Auth::id(),
          'proposal_id' => $id,
          'vote'        => 1
        ]);

        return redirect()->back()->with('status', 'Thanks for your vote!!');

      } else {
        return redirect()->back()->with('status', 'You have already given your vote on this proposal.');
      }

    }

}
