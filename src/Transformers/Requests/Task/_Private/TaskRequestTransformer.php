<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\_Private;

use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\_Private\TaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Models\TaskTransformerContract;

abstract class TaskRequestTransformer
{
    protected TaskTransformerContract $taskTransformer;

    public function __construct(
        TaskTransformerContract $taskTransformer
    ) {
        $this->taskTransformer = $taskTransformer;
    }

    public function setRequestFromAttributes(TaskRequestContract $request, array $attributes): TaskRequestContract
    {
        return $request->setTask($attributes['task']);
    }

    public function toArrayFromRequest(TaskRequestContract $request): array
    {
        return [
            'task' => $request->getTask()
        ];
    }
}