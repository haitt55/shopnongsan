<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;
use App\Http\Controllers\Admin\Controller;
use App\Storage\PageRepositoryInterface as PageRepository;
use Exception;

class PagesController extends Controller
{
    protected $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = $this->pageRepository->all();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        $this->pageRepository->create($request->all());

        flash()->success('Success!', 'Page successfully created.');

        return redirect()->route('admin.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = $this->pageRepository->findOrFail($id);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->pageRepository->findOrFail($id);

        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        $this->pageRepository->update($id, $request->all());

        flash()->success('Success!', 'Page successfully updated.');

        return redirect()->route('admin.pages.index');
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
            $this->pageRepository->delete($id);
        } catch (Exception $ex) {
            flash()->error('Error!', $ex->getMessage());
            
            return response()->json([
                'error' => [
                    'message' => $ex->getMessage(),
                ]
            ]);
        }

        flash()->success('Success!', 'Page successfully deleted.');

        return response()->json();
    }
}
