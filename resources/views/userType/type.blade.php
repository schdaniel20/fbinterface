@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ url('/types/add') }}">
                Create Type
            </a>
        </div>
    </div>
    @foreach($userTypes as $userType)
    <div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span>
                    <label>Type:</label>
                    {{ $userType->title }}
                </span>
                <span class="pull-right">
                    <a class="btn btn-default" href="{{ url('/types/edit/' . $userType->id) }}">
                        <span class="glyphicon glyphicon-edit"></span>
                        Edit
                    </a>
                </span>                
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Permissions:</label>
                        <ul>
                        @foreach($userType->permissions as $permission)
                            <li title='{{ $permission->description }}'>
                                {{ $permission->title }}
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <label>Description:</label>
                        <p>
                            {{ $userType->description }}
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    @endforeach
</div>
@endsection
