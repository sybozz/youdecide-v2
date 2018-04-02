@extends('layouts.website')
@section('title', 'Results')
@section('pageHeader', 'Results')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">

            <div class="item-list">
                <ul class="list-unstyled">
                    @foreach($proposals as $proposal)
                    <li class="item-card">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="item-content">
                                    <h3><a href="{{ url('proposal/view/'.$proposal->id) }}">{{ $proposal->title }}</a></h3>
                                    {!! $proposal->description !!}
                                    <div class="item-content-meta">
                                        <strong class="text-muted">Published on: {{ $proposal->updated_at }}</strong>
                                        <span class="pull-right">
                                            <!-- <a href="{{ url('proposal/like/'.$proposal->id) }}" class="btn btn-info btn-sm">Like</a>
                                            | -->
                                            <a href="{{ url('proposal/vote/'.$proposal->id) }}" class="btn btn-success btn-sm">Vote <i class="fa fa-plus"></i></a>
                                            |
                                            <span class="text-right text-muted">Total votes: <span class="badge">{{ $proposal->votes }}</span></span>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                      @endforeach
                </ul>
            </div>

        </div>
        <div class="col-md-3">
            @include('website.includes.sidebar')
        </div>
    </div>
</div>

@endsection
