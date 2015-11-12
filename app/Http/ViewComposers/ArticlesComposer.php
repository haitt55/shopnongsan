<?php

namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Storage\UserRepositoryInterface as UserRepository;

class ArticlesComposer
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('authorsList', $this->user->all()->lists('name', 'id'));
    }
}