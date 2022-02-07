<?php

namespace App\Services;

use Exception;
use App\Models\Thread;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ThreadService
{
    /**
     * Create new Thread and first new message.
     * @param array $data
     * @return Thread $thread
     */
    public function createNewThread(array $data, string $user_id){
        DB::beginTransaction();
        try {
            $thread_data = $this->getThreadData($data['name'], $user_id);
            $thread = Thread::create($thread_data);

            $message_data = $this->getMessageData($data['content'], $user_id, $thread -> id);
            Message::create($message_data);
        } catch (Exeption $error) {
            DB::rollback();
            Log::error($error->getMessage());
            throw new Exception($error->getMessage());
        }
        DB::commit();

        return $thread;
    }

    /**
     * get Thread Data
     * @param string $thread_name
     * @param string $user_id
     * @return array
     */
    public function getThreadData(string $thread_name, string $user_id)
    {
        return [
            'name' => $thread_name,
            'user_id' => $user_id,
            'latest_comment_time' => Carbon::now(),
        ];
    }

    /**
     * get Message Data
     * @param string $message
     * @param string $user_id
     * @param string $thread_id
     * @return array
     */
    public function getMessageData(string $message, string $user_id, string $thread_id)
    {
        return [
            'body' => $message,
            'user_id' => $user_id,
            'thread_id' => $thread_id,
        ];
    }

}