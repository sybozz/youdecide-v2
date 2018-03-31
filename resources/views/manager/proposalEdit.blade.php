@extends('layouts.manager')
@section('title', 'Proposa details')

@section('content')

<div class="col-md-12">
  <div class="card">
      <div class="header">
          <h4 class="title">Update proposal</h4>
      </div>
      <hr>
      <div class="row">
        <form class="form-horizontal" method="POST" action="{{ url('proposal/update/'.$proposal->id) }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="title" class="col-md-3 control-label">Title</label>
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control" name="title" value="{{ $proposal->title }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-md-3 control-label">Description</label>
                <div class="col-md-6">
                    <textarea name="description" id="" rows="10" class="form-control">{!! $proposal->description !!}</textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
      </div>


    </div>
  </div>

@endsection
