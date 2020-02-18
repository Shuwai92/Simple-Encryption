@extends('users.layout')

@section('konten')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Data</h1>   
    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Random Key</td>
          <td>Original text</td>
          <td>Encrypted Text</td>
          
         
         
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->rand_key}}</td>
            <td>{{$user->decr_text}}</td>
            <td>{{$user->encr_text}}</td>
            
            
        </tr>
        @endforeach
    </tbody>
  </table>

  <a href="{{ route('users.create') }}" type="button" class="btn btn-default">Back</a>
<div>
</div>
@endsection