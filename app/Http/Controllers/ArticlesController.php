<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Storage\ArticleRepositoryInterface as ArticleRepository;

class ArticlesController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = $this->articleRepository->all();

        return view('articles.index', compact('articles'));
    }

    public function show($title, $id)
    {
        $article = $this->articleRepository->findOrFail($id);

        return view('articles.show', compact('article'));
    }
}
