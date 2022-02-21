<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Http\Controllers\Controller;
use App\Models\Thread;
use Exception;

class AdminMessageController extends Controller
{
    /**
     * The MessageRepository implementation
     *
     * @var MessageRepository
     */
    protected $message_repository;

    public function __construct(
        MessageService $message_repository,
    ) {
        $this -> middleware('auth:admin');
        $this -> message_repository = $message_repository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request, int $id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param Thread $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($thread, $id)
    {
        try {
            $thread = $this -> message_repository -> deleteMessage($id);
        } catch (Exception $error) {
            return redirect() -> route('admin.threads.show', $thread -> id) -> with('error', 'メッセージの削除に失敗しました。');
        }
        return redirect() -> route('admin.threads.show', $thread -> id) -> with('success', 'メッセージの削除に成功しました。');
    }
}
