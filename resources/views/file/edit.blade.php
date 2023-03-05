@extends('layouts.app')

@section('title') 
 Rename file
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    Rename File
  </div>
  <div class="card-body"> 
    <form method="post" action="{{ route('file.update',['username' => $user->username, 'file' => $file->id]) }}" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="mb-3">
        <label for="name" class="form-label">Filename</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="By defalut is current time" value="{{$file->name}}">
        @error('name')
          <div class="text-danger">
            {{$errors->first('name')}}
          </div>
        @enderror
      </div>
      
      <button type="submit" id="uploadBtn" class="btn btn-info text-white">Rename</button>

    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
    
</script>
@endsection