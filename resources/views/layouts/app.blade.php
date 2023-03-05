<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        @livewireStyles
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Font Awesome CDN -->
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        @vite(['resources/css/app.css', 'resources/js/app.js','resources/scss/app.scss'])
    </head>
    <body>
        @include('layouts.header')
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                @yield('content')
            </div>
          </div>
        </div>
        
        <!-- Jquery CDN -->
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

        <!-- Jquery Form CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha512-YUkaLm+KJ5lQXDBdqBqk7EVhJAdxRnVdT2vtCzwPHSweCzyMgYV/tgGF4/dCyqtCC2eCphz0lRQgatGVdfR0ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        @livewireScripts
        @yield('scripts')
        @section('scripts')
        <script src="//cdn.jsdelivr.net/npm/eruda"></script>
        <script>eruda.init();</script>
        <script>
          // Ajax Search
$(document).ready(function() {
  $('#searchInput').on('keydown', function() {
    $.get('{{ route("search") }}',{
      _token: $('meta[name="csrf-token"]').attr('content'),
      searchInput: $(this).val(),
      searchType: $("#searchType").val()
    }, function (data) {
      let searchList = "";
      if (data.files.length > 0) {
        let resultFiles = data.files;
        for(let result in resultFiles) {
          searchList += `
          <li class="list-group-item">
            <a href="/${resultFiles[result].user.username}/file/${resultFiles[result].link}
            " class="nav-link d-flex justify-content-between align-items-center">
            <span>
              ${resultFiles[result].full_name}
            </span>  
            <small class="text-muted">
              ${resultFiles[result].size}
            </small> 
            </a>  
          </li>`;
        }
      } if (data.users.length > 0) {
        let resultUsers = data.users;
        for(let result in resultUsers) {
          searchList += `
          <li class="list-group-item">
            <a href="/${resultUsers[result].username}/file/" class="nav-link d-flex justify-content-between align-items-center">
              <span>${'<span class="px-1">@</span>'+resultUsers[result].username}</span>  
                ${resultUsers[result].files.length ? (resultUsers[result].files.length > 1 ? '<small class="text-info">Have '+resultUsers[result].files.length+' files</small>' : '<small class="text-info">Have one file</small>') :'<small class="text-danger">Empty</small>'}
            </a>  
          </li>`;
        }
      }
      if (searchList == "") {
        searchList += `
          <li class="list-group-item text-danger">
              Nothing was found!  
          </li>`; 
      }
      $('#SearchUl').html(searchList);
    });
  });
});
        </script>
    </body>
</html>
