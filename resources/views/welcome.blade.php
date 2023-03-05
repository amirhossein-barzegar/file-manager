@extends('layouts.app')

@section('content')
            <div class="card">
              <div class="card-body">
              @if(auth()->user())
                <h5 class="card-title">Manage your files</h5>
                <p class="card-text">You are logged in</p>
                <a href="{{ route('file.create',auth()->user()->username) }}" class="btn btn-info">Upload new File</a>
                <a href="{{ route('file.index',auth()->user()->username) }}" class="btn btn-warning">See Uploaded Files</a>
              @else
                <h5 class="card-title">Manage your files</h5>
                <p class="card-text">For better experience please login your account:</p>
                <a href="{{ route('login') }}" class="btn btn-info">Login</a>
                <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
              @endif
              <div class="mt-4">
                <h5>See other users files</h5>
                <div class="row">
                  @forelse($users as $user)
                  <div class="col-6 my-2">
                    <div class="card">
                      <a href="{{route('file.index',$user->username)}}" class="card-header nav-link">
                        {{$user->username}}
                      </a>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"> 
                          @switch(count($user->files))
                            @case(0) <span class="text-danger">Empty</span> @break
                            @case(1) <span class="text-info">Have one file</span> @break
                            @default <span class="text-info">Have {{count($user->files)}} files</span> @break
                          @endswitch
                        </li>
                      </ul>
                    </div>
                  </div>
                  @empty
                  <div class="text-muted">No user found.</div>
                  @endforelse
                  
                </div>
              </div>
              </div>
            
            </div>
@endsection