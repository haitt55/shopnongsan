@extends('layouts.master')

@section('title', $page->page_title)

@section('meta_keyword', $page->meta_keyword)

@section('meta_description', $page->meta_description)

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">{{ $page->title }}</h2>
            <hr>
        </div>
        <div class="col-md-6">
            <img class="img-responsive img-border-left" src="/templates/web/business-casual/img/slide-2.jpg" alt="">
        </div>
        <div class="col-md-6">
            {!! $page->content !!}
        </div>
        <div class="clearfix"></div>
    </div>
</div>

@endsection