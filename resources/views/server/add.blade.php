@extends('layouts.app')

@section('content')
<div class="container">    
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">            
            <div class="panel-body">                
                    {!! Form::open(array('url' => Request::path(), 'method' => 'post', 'class' => 'form-horizontal')) !!}
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    <div class="col-md-2">
                        <label class="control-label big-text" for="name">Name:</label>
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('name', '',  ['class' => 'form-control']) }}
                        @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('host') ? ' has-error' : '' }}">
                    <div class="col-md-2">
                        <label class="control-label big-text" for="host">Host:</label>
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('host', '',  ['class' => 'form-control']) }}
                        @if ($errors->has('host'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('host') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('database') ? ' has-error' : '' }}">
                    <div class="col-md-2">
                        <label class="control-label big-text" for="database">Database:</label>
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('database', '',  ['class' => 'form-control']) }}
                        @if ($errors->has('database'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('database') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('table') ? ' has-error' : '' }}">
                    <div class="col-md-2">
                        <label class="control-label big-text" for="table">Table:</label>
                    </div>
                    <div class="col-md-10">
                        {{ Form::text('table', '',  ['class' => 'form-control']) }}
                        @if ($errors->has('table'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('table') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('user') ? ' has-error' : '' }}">
                    <div class="col-md-2">
                        <label class="control-label big-text" for="user">User:</label>
                    </div>
                    <div class="col-md-10">
                    {{ Form::text('user','',  ['class' => 'form-control']) }}
                    @if ($errors->has('user'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('user') }}</strong>
                                </span>
                    @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-2">
                        <label class="control-label big-text" for="password">Password:</label>
                    </div>
                    <div class="col-md-10">
                    {{ Form::text('password','',  ['class' => 'form-control']) }}
                    @if ($errors->has('user'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
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
