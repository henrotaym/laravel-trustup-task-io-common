<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Models;

use Carbon\Carbon;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\TaskContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\UserContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Models\TaskTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Models\UserTransformerContract;

class TaskTransformer implements TaskTransformerContract
{
    protected UserTransformerContract $userTransformer;

    public function __construct(
        UserTransformerContract $userTransformer
    ) {
        $this->userTransformer = $userTransformer;
    }

    public function fromArray(array $attributes): TaskContract
    {
        /** @var TaskContract */
        $task = app()->make(TaskContract::class);

        if (isset($attributes['id'])):
            $task->setId($attributes['id']);
        endif;

        if (isset($attributes['uuid'])):
            $task->setUuid($attributes['uuid']);
        endif;

        return $task->setDueDate(
            $attributes['due_date'] ? 
                new Carbon($attributes['due_date'])
                :  null
            )
            ->setTitle($attributes['title'])
            ->setDoneAt(
                $attributes['done_at'] ? 
                    new Carbon($attributes['done_at'])
                    :  null
            )
            ->setIsHavingDueDateTime($attributes['is_having_due_date_time'] ?? null)
            ->setOptions($attributes['options'] ?? [])
            ->setUsers(collect($attributes['users'] ?? [])->map(fn(array $rawUser) => 
                $this->userTransformer->fromArray($rawUser)
            ))
            ->setAppKey($attributes['app_key'])
            ->setModelId($attributes['model_id'])
            ->setModelType($attributes['model_type']);
    }

    public function toArray(TaskContract $task): array
    {
        return [
            'id' => $task->getId(),
            'uuid' => $task->getUuid(),
            'title' => $task->getTitle(),
            'is_done' => $task->isDone(),
            'done_at' => $task->getDoneAt(),
            'due_date' => $task->getDueDate(),
            'is_having_due_date_time' => $task->isHavingDueDateTime(),
            'users' => dd($task->getUsers())->map(fn (UserContract $user) =>
                $this->userTransformer->toArray($user)
            ),
            'app_key' => $task->getAppKey(),
            'model_id' => $task->getModelId(),
            'model_type' => $task->getModelType(),
            'options' => $task->getOptions()
        ];
    }
}