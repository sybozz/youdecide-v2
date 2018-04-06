@extends('layouts.manager')
@section('title', 'Profile')

@section('content')
<div class="col-md-6">
  <div class="card">
      <div class="header">
          <h4 class="title">Edit Profile</h4>
      </div>
      <div class="content">
          <form action="{{ url('manager/profile/update/'.$manager->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <div><img src="{{ url('/'.$manager->profile_image) }}" alt="profile image" height="150"></div>
                          <small class="help-block">Recommanded size: 150x150</small>
                          <input type="file" name="profileImage" id="proifleImage" class="form-control">
                          <input type="hidden" name="current_profileImage" value="{{ $manager->profile_image }}">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $manager->name }}">
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="exampleInputEmail1">Email address</label>
                          <input type="email" name="email" class="form-control" value="{{ $manager->email }}" placeholder="Email" disabled>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="password">New Password</label>
                          <input id="password" type="password" class="form-control" name="password">
                      </div>
                  </div>
                </div>
              <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
              <div class="clearfix"></div>
          </form>
      </div>
  </div>
</div>
@endsection
