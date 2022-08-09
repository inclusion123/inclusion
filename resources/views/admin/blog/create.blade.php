@extends('admin.layouts.admin_master')
@section('breadcumb')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Blog</li>
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
                    <!-- form start -->
                    <form id="blogForm" action="{{ route('admin.blog.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="blog-meta-title">Meta-Title</label>
                                    <input type="name" name="meta_title" class="form-control" placeholder="Enter ..."
                                        value="{{ old('meta_title') }}">
                                </div>
                                <div class="col-6">
                                    <label for="blog-meta-keywords">Meta-Keywords</label>
                                    <input type="name" id="metaKeywords" data-role="tagsinput" name="meta_keywords"
                                        class="form-control" placeholder="Enter ..." value="{{ old('meta_keywords') }}">
                                </div>

                            </div><br>
                            <div class="form-group">
                                <label for="blog-meta-description">Meta-Description</label>
                                <input type="name" name="meta_description" class="form-control" placeholder="Enter ..."
                                    value="{{ old('meta_description') }}">
                            </div>

                            <div class="form-group">
                                <label for="blogTitle">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter ..." required
                                    value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label>Tags:</label>
                                <br />
                                <input data-role="tagsinput" type="text" name="tags">
                                @if ($errors->has('tags'))
                                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="blogImage">Image</label>
                                <input type="file" name="image" class="form-control" required accept="image/*"/>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote" class="form-control" name="description" rows="3" placeholder="Enter ..." required
                                    value="{{ old('description') }}"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-select" name="category" aria-label="blog Categorie"
                                    value="{{ old('category') }}" required>
                                    <option selected>Select Category</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
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
        $("#summernote").summernote();
    </script>
@endsection
