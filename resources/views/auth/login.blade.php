@extends('layouts.layout')

@section('content')
<div class="container form-signin p-5 col-5">
  <form class="needs-validation" method="POST" action="/login">
    @csrf
    <h1 class="h3 mb-3 fw-normal text-center">Log In</h1>

    @if (session('status'))
      <div class="alert alert-danger fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    
    <div class="container mb-3">
      <label for="email" class="visually-hidden">Email address</label>
      <input
        type="email"
        id="email"
        name="email"
        value="{{ old('email') }}"
        class="form-control"
        placeholder="Email address"
        autofocus
      />

      @error('email')
      <div class="text-danger mt-2 ml-1">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="container mb-3">
      <label for="password" class="visually-hidden">Password</label>
      <input
        type="password"
        id="password"
        name="password"
        class="form-control"
        placeholder="Password"
      />
      @error('password')
      <div class="text-danger mt-2 ml-1">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="checkbox mb-3 text-center custom-control custom-checkbox">
      <input type="checkbox" class="custom-control-input" id="remember" name="remember">
      <label class="custom-control-label" for="remember">Remember Me</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
</div>

@endsection

@section('js')
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
@endsection