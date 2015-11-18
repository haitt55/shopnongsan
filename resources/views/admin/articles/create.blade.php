@extends('admin.layouts.master')

@section('title', 'Add Article')

@section('css')
    @parent

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Articles</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12 text-right">
            <a href="{{ route('admin.articles.index') }}" class="btn btn-success"><i class="fa fa-list"></i> List</a>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Article
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data" role="form">
                                @include('admin.layouts.partials.errors')
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="excerpt">Excerpt</label>
                                    <textarea name="excerpt" id="excerpt">{{ old('excerpt') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="content">{{ old('content') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="author">Author</label>
                                    <select name="author_id" id="author_id" class="form-control">
                                        @foreach ($authorsList as $k => $v)
                                        <option value="{{ $k }}"{{ (old('author_id') == $k) ? ' selected="selected"' : '' }}>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="page_title">Page Title</label>
                                    <input type="text" name="page_title" id="page_title" class="form-control" value="{{ old('page_title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_keyword">Meta Keyword</label>
                                    <input type="text" name="meta_keyword" id="meta_keyword" class="form-control" value="{{ old('meta_keyword') }}">
                                </div>
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ old('meta_description') }}">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="published" id="published" value="1"{{ old('published', true) ? ' checked="checked"' : '' }}> Visible</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo">Featured Image</label>
                                    <div class="dropzone" id="photo"></div>
                                    <input type="hidden" name="image">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
@endsection

@section('javascript')
    @parent

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
@endsection

@section('inline_scripts')
    <script type="text/javascript">
    $(document).ready(function() {
        $('#excerpt').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null
        });
        $('#content').summernote({
            height: 300,
            minHeight: null,
            maxHeight: null
        });
        Dropzone.options.photo = {
            url: "{{ route('admin.articles.addPhoto') }}",
            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            acceptedFiles: 'image/*',
            maxFiles: 1,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
            },
            init: function() {
                this.on("success", function(file, response) {
                    $('input[name="image"]').val(response.fileName);
                });
            }
        };
    });
    </script>
@endsection