<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Admin\Controller;
use App\Storage\MessageRepositoryInterface as MessageRepository;
use App\Events\Message\WasRead as MessageWasRead;
use App\Events\Message\WasDeleted as MessageWasDeleted;
use App\Events\ExceptionOccurred;
use Exception;

class MessagesController extends Controller
{
    protected $messageRepository;

    public function __construct(MessageRepository $messageRepository)
    {
        $this->messageRepository = $messageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = $this->messageRepository->all();

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = $this->messageRepository->findOrFail($id);

        event(new MessageWasRead($message));

        return view('admin.messages.show', compact('message'));
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
            $this->messageRepository->delete($id);
        } catch (Exception $ex) {
            event(new ExceptionOccurred($ex));
            
            return response()->json([
                'error' => [
                    'message' => $ex->getMessage(),
                ]
            ]);
        }

        event(new MessageWasDeleted());

        return response()->json();
    }
}
