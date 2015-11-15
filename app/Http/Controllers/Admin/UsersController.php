<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Admin\Controller;
use App\Storage\UserRepositoryInterface as UserRepository;
use App\Events\User\WasCreated as UserWasCreated;
use App\Events\User\WasUpdated as UserWasUpdated;
use App\Events\User\WasDeleted as UserWasDeleted;
use App\Events\ExceptionOccurred;
use Exception;

class UsersController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = $this->userRepository->create($request->all());

        event(new UserWasCreated($user));

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->userRepository->update($id, $request->all());

        event(new UserWasUpdated($user));

        return redirect()->route('admin.users.index');
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
            $this->userRepository->delete($id);
        } catch (Exception $ex) {
            event(new ExceptionOccurred($ex));
            
            return response()->json([
                'error' => [
                    'message' => $ex->getMessage(),
                ]
            ]);
        }

        event(new UserWasDeleted());

        return response()->json();
    }
}
