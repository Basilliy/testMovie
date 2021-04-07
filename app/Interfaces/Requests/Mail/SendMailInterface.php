<?php

namespace App\Interfaces\Requests\Mail;

interface SendMailInterface
{
    public function getMail(): string;

    public function getText(): string;
}