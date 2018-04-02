@extends('layouts.website')
@section('title', 'New proposal')
@section('pageHeader', 'Submit new proposal')

@section('content')
        <form class="form-horizontal" method="POST" action="{{ url('proposal/save') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                <label for="title" class="col-md-4 control-label">Title</label>

                <div class="col-md-6">
                    <input id="proposalTitle" type="text" class="form-control" name="title" value="{{ old('title') }}" autofocus>
                    <small class="help-block">Write your solution on a problem or issue.</small>
                    @if ($errors->has('title'))
                        <span class="help-block">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                <label for="description" class="col-md-4 control-label">Description</label>
                <div class="col-md-6">
                    <textarea name="description" id="proposalDescriptionTextbox" rows="10" class="form-control">{{ old('description') }}</textarea>
                    <small class="help-block">Describe your solution.</small>
                    @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
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
