@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <table class="table">
        <thead class="thead">
          <tr>
            <th>Name</th>
            <th>DNS</th>
            <th>Table</th>
            <th>User</th>
            <th>Password</th>
          </tr>
        </thead>
        <tbody>
            @foreach($servers as $server)
                <tr>
                    <td>{{ $server->name }}</td>
                    <td>{{ $server->dsn }}</td>
                    <td>{{ $server->table }}</td>
                    <td>{{ $server->user }}</td>
                    <td>{{ $server->password }}</td>
                    <td>
                        <a href="{{ url('/servers/'. $server->id . '/edit')}}" class="btn btn-primary btn-xs">
                            <i class="glyphicon glyphicon-edit"></i>
                            Edit
                        </a>
                        <a href="{{ url('/servers/'. $server->id . '/delete')}}" class="btn btn-danger btn-xs">
                            <i class="glyphicon glyphicon-remove"></i>
                            Delete
                        </a>
                    </td>
                  </tr>  
            @endforeach                  
        </tbody>
    </table>
</div>
@endsection
