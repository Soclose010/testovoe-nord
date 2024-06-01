<?php

namespace App\Dto;

class SortDto
{
    public readonly string $username;
    public readonly string $email;
    public readonly string $created_at;

    private function __construct()
    {
    }
    public static function fromArray(array $data): SortDto
    {
        $dto = new self();
        $dto->username = $data['username'] ?? "desc";
        $dto->email = $data['email'] ?? "desc";
        $dto->created_at = $data['created_at'] ?? "desc";
        return $dto;
    }
}
