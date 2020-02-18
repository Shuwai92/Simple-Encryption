@extends('users.layout')

@section('konten')
<div class="card uper">
  <div class="card-header">
    Insert Your Text
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form method="post" action="{{ route('users.store') }}">
     
          <div class="form-group"> 
              <label>Text</label>
              <input type="text" class="form-control" name="ori_text"/>
          </div>
        
         
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
  </div>
</div>
@endsection