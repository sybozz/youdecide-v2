@extends('layouts.user')
@section('title', 'View proposal')
@section('pageHeader', $proposal->title)

@section('content')
<p class="text-center text-muted">Created on: {{ $proposal->created_at }}</p>
<div class="proposal-single">
  {!! $proposal->description !!}
</div>
<hr>
<div class="item-content-meta">
    <strong class="text-muted">Published on: {{ $proposal->updated_at }}</strong>
    <span class="pull-right">
        <!-- <a href="{{ url('proposal/like/'.$proposal->id) }}" class="btn btn-info btn-sm">Like</a>
        | -->
        <a href="{{ url('proposal/vote/'.$proposal->id) }}" class="btn btn-success btn-sm">Vote <i class="fa fa-plus"></i></a>
        |
        <span class="text-right text-muted">Total votes: <span class="badge">{{ $proposal->total_votes }}</span></span>
    </span>

</div>
@endsection
