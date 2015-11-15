<?php

namespace App\Storage;

interface MessageRepositoryInterface extends RepositoryInterface
{
    public function unread();
}
?>