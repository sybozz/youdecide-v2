@extends('admin.app')
@section('title', 'Proposals')
@section('contentHeader', 'Top voted')


@section('mainContent')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Unauthorized proposals</h3>
            <p>Send unpublished proposals to manager for reconsideration.</p>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Proposal ID.</th>
                    <th>Title</th>
                    <th>Published on</th>
                    <th>Approved by</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $proposals as $proposal )
                    <tr>
                        <td>{{ $proposal->id }}</td>
                        <td><a href="{{ url('proposal/display/'.$proposal->id) }}">{{ $proposal->title }}</a></td>
                        <td>{{ $proposal->updated_at }}</td>
                        <td>{{ $proposal->name }}</td>
                        <td>
                            <a href="{{ url('proposal/publish/'.$proposal->id) }}" class="btn btn-success btn-sm">Publish</a>
                            <a onclick="return confirm('This will permanently delete the proposal. Are you sure?')" href="{{ url('proposal/delete/'.$proposal->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
