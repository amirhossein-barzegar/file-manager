@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Login Account
  </div>
  <div class="card-body">
    <form method="post" action="{{route('login')}}">
      @csrf
      @method('post')
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}">
        @error('username')
          <small class="text-danger">
            {{$errors->first('username')}}
          </small>
        @enderror
      </div>
       
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
        @error('password')
          <small class="text-danger">
            {{$errors->first('password')}}
          </small>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="py-2">
      Don't have any account? <a href="{{ route('register') }}">Register here!</a>
    </div>
  </div>
</div>
@endsection