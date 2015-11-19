@extends('layouts.master')

@section('title', 'Blog')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Company
                <strong>blog</strong>
            </h2>
            <hr>
        </div>
        @foreach ($articles as $article)
        <div class="col-lg-12 text-center">
            {!! $article->image ? image(config('article.image_path') . '/' . $article->image, array('class' => 'img-responsive img-border img-full')) : '' !!}
            <h2>{{ $article->title }}
                <br>
                <small>{{ date('F d, Y', strtotime($article->created_at)) }}</small>
            </h2>
            <p>{!! $article->excerpt !!}</p>
            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-default btn-lg">Read More</a>
            <hr>
        </div>
        @endforeach
        <div class="col-lg-12 text-center">
            <ul class="pager">
                @if ($articles->currentPage() > 1)
                <li class="previous"><a href="{!! $articles->previousPageUrl() !!}">&larr; Older</a></li>
                @endif
                @if ($articles->currentPage() < $articles->lastPage())
                <li class="next"><a href="{!! $articles->nextPageUrl() !!}">Newer &rarr;</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>

@endsection