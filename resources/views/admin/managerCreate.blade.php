@extends('admin.app')
@section('title', 'Accounts')
@section('contentHeader', 'Managers')


@section('mainContent')

<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Create new manager</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="{{ url('account/manager/save') }}" method="post" role="form">
      {{ csrf_field() }}
      <div class="box-body">

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label for="inName">Full name</label>
          <input type="text" name="name" value="{{ old('value') }}" class="form-control" id="inName" placeholder="Enter name">
        </div>
        @if ($errors->has('name'))
          <span class="help-block">
              <strong>{{ $errors->first('name') }}</strong>
          </span>
        @endif

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="InputEmail1">Email address</label>
          <input type="email" name="email" value="{{ old('value') }}" class="form-control" id="InputEmail1" placeholder="Enter email">
        </div>
        @if ($errors->has('email'))
          <span class="help-block">
              <strong>{{ $errors->first('email') }}</strong>
          </span>
        @endif

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password">Password</label>
          <input id="password" type="password" class="form-control" name="password" required>
        </div>
        @if ($errors->has('password'))
          <span class="help-block">
              <strong>{{ $errors->first('password') }}</strong>
          </span>
        @endif

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.box -->
</div>


@endsection
