@extends('layouts.website')
@section('title', 'New proposal')
@section('pageHeader', 'Submit new proposal')

@section('content')
        <form class="form-horizontal" method="POST" action="{{ url('/proposal/save') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-4 control-label">Title</label>

                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>

                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>



            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>

@endsection
