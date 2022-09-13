<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task\_Private;

use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\TaskContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\_Private\TaskRequestContract;

abstract class TaskRequest implements TaskRequestContract
{
    protected TaskContract $task;

    /** @return static */
    public function setTask(TaskContract $task): TaskRequestContract
    {
        $this->task = $task;

        return $this;
    }

    public function getTask(): TaskContract
    {
        return $this->task;
    }
}