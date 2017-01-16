<h3>Errors</h3>
<div>
    <table class="table">
        @foreach($fb->errors as $error)
        <tr>
            <td>
                <h4>{{$error->created_at}}</h4>
                <div>
                    {{$error->message}}
                </div>
            </td>
            
        </tr>
        @endforeach
    </table>
</div>