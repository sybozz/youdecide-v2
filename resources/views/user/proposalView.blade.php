@extends('layouts.website')
@section('title', 'View proposal')
@section('pageHeader', $proposal->title)

@section('content')
<p class="text-center text-muted">Created on: {{ $proposal->created_at }}</p>
<div class="proposal-single">
  {!! $proposal->description !!}
</div>
@endsection
