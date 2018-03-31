@extends('layouts.manager')
@section('title', 'Proposa details')

@section('content')

<div class="col-md-12">
  <div class="card">
      <div class="header">
          <h4 class="title">{{$proposal->title}}</h4>
          <span class="text-muted">Created on: {{$proposal->created_at}}</span>
      </div>

      <hr>

      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          {!! $proposal->description !!}
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <p class="text-right">
            <a href="{{ url('proposal/approve/'.$proposal->id) }}" onclick="confirm('Are you sure to publish it?')" class="btn btn-success"><i class="fa fa-check"></i></a>
            <a href="{{ url('proposal/disapprove/'.$proposal->id ) }}" onclick="confirm('Are you sure to block it?')" class="btn btn-warning"><i class="fa fa-ban"></i></a>
          </p>
        </div>
      </div>




    </div>
  </div>

@endsection
