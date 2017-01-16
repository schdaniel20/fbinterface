@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                            
            </div>
            <div class="panel-body">                
                    {!! Form::open(array('url' => Request::path(), 'method' => 'post', 'class' => 'form-horizontal')) !!}    
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    <div class="col-md-2">
                        <label class="control-label big-text" for="title">Title:</label>
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('title', '',  ['class' => 'form-control']) }}
                        @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <div class="col-md-2">
                        <label class="control-label big-text" for="description">Description:</label>
                    </div>
                    <div class="col-md-10">
                    {{ Form::text('description','',  ['class' => 'form-control']) }}
                    @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button class="btn btn-primary" style="width:100%">Save</button>
                    </div>
                    
                </div>
                
            {!! Form::close() !!}
                
                
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
