@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Requirement</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Requirement </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                @include('alerts.alerts')
                <div class="card card-primary">

                    <div class="pull-right" style="margin: 20px;">
                        <a class="btn btn-primary" href="{{ route('admin.requirement.index') }}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.requirement.store') }}" method="post">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="requirementname">Name</label>
                                <input type="name" name="name" class="form-control" placeholder="Enter ..." required
                                    value="{{ old('name') }}">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="position">Number of Positions</label>
                                    <input type="number" name="position" class="form-control" placeholder="Enter ..."
                                        value="{{ old('position') }}"required>
                                </div>
                                <div class="col-6">
                                    <label for="experience">Experience</label>
                                    <input type="number" name="experience" class="form-control" placeholder="Enter ..."
                                        value="{{ old('experience') }}" required>
                                </div>

                            </div><br>
                            <div class="form-group">
                                <label for="experience">Description </label>
                                <textarea id="description" class="form-control" name="description" rows="3" placeholder="Enter ..."
                                    value="{{ old('description') }}"required></textarea>

                            </div>
                            <br>
                            <label for="experience">Required Skills </label>&nbsp;
                            <img class="add_field_button" src="{{ asset('\back\dist\img\add-icon.png') }}" alt=""
                                height="25px" weidth="25px">
                            <div class=" input_fields_wrap">
                                <div class="input-group input-group-sm mb-3">
                                    <input type="text" name="skillName[]" class="form-control m-input"
                                        placeholder="Enter " autocomplete="off" required>

                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection
    @section('script')
        <script>
            $('#description').summernote();

            $(document).ready(function() {
                var max_fields = 4; //maximum input boxes allowed
                var wrapper = $(".input_fields_wrap"); //Fields wrapper
                var add_button = $(".add_field_button"); //Add button ID

                var x = 1; //initlal text box count
                $(add_button).click(function(e) { //on add input button click
                    e.preventDefault();
                    if (x < max_fields) { //max input box allowed
                        x++; //text box increment
                        $(wrapper).append(
                            '<div class="input-group input-group-sm mb-3"><input type="text" name="skillName[]" class="form-control m-input"/ placeholder="Enter " required>&nbsp;&nbsp;<img class="remove_field" src="https://cdn1.iconfinder.com/data/icons/round-ui/183/46-512.png" alt="Remove" height="25px" weidth="25px"></div>'
                        ); //add input box
                    }
                });

                $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                    e.preventDefault();
                    $(this).parent('div').remove();
                    x--;
                })
            });
        </script>
    @endsection
