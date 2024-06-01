<?php

namespace App\Dto;

class EntryDto
{
    public readonly ?int $id;
    public readonly ?string $username;
    public readonly ?string $email;
    public readonly ?string $body;
    public readonly ?string $captcha;
    public readonly ?string $ip;
    public readonly ?string $browser;

    private function __construct()
    {
    }

    public static function fromArray(array $data): EntryDto
    {
        $dto = new self();
        $dto->id = $data['id'] ?? null;
        $dto->username = $data['username'] ?? null;
        $dto->email = $data['email'] ?? null;
        $dto->body = $data['body'] ?? null;
        $dto->captcha = $data['captcha'] ?? null;
        $dto->ip = $data['ip'] ?? null;
        $dto->browser = $data['browser'] ?? null;
        return $dto;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
