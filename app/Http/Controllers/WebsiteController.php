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
      $proposals = DB::table('proposals')->orderBy('id', 'DESC')->get();
      return view('website.recentProposals', ['proposals'=>$proposals]);
    }

    public function createProposals()
    {
        return view('website.postProposal');
    }



}
