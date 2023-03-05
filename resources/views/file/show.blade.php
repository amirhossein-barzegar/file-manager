@extends('layouts.app')

@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('file.index',$user->username) }}">{{'@'.$user->username}}</a></li>
    <li class="breadcrumb-item active text-truncate" aria-current="page">{{$file->full_name}}</li>
  </ol>
</nav>
<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center text-truncate">
    <span><i class="{{$file->icon}} px-1"></i>{{$file->full_name}}</span>
    <span class="text-muted">{{$file->size}}</span>
  </div>
  <div class="card-body"> 
    @livewire('file.download', ['file' => $file, 'user' => $user])
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('#showTime').val()-=2;
    setTimeout(() => {
      alert('download now');
    }, 10000);
  });
  function copyPassword(this) {
    var copyText = document.getElementById("passwordCopy");
    copyText.select();
    document.execCommand("copy", false);
    this.val('copied!');
  }
</script>
@endsection