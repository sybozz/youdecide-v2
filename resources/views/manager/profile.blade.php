@extends('layouts.manager')
@section('title', 'Profile')

@section('content')
<div class="col-md-6">
  <div class="card">
      <div class="header">
          <h4 class="title">Edit Profile</h4>
      </div>
      <div class="content">
          <form action="{{ url('manager/profile/update') }}" method="post">
            {{ csrf_field() }}
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
                          <input type="email" name="email" class="form-control" value="{{ $manager->email }}" placeholder="Email">
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
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="password-confirm">Confirm Password</label>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
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
