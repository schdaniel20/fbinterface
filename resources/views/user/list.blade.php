@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <table class="table table-striped">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Type</th>
        </tr>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>
                    {{ $u->id }}
                </td>
                <td>
                    {{ $u->name }}
                </td>
                <td>
                    {{ $u->type->title }}
                </td>                
                <td>
                    <a href="{{ url('/user/'. $u->id . '/edit')}}" class="btn btn-primary btn-xs pull-right">
                        <i class="glyphicon glyphicon-edit"></i>
                        Edit
                    </a>                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>    
</div>
@endsection
