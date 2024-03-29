<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inclusion Admin Login</title>
    <link href="{{ asset('back\dist\css\login_form.css') }}" rel="stylesheet">
    {{-- @include('admin.layouts.admin_head') --}}
    <link rel="stylesheet" href="{{ asset('back/dist/css/adminlte.min.css') }}">
</head>

<body>
    
    @include('alerts.alerts')
    <section class="login__contant" >
        <div class="container">
            <div class="row" id="form_login">
                <!-- left column -->
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="login__logo">                        
                        <a href="{{ route('admin.dashboard') }}" class="brand-logo">
                            <img src="{{ asset('front\img\logo.png') }}" alt="Inclusion Logo" class="brand-image img-round ">
                            {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
                        </a>
                    </div>
                    <div class="card card-primary">
                        <div class="login-header">
                            <h3 class="card-title">Admin Login </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.login.post') }}" method="post" >
                            @csrf
                            <div class="container">
                                <div class="container">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" class="form-control" name="password" id="pwd"
                                                placeholder="Enter Password">
                                        </div>
    
                              
    
                                    </div>
                                    <!-- /.card-body -->
    
                                    <div class="login__btn">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    </section> 
</body>

</html>


