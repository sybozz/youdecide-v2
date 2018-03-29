<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
      // if (Auth::user()->role != 2) {
      //   redirect('/');
      // }
    }


    public function index()
    {
      // 
    }

    public function pendingList()
    {
      return view('manager.pendingProposals');
    }

    public function trendingList()
    {
      return view('manager.trendingDebates');
    }
}
