@extends('layouts.app')
@section('title', 'Create proposal')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Post new proposal</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{ url('/proposal/save') }}" class="form-horizontal">
                            <fieldset>
                                <div class="form-group">
                                    <label for="title" class="col-lg-2 control-label">Title</label>
                                    <div class="col-lg-10">
                                        <input type="text" class="form-control" id="title" placeholder="Proposal title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="textArea" class="col-lg-2 control-label">Detail</label>
                                    <div class="col-lg-10">
                                        <textarea class="form-control" rows="10" id="textArea"></textarea>
                                        <span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <button type="reset" class="btn btn-default">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection