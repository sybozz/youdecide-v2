<?php

namespace App\Http\Controllers\Manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ManagerController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth:manager');
  }

  // Profile as home
  public function index()
  {
    $manager = DB::table('managers')->where('id', Auth::id())->first();

    return view('manager.profile', ['manager' => $manager]);
  }


  // Update Profile
  public function updateProfile(Request $request)
  {
    DB::table('managers')->where('id', Auth::id())->update([
      'name' => $request->input('name'),
      'email' => $request->input('email')
    ]);

    return redirect()->back()->with('status', 'Profile updated.');
  }












}
