<?php

namespace App\Repositories;

use App\Models\Message;

class MessageRepository
{
    /**
     * @var message
     */
    protected $message;

    /**
     * MessageRepository constructor
     *
     * @param message $message
     */
    public function __construct(message $message)
    {
        $this -> message = $message;
    }

    /**
     * Create new message
     *
     * @param array $data
     * @return message $message
     */
    public function create(array $data)
    {
        return $this -> message -> create($data);
    }

    /**
     * Find a message by id
     * @param int $id
     *
     * @return Message $message
     */
    public function FindById(int $id)
    {
        return $this -> message -> find($id);
    }

    /**
     * Delete message from id
     * @param int $id
     *
     * @return void
     */
    public function deleteMessage(int $id)
    {
        $message = $this -> FindById($id);

        return $message -> delete();
    }
}
