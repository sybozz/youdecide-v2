@extends('admin.app')
@section('title', 'Proposals')
@section('contentHeader', 'Top voted')


@section('mainContent')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">All proposals</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="example1" class="table table-bordered table-hover dataTable">
                <thead>
                <tr>
                    <th>Proposal ID.</th>
                    <th>Title</th>
                    <th>Published on</th>
                    <th>Votes count</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $proposals as $proposal )
                    <tr>
                        <td>{{ $proposal->id }}</td>
                        <td><a href="{{ url('proposal/display/'.$proposal->id) }}">{{ $proposal->title }}</a></td>
                        <td>{{ $proposal->updated_at }}</td>
                        <td>{{ $proposal->total_votes }}</td>
                        <td>
                            <a href="{{ url('proposal/unpublish/'.$proposal->id) }}" class="btn btn-warning btn-sm">Take down</a>
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
