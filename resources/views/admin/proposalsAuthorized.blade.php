@extends('admin.app')
@section('title', 'Proposals')
@section('contentHeader', 'Top voted')


@section('mainContent')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Authorized proposals</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Proposal ID.</th>
                <th>Title</th>
                <th>Published on</th>
                <th>Votes count</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $proposals as $proposal )
            <tr>
                <td>{{ $proposal->proposal_id }}</td>
                <td><a href="{{ url('proposal/display/'.$proposal->id) }}">{{ $proposal->title }}</a></td>
                <td>{{ $proposal->updated_at }}</td>
                <td>{{ $proposal->total_votes }}</td>
                <td>{{ $proposal->status }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->

@endsection
