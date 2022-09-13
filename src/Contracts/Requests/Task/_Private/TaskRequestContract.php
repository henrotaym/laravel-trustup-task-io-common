<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\_Private;

use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\TaskContract;

interface TaskRequestContract
{
    /** @return static */
    public function setTask(TaskContract $task): TaskRequestContract;

    public function getTask(): TaskContract;
}