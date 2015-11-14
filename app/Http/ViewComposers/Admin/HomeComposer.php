<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\Contracts\View\View;
use App\Storage\UserRepositoryInterface as UserRepository;
use App\Storage\PageRepositoryInterface as PageRepository;
use App\Storage\ArticleRepositoryInterface as ArticleRepository;
use App\Storage\MessageRepositoryInterface as MessageRepository;

class HomeComposer
{
    protected $user;

    protected $page;

    protected $article;

    protected $message;

    public function __construct(UserRepository $user,
        PageRepository $page,
        ArticleRepository $article,
        MessageRepository $message)
    {
        $this->user = $user;
        $this->page = $page;
        $this->article = $article;
        $this->message = $message;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('countPages', $this->page->all()->count());
        $view->with('countArticles', $this->article->all()->count());
        $view->with('countMessages', $this->message->all()->count());
        $view->with('countUsers', $this->user->all()->count());
    }
}