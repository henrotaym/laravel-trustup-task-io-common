<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Enum\Requests\Task;

enum TaskStatus: string
{
    case ALL = 'all';
    case NOT_DONE = 'not_done'; 
    case DONE = 'done';

    /** @return array<string> */
    public static function values(): array
    {
        return array_map(
            fn(TaskStatus $case) => $case->value,
            self::cases()
        );
    }
}