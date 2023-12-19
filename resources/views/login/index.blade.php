@extends('login.layout.main')

@section('content')

<div class="login">
    <div class="frame">
    <form action="/" method="post">
        @csrf
        <div class="text-wrapper">Sign in</div>
        <div class="overlap-group">
          <input type="email" id="email" name="email" class="div" autofocus="true" required placeholder="Email" autofocus value="{{ old('email') }}">
        </div>
        <div class="overlap">
          <input type="password" id="password" name="password" class="div" placeholder="Password" required>
        </div>
        <div class="div-wrapper">
          <button type="submit" class="text-wrapper-2">Login</button>
        </div>
    </form>
    </div>
    <div class="group">
      <div class="text-wrapper-3">WELCOME!</div>
      <img class="line" src="img/line-1.svg" />
      <p class="p">To Our Company</p>
    </div>
  </div>

@endsection
