<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\_Private;

use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\_Private\TaskUuidRequestContract;

abstract class TaskUuidRequestTransformer
{
    public function setRequestFromAttributes(TaskUuidRequestContract $request, array $attributes): TaskUuidRequestContract
    {
        return $request->setUuid($attributes['uuid']);
    }

    public function toArrayFromRequest(TaskUuidRequestContract $request): array
    {
        return [
            'uuid' => $request->getUuid()
        ];
    }
}