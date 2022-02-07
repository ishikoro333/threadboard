<?php

namespace APP\Repository;

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
        $this -> message -> $message;
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
}
