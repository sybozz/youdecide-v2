<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
      $proposals = DB::table('proposals')->where('status', 1)->orderBy('id', 'DESC')->get();
      return view('website.recentProposals', ['proposals'=>$proposals]);
    }

    // public function createProposals()
    // {
    //     return view('website.postProposal');
    // }



    // Show no vote proposalsPending
    public function novoteProposals()
    {
      $proposals = DB::table('proposals')->where('total_votes', 0)->where('status', 1)->orderBy('id', 'DESC')->get();
      return view('website.proposalNoVotes', ['proposals'=>$proposals]);
    }


//    Results
    public function proposalsResult()
    {
        $proposals = DB::table('results')
            ->join('proposals', 'results.proposal_id', '=', 'proposals.id')
            ->get();
        return view('website.results', ['proposals' => $proposals]);
    }


}
