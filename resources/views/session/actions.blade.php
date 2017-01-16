<h3>Actions</h3>
<div class="row">
    <div class="col-md-4">
        @if($crawler == -1)
            <div class="panel panel-danger">
        @elseif($crawler == 1)
            <div class="panel panel-success disabled">
        @else
            <div class="panel panel-default">
        @endif
            <div class="panel-heading">Crawler: {{ $fb->processedCount }} link(s) left</div>
            <div class="panel-body">
                <form action="{{ url()->current() . '/start' }}" class="form">
                    {{ csrf_field() }}
                    <button type="submit" id='crawler'>Start Crawler</button>
                </form>
            </div>
        </div>
    </div>

     <div class="col-md-4">

        @if($parser == -1)
            <div class="panel panel-danger">
        @elseif($parser == 1)
            <div class="panel panel-success disabled">
        @else
            <div class="panel panel-default">
        @endif
            <div class="panel-heading">Parser: {{ $fb->resultCount }} link(s) left</div>
            <div class="panel-body">
                <form action="{{ url()->current() . '/parse' }}" class="form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-2">
                            <button type="submit" id='crawler'>Run</button>
                        </div>
                        @if($parser == 0)
                            <div class="col-md-5">
                                {{ Form::select('server', $servers, '',  ['class' => 'form-control']) }}
                            </div>
                            <div class="col-md-5">
                                {{ Form::text('table', '',  ['class' => 'form-control']) }}
                            </div>
                        @endif
                    </div>
                    
                    
                </form>
            </div>
        </div>

    </div>

     <div class="col-md-4">

        <div class="panel panel-info">
            <div class="panel-heading">Status</div>
            <div class="panel-body">
                <form  action="{{ url(Request::url() . "/setstatus") }}" method="POST"  class="form">
                    {{ csrf_field() }}                       
                    <label>Back to Crawler</label>
                    <input type="radio" name="status" value="0" checked>
                    <label>Back to Parser</label>
                    <input type="radio" name="status" value="2">

                    <button type="subbmit" id='starter'>Send</button>
                </form>
            </div>
        </div>

    </div>
</div>