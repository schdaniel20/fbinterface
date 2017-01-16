@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading">Edit User Type</div>
        <div class="panel-body">            
            {!! Form::open(array('url' => url(Request::path() . '/setrole'), 'method' => 'post', 'class' => 'form-horizontal')) !!}    
                <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                    <div class="col-md-1">
                        <label class="control-label big-text" for="title">Title:</label>
                    </div>
                    <div class="col-md-11">
                        {{ Form::text('title', $userType->title,  ['class' => 'form-control']) }}
                        @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                    <div class="col-md-1">
                        <label class="control-label big-text" for="description">Description:</label>
                    </div>
                    <div class="col-md-11">
                    {{ Form::text('description', $userType->description,  ['class' => 'form-control']) }}
                    @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                    @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-5 col-md-offset-1">
                        <button class="btn btn-primary" style="width:100%">Save</button>
                    </div>
                    <div class="col-md-5 col-md-offset-1">
                        <a class="btn btn-danger" style="width:100%" href="{{ url(Request::path() . '/delete') }}">
                            Delete
                        </a>
                    </div>
                </div>
                
            {!! Form::close() !!}
        </div>
    </div>
    
    <div class="panel panel-default">
        <div class="panel-heading">Set Permissions</div>
        <div class="panel-body">            
            {!! Form::open(array('url' => url(Request::path() . '/setpermissions'), 'method' => 'post', 'class' => 'form-horizontal')) !!}    
                @foreach($allPermissions as $ap)                    
                    <div class="form-group">
                        <div class="col-md-3">
                            <label class="control-label big-text" for="title">{{ $ap->title }}</label>
                        </div>
                        <div class="col-md-9">
                        {{ Form::checkbox('permissions[]', $ap->id, in_array($ap->id, $existing)) }}
                        </div>
                    </div>
                @endforeach
                
                <div class="form-group">
                    <div class="col-md-1 col-md-offset-1">
                        <button class="btn btn-primary" style="width:100%">Save</button>
                    </div>
                </div>
                
            {!! Form::close() !!}
        </div>
    </div>
    
</div>
@endsection