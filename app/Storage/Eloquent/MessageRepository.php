<?php

namespace App\Storage\Eloquent;

use App\Storage\MessageRepositoryInterface;

class MessageRepository extends Repository implements MessageRepositoryInterface
{
    public function unread()
    {
        return $this->model->unread();
    }
}
?>