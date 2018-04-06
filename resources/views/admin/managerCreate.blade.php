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
    <form action="{{ url('accout/manager/save') }}" method="post" role="form">
      {{ csrf_field() }}
      <div class="box-body">
        <div class="form-group">
          <label for="inName">Full name</label>
          <input type="text" name="name" class="form-control" id="inName" placeholder="Enter name">
        </div>
        <div class="form-group">
          <label for="InputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="InputEmail1" placeholder="Enter email">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" type="password" class="form-control" name="password" required>
        </div>
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
