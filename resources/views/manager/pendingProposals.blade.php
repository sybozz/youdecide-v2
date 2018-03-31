@extends('layouts.manager')
@section('title', 'Pending proposals')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">Pending proposals</h4>
                <p class="category">Waiting for your actions.</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                    <th>ID</th>
                    <th width="50%">Title</th>
                    <th>Created on</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach($proposals as $proposal)
                    <tr>
                        <td>{{ $proposal->id }}</td>
                        <td><a href="{{ url('proposal/show/'.$proposal->id) }}">{{ $proposal->title }}</a></td>
                        <td>{{ $proposal->created_at }}</td>
                        <td>
                            <a href="{{ url('proposal/show/'.$proposal->id) }}" class="btn btn-info btn-xsm"><i class="fa fa-eye"></i></a>
                            <a href="{{ url('proposal/edit/'.$proposal->id) }}" class="btn btn-warning btn-xsm"><i class="fa fa-pencil"></i></a>
                            &nbsp; | &nbsp;
                            <a href="{{ url('proposal/approve/'.$proposal->id) }}" onclick="confirm('Are you sure to publish it?')" class="btn btn-success btn-xsm"><i class="fa fa-check"></i></a>
                            <a href="{{ url('proposal/disapprove/'.$proposal->id ) }}" onclick="confirm('Are you sure to block it?')" class="btn btn-danger btn-xsm"><i class="fa fa-ban"></i></a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection
