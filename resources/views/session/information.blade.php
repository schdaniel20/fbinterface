<h3>
    Informations
    <small>
        <a class="btn btn-xs btn-success" onclick="location.reload()">Refresh</a>
    </small>
</h3>

<div class="row">
    <div class="col-md-5 col-sm-4">
        <table class="table">        
            <tbody> 
                <tr>
                    <td>Session ID : {{ $fb->sessionId  }}</td>
                </tr>
                <tr>
                    <td>Session Name : {{ $fb->sessionName }}</td>
                </tr>
                <tr>
                        <td>Created By : {{ $fb->user->name }}</td>
                </tr>
                <tr>
                    <td>Url Inserted : {{ $fb->linksCount }}</td>
                </tr>                
                <tr>
                    <td>Status :<span id='status'> {{ $fb->statusName->statusName }}</span></td>
                </tr>
            </tbody>
        </table>  
    </div>

    <div class="col-md-1 col-sm-1"></div>

    <div class="col-md-5 col-sm-4">
        <table class="table">        
            <tbody>
                    <tr>
                        <td>Country : {{ $fb->country->country  }}</td>
                    </tr>                    
                    <tr>
                        <td>Started : {{ $fb->start_date }}</td>
                    </tr>
                    <tr>
                        <td>Finished : {{ $fb->end_date }}</td>
                    </tr>
                    <tr>
                        <td>Created : {{ $fb->createdAt }}</td>
                    </tr>
            </tbody>
        </table>  
    </div>        
</div>