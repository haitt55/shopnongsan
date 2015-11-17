@extends('layouts.master')

@section('title', 'Article')

@section('content')

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Company
                    <strong>article</strong>
                </h2>
                <hr>
            </div>
            <div class="col-lg-12 text-center">
                <img class="img-responsive img-border img-full" src="/templates/web/business-casual/img/slide-1.jpg" alt="">
                <h2>{{ $article->title }}
                    <br>
                    <small>{{ date('d/m/Y', strtotime($article->created_at)) }}</small>
                </h2>
            </div>
            <div class="col-lg-12">
                {!! $article->content !!}
                <hr>
            </div>
        </div>
    </div>

@endsection