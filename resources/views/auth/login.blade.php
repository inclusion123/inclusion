<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('back\dist\css\login_form.css') }}" rel="stylesheet">
    {{-- @include('admin.layouts.admin_head') --}}
    <link rel="stylesheet" href="{{ asset('back/dist/css/adminlte.min.css') }}">
</head>

<body>
    {{-- <div class="wrapper">
        @include('alerts.alerts')
        <div class="logo">
            <img src="{{ asset('front\img\logo-white.png') }}" alt="">
        </div>

        <form class="p-3 mt-3" action="{{ route('admin.login.post') }}" method="post">
            @csrf

            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="email" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button type="submit" class="btn mt-3">Login</button>
        </form>

    </div> --}}
</body>

</html>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                @include('alerts.alerts')
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Admin Login </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.login.post') }}" method="post">
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

                                    {{-- <div class="form-group">
                                        <span class="far fa-user"></span>
                                        <input type="text" name="email" id="email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <span class="fas fa-key"></span>
                                        <input type="password" name="password" id="pwd" placeholder="Password">
                                    </div> --}}

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
