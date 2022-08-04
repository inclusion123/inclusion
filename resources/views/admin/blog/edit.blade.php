@extends('admin.layouts.admin_master')
@section('breadcumb')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->
    @endsection

    @section('content')
    <section class="content">
        <div class="container-fluid">
            @include('alerts.alerts')
            <div class="card card-primary">
                <div class="pull-right" style="margin: 20px;">
                    <a class="btn btn-primary" href="{{ route('admin.blog.index') }}"> Back </a>
                </div>
                <form id="blogForm" action="{{ route('admin.blog.update',$blog->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="blog-meta-title">Meta-Title</label>
                                <input type="name" name="meta_title" class="form-control" 
                                value="{{ $blog->meta_title }}" >
                            </div>
                            <div class="col-6">
                                <label for="blog-meta-keywords">Meta-Keywords</label>
                                <input type="name" id="metaKeywords" data-role="tagsinput" name="meta_keywords"
                                    class="form-control" 
                                    value="{{  $blog->meta_keywords }}">
                            </div>

                        </div><br>
                        <div class="form-group">
                            <label for="blog-meta-description">Meta-Description</label>
                            <input type="name" name="meta_description" class="form-control" 
                                value="{{  $blog->meta_description }}">
                        </div>

                        <div class="form-group">
                            <label for="blogtitle">Title</label>
                            <input type="name" name="title" class="form-control" id="blogtitle"  placeholder="Enter ..." required value="{{ $blog->title }}">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="editBlogDesc" class="form-control" name="description" rows="3" placeholder="Enter ..." required>{{ $blog->description }}</textarea>

                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-select" name="category" aria-label="blog Categorie" required>
                                <option selected>Select Category</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="form-group">
                            @if ($blog->image)
                                <img id="original" class=" mx-auto d-block" src="{{ asset('/storage/images') }}/{{ $blog->image }}"  width="848" height="594" >
                            @endif

                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="blogimage" class="form-label">Image</label>
                                <input class="form-control" name="image" type="file" id="blogimage" value="{{$blog->image}}">
                            </div>
                        </div>

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
        $("#editBlogDesc").summernote();
    </script>
    @endsection