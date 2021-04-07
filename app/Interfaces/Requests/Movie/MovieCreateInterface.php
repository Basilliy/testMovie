<?php

namespace App\Interfaces\Requests\Movie;

interface MovieCreateInterface
{
    public function getTitle(): string;

    public function getDescription(): string;

    public function getYear(): int;

    public function getNameOfDirector(): string;

    public function getReleaseDate(): string;
}