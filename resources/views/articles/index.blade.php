@extends('layouts.master')

@section('title', 'Articles')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Company
                <strong>articles</strong>
            </h2>
            <hr>
        </div>
        
        @foreach ($articles as $article)
        <div class="col-lg-12 text-center">
            <img class="img-responsive img-border img-full" src="/templates/web/business-casual/img/slide-1.jpg" alt="">
            <h2>{{ $article->title }}
                <br>
                <small>{{ date('d/m/Y', strtotime($article->created_at)) }}</small>
            </h2>
            <p>{{ $article->excerpt }}</p>
            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-default btn-lg">Read More</a>
            <hr>
        </div>
        @endforeach

        <div class="col-lg-12 text-center">
            <ul class="pager">
                <li class="previous"><a href="#">&larr; Older</a>
                </li>
                <li class="next"><a href="#">Newer &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>

@endsection