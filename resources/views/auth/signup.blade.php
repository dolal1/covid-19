@extends('layouts.layout')

@section('content')
<div class="container form-signin p-5 col-5">
  <form class="needs-validation" method="POST" action="/signup">
    @csrf
    <h1 class="h3 mb-3 fw-normal text-center">Sign Up</h1>

    <div class="container mb-3">
      <label for="inputName" class="visually-hidden">Name</label>
      <input
        type="text"
        id="name"
        name="name"
        value="{{ old('name') }}"
        class="form-control"
        placeholder="Your Names"
        autofocus
        required
      />

      @error('name')
      <div class="text-danger mt-2 ml-1">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="container mb-3">
      <label for="inputEmail" class="visually-hidden">Email address</label>
      <input
        type="email"
        id="email"
        name="email"
        value="{{ old('email') }}"
        class="form-control"
        placeholder="Your Email address"
        required
      />
      @error('email')
      <div class="text-danger mt-2 ml-1">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="container mb-3">
      <label for="inputPassword" class="visually-hidden">Password</label>
      <input
        type="password"
        id="password"
        name="password"
        class="form-control"
        placeholder="Password"
        required
      />
      @error('password')
      <div class="text-danger mt-2 ml-1">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="container mb-3">
      <label for="password2" class="visually-hidden">Confirm Password</label>
      <input
        type="password"
        id="password2"
        name="password_confirmation"
        class="form-control"
        placeholder="Confirm Password"
        required
      />
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">
      Sign Up
    </button>
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