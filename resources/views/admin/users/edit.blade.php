@extends('admin.layouts.master')

@section('title', 'Edit User')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('admin.users.index') }}" class="btn btn-success"><i class="fa fa-list"></i> List</a>
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit User
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="POST" action="{{ route('admin.users.update', $user->id) }}" role="form">
                                @include('admin.layouts.partials.errors')
                                {{ csrf_field() }}
                                {!! method_field('put') !!}
                                <div class="form-group">
                                    <label for="name">Name:</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button class="btn btn-danger" id="btn-delete" data-link="{{ route('admin.users.destroy', $user->id) }}"><i class="fa fa-remove"></i> Delete user</button>
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

    <script type="text/javascript">
    $(document).ready(function() {
        $("#btn-delete").click(function() {
            if (confirm('Do you really want to delete this data?')) {
                var url = $(this).attr('data-link');
                $.ajax({
                    url : url,
                    type : 'DELETE',
                    beforeSend: function (xhr) {
                        var token = $('meta[name="csrf_token"]').attr('content');
                        if (token) {
                              return xhr.setRequestHeader('X-CSRF-TOKEN', token);
                        }
                    },
                    success: function(data) {
                        if (data.error) {
                            window.location.href = '{{ URL::route('admin.users.edit', $user->id) }}';
                        } else {
                            window.location.href = '{{ URL::route('admin.users.index') }}';
                        }
                    },
                    error: function(data) {
                        window.location.href = '{{ URL::route('admin.users.index') }}';
                    }
                });
            }
        });
    });
    </script>
@endsection