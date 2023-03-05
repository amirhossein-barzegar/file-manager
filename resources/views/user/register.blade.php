@extends('layouts.app')

@section('content')
<div class="card">
  <div class="card-header">
    Register Account
  </div>
  <div class="card-body">
    <form method="post" action="{{ route('register') }}">
      @csrf
      @method('post')
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" name="username" id="username" value="{{old('username')}}" autofocus>
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
       
      <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}">
      </div>
      <button type="submit" class="btn btn-warning">Register</button>
    </form>
    <div class="py-2">
      Do you have any account? <a class="link" href="{{ route('login') }}">Login here!</a>
    </div>
  </div>
</div>
@endsection