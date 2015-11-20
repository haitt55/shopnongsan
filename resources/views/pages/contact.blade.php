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
            <div id="map"></div>
            <input type="text" id="latitude" name="latitude" class="hidden" value="{{ old('latitude', app_settings('latitude')) }}"/>
            <input type="text" id="longitude" name="longitude" class="hidden" value="{{ old('longitude', app_settings('longitude')) }}"/>
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

@section('inline_scripts')
    @parent
    
    <script>
        var latitude = parseFloat("{{ app_settings('latitude') }}");
        var longitude = parseFloat("{{ app_settings('longitude') }}");
        var marker;

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: {lat: latitude, lng: longitude}
            });

            marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: {lat: latitude, lng: longitude}
            });
            marker.addListener('click', toggleBounce);
            marker.addListener('dragend', function(evt){
                $('#latitude').val(evt.latLng.lat().toFixed(5));
                $('#longitude').val(evt.latLng.lng().toFixed(5));
            })
        }

        function toggleBounce() {
            if (marker.getAnimation() !== null) {
                marker.setAnimation(null);
            } else {
                marker.setAnimation(google.maps.Animation.BOUNCE);
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={!! config('services.google.api_key') !!}&signed_in=true&callback=initMap"></script>
@endsection