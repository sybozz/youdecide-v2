@extends('admin.app')
@section('title', 'Proposals')
@section('contentHeader', 'Top voted')


@section('mainContent')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{ $proposal->title }}</h3>
        </div>
        <hr>
        <!-- /.box-header -->
        <div class="box-body">
            {!! $proposal->description !!}
        </div>
        <!-- /.box-body -->
        <hr>
        <a href="{{ URL::previous() }}" class="btn btn-info pull-right">Back</a>
    </div>
    <!-- /.box -->

@endsection
