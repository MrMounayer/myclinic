<?php

namespace App\Enums;

enum UserType
{
    case ADMIN;
    case DOCTOR;
    case ASSISTANT;

    public function value() : string
    {
        return match ($this) {
            self::ADMIN => 'admin',
            self::DOCTOR => 'doctor',
            self::ASSISTANT => 'assistant',
        };
    }

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Admin',
            self::DOCTOR => 'Doctor',
            self::ASSISTANT => 'Assistant',
        };
    }
    public function color(): string
    {
        return match ($this) {
            self::ADMIN => 'bg-blue-500',
            self::DOCTOR => 'bg-green-500',
            self::ASSISTANT => 'bg-yellow-500',
        };
    }
    public function icon(): string
    {
        return match ($this) {
            self::ADMIN => 'fa-solid fa-user-shield',
            self::DOCTOR => 'fa-solid fa-user-doctor',
            self::ASSISTANT => 'fa-solid fa-user-injured',
        };
    }
}
