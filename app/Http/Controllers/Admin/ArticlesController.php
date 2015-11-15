<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Admin\Controller;
use App\Storage\ArticleRepositoryInterface as ArticleRepository;
use App\Events\Article\WasCreated as ArticleWasCreated;
use App\Events\Article\WasUpdated as ArticleWasUpdated;
use App\Events\Article\WasDeleted as ArticleWasDeleted;
use App\Events\ExceptionOccurred;
use Exception;

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

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = $this->articleRepository->create($request->all());

        event(new ArticleWasCreated($article));

        return redirect()->route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->findOrFail($id);

        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = $this->articleRepository->findOrFail($id);

        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = $this->articleRepository->update($id, $request->all());

        event(new ArticleWasUpdated($article));

        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->articleRepository->delete($id);
        } catch (Exception $ex) {
            event(new ExceptionOccurred($ex));
            
            return response()->json([
                'error' => [
                    'message' => $ex->getMessage(),
                ]
            ]);
        }

        event(new ArticleWasDeleted());

        return response()->json();
    }
}
