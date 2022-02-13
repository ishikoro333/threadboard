<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;
use App\Services\MessageService;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
        /**
     * The MessageService implementation
     *
     * @var MessageService
     */
    protected $message_service;

    public function __construct(
        MessageService $message_service
    )
    {
        $this -> middleware('auth');
        $this -> message_service = $message_service;
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
        try {
            $data = $request -> validated();
            $data['user_id'] = Auth::id();
            $message = $this -> message_service -> createNewMessage($data, $id);
            $images = $request -> file('images');
            if ($images) {
                foreach ($images as $image) {
                    $path = Storage::disk('s3') -> put('/', $image);
                    $image = new Image;
                    $image -> s3_file_path = $path;
                    $image -> message_id = $message -> id;
                    $image -> save();
                }
            }
        } catch (Exception $error) {
            return redirect() -> route('threads.show', $id) -> with('error', 'メッセージの投稿ができませんでした。');
        }

        return redirect() -> route('threads.show', $id) -> with('success', 'メッセージを投稿しました。');
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
