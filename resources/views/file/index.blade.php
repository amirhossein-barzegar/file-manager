@extends('layouts.app')

@section('title') 
 Create file
@endsection

@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{'@'.$user->username}}</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    Uploaded files
    @if(Gate::allows('user-owner',$user->username))
    <a href="{{ route('file.create',$user->username) }}" class="btn btn-sm btn-primary">Upload new one</a>
    @endif
  </div>
  <div class="card-body"> 
    <ul class="list-group list-group-flush border rounded">
      @forelse($files as $file)
      <li class="nav-item list-group-item d-flex flex-column align-items-center">
        <div class="d-flex align-items-center justify-content-between w-100">
          <div class="d-flex align-items-center">
            <i class="{{$file->icon}} px-2"></i>
            <a href="{{ route('file.show', ['username' => $user->username, 'file' => $file->link]) }}" class="nav-link text-truncate flex-shrink-1" style="max-width: 160px;">
              {{$file->full_name}}
            </a>
          </div>
          <div class="d-flex gap-1">
            <a href="{{ route('file.show',['username' => $user->username, 'file' => $file->link]) }}" class="btn btn-sm btn-success" >
              <i class="fa fa-download"></i>
            </a>
            @if(Gate::allows('user-owner',$user->username))
            <a href="{{ route('file.edit',['username' => $user->username, 'file' => $file->id]) }}" class="btn btn-sm btn-info text-white">
              <i class="fa fa-pencil"></i>
            </a>
            <form method="post" action="{{ route('file.destroy',['username' => $user->username, 'file' => $file->id]) }}" class="d-inline">
              @csrf
              @method('delete')
              <button class="btn btn-sm btn-danger">
                <i class="fa fa-close"></i>
              </button>
            </form>
            @endcan
          </div>
        </div>
        <div class="align-self-end">
          <small class="text-muted text-right">{{$file->size}}</small>
        </div>
      </li>
      @empty
      <li class="nav-item list-group-item d-flex flex-column align-items-center">
        <small class="text-danger">Is empty for now</small>
      </li>
      @endforelse
    </ul>
  </div>
</div>
@endsection

@section('scripts')
<script>
  // function handleEdit(id) {
  //   $.get( `/file/${id}/edit`,function(data,status) {
  //     $('#editName').val(data.name);
  //     $('#editId').val(data.id);
  //   });
  // }

  // function handleUpdate() {
  //   let id = $('#editId').val()
  //   $.post( `/file/${id}`, {
  //     name: $('#editName').val(),
  //   },function(data) {
  //     console.log(data);
  //   });
  // }
</script>
@endsection