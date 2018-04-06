@extends('layouts.user')
@section('title', 'New proposal')
@section('pageHeader', 'Submit new proposal')

@section('content')
        {{--check for bad words and prevent form to submit --}}
        <script type="text/javascript">
            function Message()
            {
                // var textarea_val=document.form.description.value;
                var textarea_val=tinyMCE.activeEditor.getContent({format : 'raw'});
                var input_val=document.form.title.value;

                if(textarea_val=="" || input_val=="")
                {
                    alert("Please enter a message");
                    return false;
                }

                bwords_input=badwords(input_val);
                bwords_textarea=badwords(textarea_val);

                if(bwords_input>0 || bwords_textarea>0)
                {
                    alert("Your message contains inappropriate words.Please clean up your message.");
                    return false;
                }
            }
        </script>

        <form onsubmit="return Message();" name="form" class="form-horizontal" method="POST" action="{{ url('proposal/save') }}">
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
                    <textarea name="description" id="proposalDescriptionTextbox" rows="10" class="form-control"></textarea>
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
