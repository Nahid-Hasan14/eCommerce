<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{asset('backend')}}/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('backend')}}/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('backend')}}/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->

    <link href="{{asset('backend')}}/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('backend')}}/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    {{-- {{dd($errors)}} --}}
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" name="email" class="form-control" placeholder="Your Email" required="" />
                            @error('email')
                                <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                            @error('password')
                                <span class="text-danger" style="font-size: 12px;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-100">Log in</button>
                            {{-- <a class="reset_pass" href="#">Lost your password?</a> --}}
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">New to site?
                            {{-- <a href="{{route('admin.register')}}" class="to_register"> Create Account </a> --}}
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                            <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
      </div>
    </div>
  </body>
</html>
