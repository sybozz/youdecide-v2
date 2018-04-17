@extends('admin.app')
@section('title', 'Accounts')
@section('contentHeader', 'Users')


@section('mainContent')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Suspended user accounts.</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Account ID.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Member since</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $users as $user )
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            @if($user->isActive)
                                <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">Blocked</span>
                            @endif

                        </td>
                        <td>
                            <a href="{{ url('accounts/user/approve/'.$user->id) }}" class="btn btn-success btn-sm">Approve</a>
                            <a onclick="return confirm('This will permanently delete the account. Are you sure?')" href="{{ url('accounts/user/delete/'.$user->id) }}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

@endsection
