@extends('layouts.app')

@section('title') 
 Create file
@endsection

@section('content')
<div class="card">
  <div class="card-header">
    Upload File
  </div>
  <div class="card-body"> 
    <form method="post" action="{{ route('file.store', $user->username) }}" id="uploadForm" enctype="multipart/form-data">
      @csrf
      @method('post')
      <div class="mb-3">
        <label for="name" class="form-label">Filename</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="By defalut is current time" value="{{old('name')}}">
        @error('name')
          <small class="text-danger">
            {{$errors->first('name')}}
          </small>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="file" class="form-label">Uploader</label>
        <input class="form-control" name="file" type="file" id="uploadFile" accept=".jpg,.jpeg,.png,.bmp,.webp,.svg,.pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.mp3,.mp4,.avi,.mkv" >
        @error('file')
          <small class="text-danger">
            {{$errors->first('file')}}
          </small>
        @enderror
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Set Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Optional" value="{{old('password')}}">
        @error('password')
          <small class="text-danger">
            {{$errors->first('password')}}
          </s>
        @enderror
      </div>

      <button type="submit" id="uploadBtn"  class="btn btn-info text-white">Add file</button>

    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
    
</script>
@endsection