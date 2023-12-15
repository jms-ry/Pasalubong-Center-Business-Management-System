@extends('layouts.app')

@section('content')

<body style="min-height: 100vh; background: url({{ asset('/img/banner.jpg') }}) no-repeat; background-size: cover; background-position: center;">
<script>
 var images = [
  "{{ asset('/img/banner.jpg') }}",
  "{{ asset('/img/bg1.jpg') }}",
  "{{ asset('/img/bg2.jpg') }}",
  "{{ asset('/img/bg3.jpg') }}",
  "{{ asset('/img/bg5.webp') }}",
  "{{ asset('/img/bg6.jpg') }}",
  "{{ asset('/img/bg7.jpg') }}"
];

var index = 0;
var background = document.querySelector('body');
background.style.background = "url(" + images[index] + ") no-repeat";
background.style.backgroundSize = "cover";
background.style.backgroundPosition = "center";

function changeBackground() {
  index = (index + 1) % images.length;
  background.style.transition = "background ease 500ms";
  background.style.background = "url(" + images[index] + ") no-repeat";
  background.style.backgroundSize = "cover";
  background.style.backgroundPosition = "center";
}

setInterval(changeBackground, 5000);
</script> 
    <div class="login-wrapper">
        <section class="left">
            <br>
            <br>
            <img class="vsu" src="{{ asset('/img/vsulogo.png') }}" alt="logo">
            <h1>Office of the Vice President for Research,
                Extension and Innovation
            </h1>
            <div class="outline" style="background-color:#fff; width:500px; height:1px; margin: 0 auto;"></div>
            <h2>Pasalubong Center Business Management System</h2>
        </section>
        <section class="right">
            <form action="{{ route('login') }}" method="POST"  class="login_form">
                @csrf <!-- Add this CSRF token field for Laravel form protection -->
                <h2>Log In</h2>
                <div class="form-element">
                    <label for="username">Email</label>
                    <input type="text" name="email" id="email" placeholder="Enter Email" required>
                </div>
                <div class="form-element">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter Password" required>
                </div>
                <div class="form-element">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <div class="form-element">
                    <button type="submit" id="login_button" class="btn btn-block">LOGIN</button>
                </div>
                @error('message')
                <div class="error-message">{{ $message }}</div>
                @enderror
                <div class="form-element">
                    <a href="#">Forgot Password</a>
                </div>
            </form>
            <div class="mydiv"></div>
        </section>
    </div>
</body>
@endsection