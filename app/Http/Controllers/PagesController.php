<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Storage\PageRepositoryInterface as PageRepository;
use App\Http\Utilities\TemplateSuffix;

class PagesController extends Controller
{
    protected $pageRepository;

    protected $templateSuffix;

    public function __construct(PageRepository $pageRepository, TemplateSuffix $templateSuffix)
    {
        $this->pageRepository = $pageRepository;
        $this->templateSuffix = $templateSuffix;
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = $this->pageRepository->findBySlug($slug);

        return view($this->templateSuffix->viewName($page->template_suffix), compact('page'));
    }
}
