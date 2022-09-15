<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task;

use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\IndexTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Requests\Task\IndexTaskRequestTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Enum\Requests\Task\TaskStatus;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\_Private\TaskRequestTransformer;

class IndexTaskRequestTransformer extends TaskRequestTransformer implements IndexTaskRequestTransformerContract
{
    public function fromArray(array $attributes): IndexTaskRequestContract
    {
        /** @var IndexTaskRequestContract */
        $request = app()->make(IndexTaskRequestContract::class);

        return $request->setAppKey($attributes['app_key'] ?? null)
            ->setModelId($attributes['model_id'])
            ->setModelType($attributes['model_type'])
            ->setStatus(
                TaskStatus::tryFrom($attributes['status'] ?? '') ??
                    TaskStatus::ALL
            );
    }

    public function toArray(IndexTaskRequestContract $request): array
    {
        return [
            'model_id' => $request->getModelId(),
            'model_type' => $request->getModelType(),
            'app_key' => $request->getAppKey(),
            'status' => $request->getStatus()->value,
        ];
    }
}