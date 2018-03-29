@extends('layouts.manager')
@section('title', 'Proposa details')

@section('content')

<div class="col-md-12">
  <div class="card">
      <div class="header">
          <h4 class="title">{{ $proposal->title }}</h4>
      </div>
      <hr>

      <div class="content">

        <h4><u>Proposal description</u></h5>
        {!! $proposal->description !!}
        <!-- decoded HTML CSS  -->

        <hr>
        <div class="meta">
          <p class="text-muted">
            Created by: {{ $proposal->name }} <br>
            Created on: {{ $proposal->created_at }}
          </p>
        </div>

      </div>
    </div>
  </div>

@endsection
