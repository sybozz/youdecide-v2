@extends('layouts.user')
@section('title', 'Profile')
@section('pageHeader', 'Profile setting')

@section('content')
        <form class="form-horizontal" method="POST" action="{{ url('user/profile/update/'.Auth::id()) }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
              <label for="proifleImage" class="col-md-4 control-label">Profile picture</label>
              <div class="col-md-6">
                <div><img src="{{ $user->profile_image }}" alt="profile image" height="150"></div>
                <small class="help-block">Recommanded size: 150x150</small>
                <input type="file" name="profileImage" id="proifleImage" class="form-control">
                <input type="hidden" name="current_profileImage" value="{{ $user->profile_image }}">
              </div>
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled>
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">New Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
{{--
            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>
            </div> --}}

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>


@endsection
