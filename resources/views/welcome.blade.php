@extends('layouts.app')

@section('content')
  <div class="jumbotron text-center">
    <h1>Mastery</h1>
    <nav>
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <form class="" action="/messages/create" method="post" enctype="multipart/form-data">
      <div class="form-group @if($errors->has('message')) alert-danger @endif" role="alert">
        {{-- ayuda con los problemas de seguridad de formularios de otro sitio al nuestro  --}}
        {{csrf_field()}}
        <input type="text" name="message"class="form-controller" placeholder="Qué estas pensando?">
        @if ($errors->has('message'))
          @foreach ($errors->get('message') as $error)
            <div class="form-control-feedback">
              {{$error}}
            </div>

          @endforeach
        @endif
        <input type="file" class="form-control-file" name="image">
      </div>
    </form>
  </div>
  <div class="row">
    @forelse($messages as $message)
      <div class="col-6">
        @include('messages.message')
      </div>
    @empty
      <p>No hay mensajes destacados.</p>
    @endforelse
    {{-- paginacion para paginate --}}
    @if (count($messages))
      <div class="mt-2 mx-auto">
      {{-- en caso de que no estilise los botones de paginador --}}
      {{-- {{$messages->links('pagination::bootstrap-4')}} --}}
      {{$messages->links()}}
      </div>
    @endif
  </div>
@endsection
