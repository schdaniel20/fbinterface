@extends('layouts.app')

@section('content')
<div class="container-fluid">    
    <h3>Search</h3>
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                {!! Form::open(array('url' => 'session/search', 'method' => 'get')) !!}
                <div class="row">
                    <div class="col-md-4">
                        <label for="country">Select the Country:</label>
                        {{ Form::select('country', $countryList, Request::old('country')) }}                        
                    </div>
                    <div class="col-md-4">
                        <label for="country">Select the Status:</label>
                        {{ Form::select('status', $status, Request::old('status')) }}
                    </div>
                    {{ Form::submit('Search', ['class' => 'btn btn-success']) }}
                </div>
                {!! Form::close() !!}                
            </div>
        </div>
    </div>

    @if($fbs)
         Records {{ $fbs->firstItem() }} - {{ $fbs->lastItem() }} of {{ $fbs->total() }} (for page {{ $fbs->currentPage() }})
         <table class="table">
         <thead class="thead">
           <tr>
             <th>#</th>
             <th>Name</th>            
             <th>Status</th>
             <th>Created By</th>
             <th>Started</th>
             <th>Finished</th>
             <th>Created At</th>
           </tr>
         </thead>
         <tbody>
            @foreach($fbs as $fb)
                <tr>
                     <th scope="row"> 
                         <a href="{{ url('/session/' . $fb->sessionId)  }}">{{ $fb->sessionId  }}</a>
                     </th>
                     <td>{{ $fb->sessionName }}</td>
                     <td>{{ $fb->statusName->statusName }}</td>                    
                     <td>{{ $fb->user->name }}</td>
                     <td>{{ $fb->start_date }}</td>
                     <td>{{ $fb->end_date }}</td>
                     <td>{{ $fb->createdAt }}</td>
                </tr>  
             @endforeach                  
         </tbody>
         </table>
         <div>
             {!! $fbs->links() !!}
         </div>
     @endif 
</div>
@endsection

