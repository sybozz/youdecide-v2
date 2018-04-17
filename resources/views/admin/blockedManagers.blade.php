@extends('admin.app')
@section('title', 'Accounts')
@section('contentHeader', 'Managers')


@section('mainContent')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Suspended accounts</h3>
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
                @foreach( $managers as $manager )
                    <tr>
                        <td>{{ $manager->id }}</td>
                        <td>{{ $manager->name }}</td>
                        <td>{{ $manager->email }}</td>
                        <td>{{ $manager->created_at }}</td>
                        <td>
                            @if($manager->isActive)
                                <span class="text-success">Active</span>
                            @else
                                <span class="text-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('accounts/manager/active/'.$manager->id) }}" class="btn btn-success btn-sm">Active</a>
                            <a onclick="return confirm('This will permanently delete the account. Are you sure?')" href="{{ url('accounts/manager/delete/'.$manager->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
