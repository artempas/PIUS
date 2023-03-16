<?php

namespace Labs;

class Comment{
    public $text;
    public $user;
    public function __construct(User $user, string $text)
    {
        $this->user=$user;
        $this->text=$text;
    }
}