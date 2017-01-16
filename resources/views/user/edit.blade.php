@extends('layouts.app')

@section('content')
<div class="container">
    <h2> Edit user</h2>
    <div class="panel panel-default">
        <div class="panel-body">
        {!! Form::open(array('url' => Request::path(), 'method' => 'post', 'class' => 'form-horizontal')) !!}    
                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-md-1">
                            <label class="control-label big-text" for="title">Name:</label>
                        </div>
                        <div class="col-md-11">
                            {{ Form::text('name', $user->name,  ['class' => 'form-control']) }}
                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
        
                    <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                        <div class="col-md-1">
                            <label class="control-label big-text" for="title">Type:</label>
                        </div>
                        <div class="col-md-11">
                            {{ Form::select('type', $types, [$user->type_id],  ['class' => 'form-control']) }}
                            @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-5">
                            <button class="btn btn-primary">Save</button>
                        </div>
                    </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
