@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Service Detail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Service Detail</li>
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
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header" >
                            <div class="">
                                <a class="btn btn-primary" href="{{ route('admin.service.index') }}"> Back</a>
                            </div>
                        </div>
                        {{-- <div class="pull-right"
                        style="text-align: -webkit-right;
                                                ">
                        <a class="btn btn-primary" href="{{ route('.edit', $details->id) }}"> Edit</a> --}}
                    </div>
                        <!-- /.box-header -->
                    </div>
                    <div class="container mt-5">
    
                        <div class="row d-flex justify-content-center">
                            
                            <div class="card-body">
                                <div class="gd-responsive-table">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>{{ __("Service Name") }}</th>
                                            <td> {{$details->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Page Name") }}</th>
                                            <td>{{$details->page_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Meta-Title") }}</th>
                                            <td>{{$details->meta_title}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Meta-Keywords") }}</th>
                                            <td>{{$details->meta_keywords}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Meta-Description") }}</th>
                                            <td>{{$details->meta_description}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Title") }}</th>
                                            <td>{{$details->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Slug") }}</th>
                                            <td>{{$details->slug}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Icon") }}</th>
                                            <td>{{$details->icon}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Description") }}</th>
                                            <td>{!!$details->description!!}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Status") }}</th>
                                            <td><strong> {{\App\Models\Service::get_items($details->status)}} </strong></td>
                                        </tr>
                                        
                                     
        
                                        <tr>
                                            <th>{{ __("Detail Name") }}</th>
                                            <td>{{$details->detail_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __("Detail Description") }}</th>
                                            <td>{!!$details->detail_description!!}</td>
                                        </tr>
                                        {{-- <tr>
                                            <th>{{ __("Joined") }}</th>
                                            <td>{{$details->created_at->diffForHumans()}}</td>
                                        </tr> --}}
        
        
        
                                    </table>
                                    {{-- <button type="submit" class="btn btn-secondary ">{{ __('Submit') }}</button> --}}
                                </div>
                            </div>
                            {{-- <div class="col-md-7">
                                
                                <div class="card p-3 py-4">
                                    
                                    {{-- <div class="text-center">
                                        <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle">
                                    </div> --}}
{{--                                     
                                    <div class="text-center mt-3">
                                        <span class="bg-secondary p-1 px-4 rounded text-white">Service Detail</span>
                                        <h5 class="mt-2 mb-0">{{$details->name}}</h5>
                                        <span>{{$details->page_name}}</span>
                                        
                                        <div class="px-4 mt-1">
                                            <p class="fonts">{!!$details->description!!} </p>
                                        
                                        </div> --}}
                                        
                                         {{-- <ul class="social-list">
                                            <li><i class="fa fa-facebook"></i></li>
                                            <li><i class="fa fa-dribbble"></i></li>
                                            <li><i class="fa fa-instagram"></i></li>
                                            <li><i class="fa fa-linkedin"></i></li>
                                            <li><i class="fa fa-google"></i></li>
                                        </ul> --}}
                                        
                                        {{-- <div class="buttons">
                                            
                                            <button class="btn btn-outline-primary px-4">Message</button>
                                            <button class="btn btn-primary px-4 ms-3">Contact</button>
                                        </div> --}}
                                        
                                        
                                    {{-- </div> --}}
                                    
                                   
                                    
                                    
                                {{-- </div> --}}
                                
                            {{-- </div> --}} 
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        
    @endsection
    @section('script')
    @endsection
