@if($errors->has('startErrors') || $errors->has('setStatus'))
<div class="alert alert-danger">
   @foreach ($errors->all() as $error)
      <div>
          <span class="glyphicon glyphicon-exclamation-sign"></span>
          {{ $error }}
      </div>
  @endforeach
</div>
@endif