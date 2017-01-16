@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
    @include('session.messages')
    
    @include('session.information')
    
    @include('session.actions')
    
    @include('session.errors')
    
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#crawler').click(function(){
        var name = $(".form").serialize();

        $.ajax({
            url: '/start?' + name,
            type: "get",      
            success: function(data){
                $('#status').text("Starting");
            }
        });      
    }); 
});
</script>
@endsection

