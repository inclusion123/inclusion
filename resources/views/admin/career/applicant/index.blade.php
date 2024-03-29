@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Applicant Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Applicant</li>
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
                <table id="applicantTable" class="table table-bordered table-striped" role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Created At</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </section>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $(function() {
                    $('#applicantTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('admin.career.applicant_data') }}',
                        columns: [{
                                data: 'id',
                            },
                            {
                                data: 'name',
                            },
                            {
                                data: 'email',
                            },
                            {
                                data: 'message',
                            },
                            {
                                data: 'created_at',
                            }
                        ]
                    });
                });
            });
        </script>
    @endsection
