@extends('layouts.master')

@section('title', $page->page_title)

@section('meta_keyword', $page->meta_keyword)

@section('meta_description', $page->meta_description)

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Contact
                <strong>{{ app_settings('name') }}</strong>
            </h2>
            <hr>
        </div>
        <div class="col-md-8">
            <!-- Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! -->
        </div>
        <div class="col-md-4">
            <p>Phone:
                <strong>{{ app_settings('phone') }}</strong>
            </p>
            <p>Email:
                <strong><a href="mailto:{{ app_settings('email') }}">{{ app_settings('email') }}</a></strong>
            </p>
            <p>Address:
                <strong>{{ app_settings('address') }}</strong>
            </p>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Contact
                <strong>form</strong>
            </h2>
            <hr>
            {!! $page->content !!}
            <form method="POST" action="{{ route('messages.store') }}" role="form">
                @include('admin.layouts.partials.errors')
                {!! csrf_field() !!}
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="title">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}">
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group col-lg-12">
                        <label for="content">Message</label>
                        <textarea name="content" id="content" class="form-control" rows="6">{{ old('content') }}</textarea>
                    </div>
                    <div class="form-group col-lg-12">
                        <input type="hidden" name="save" value="contact">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection