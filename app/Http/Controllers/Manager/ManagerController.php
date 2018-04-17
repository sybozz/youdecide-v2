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
    //    Upload image
    protected function imageUpload($file, $uid)
    {
        $this->validate($file, [
            'profileImage'=> 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($file->hasFile('profileImage')) {
            $image = $file->file('profileImage');
            $name = $uid.time().'.'.$image->getClientOriginalExtension();
            $destination = 'public/manager/uploads/';
            $image->move($destination, $name);
            return $destination.$name;
        } else {
            return $file->input('current_profileImage');
        }

    }

//    update profile
    public function profileUpdate(Request $request, $id)
    {

        if ($request->password) {
            $this->validate($request, [
                'password'=> 'min:6'
            ]);
        }

        $image_path = $this->imageUpload($request, $id);

        DB::table('managers')->where('id', $id)->update([
            'name' => $request->input('name'),
            'password'  => bcrypt($request->input('password')),
            'profile_image'=> $image_path
        ]);

        return back()->with('status', 'Success');

    }



  // Get all users
  public function getAllUsers()
  {
    return view('manager.allUsers', ['users'=>DB::table('users')->paginate(10)]);
  }













}
