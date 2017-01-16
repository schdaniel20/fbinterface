@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {!! Form::open(array('url' => Request::path(), 'method' => 'post', 'class' => 'form-horizontal')) !!}    
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="control-label big-text">Are you sure you want to delete {{ $title }} role?</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-1">
                        <button class="btn btn-primary" style="width: 100%">Yes</button>
                    </div>
                    <div class="col-md-1">
                        <a class="btn btn-danger" style="width: 100%" href="{{ url('types') }}">
                            No
                        </a>
                    </div>
                </div>
                
    {!! Form::close() !!}
</div>

@endsection