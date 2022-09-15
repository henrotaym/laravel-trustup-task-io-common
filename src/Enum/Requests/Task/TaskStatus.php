<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Enum\Requests\Task;

enum TaskStatus: string
{
    case ALL = 'all';
    case NOT_DONE = 'not_done'; 
    case DONE = 'done';
}