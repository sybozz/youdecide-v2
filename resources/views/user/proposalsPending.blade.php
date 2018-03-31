@extends('layouts.website')
@section('title', 'Timeline')
@section('pageHeader', 'Timeline')

@section('content')
  <ul class="list-inline text-center">
    <li><a href="{{ url('/activity/published') }}">Published</a></li>
    <li c;><a href="{{ url('/activity/pending') }}" class="text-muted">Pending</a></li>
    <li><a href="{{ url('/activity/unpublished') }}">Unpublished</a></li>
  </ul>
  <div class="timeline-content">
    <div class="list-group">
      @foreach($proposals as $proposal)
      <a href="{{ url('proposal/view/'.$proposal->id) }}" class="list-group-item">
        <h4 class="list-group-item-heading">{{ $proposal->title }}</h4>
        <p class="list-group-item-text text-muted">{{ $proposal->created_at }}</p>
      </a>
      @endforeach
    </div>
  </div>



@endsection
