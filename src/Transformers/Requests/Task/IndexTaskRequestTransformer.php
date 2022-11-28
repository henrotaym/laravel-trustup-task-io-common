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

        if ($modelId = $attributes['model_id'] ?? null) $request->setModelId($modelId);
        if ($modelType = $attributes['model_type'] ?? null) $request->setModelType($modelType);

        return $request->setAppKey($attributes['app_key'] ?? null)
            ->setProfessionalAuthorizationKey($attributes['professional_authorization_key'] ?? null)
            ->setAccountUuid($attributes['account_uuid'] ?? null)
            ->setStatus(
                TaskStatus::tryFrom($attributes['status'] ?? '') ??
                    TaskStatus::ALL
            )
            ->setUserIds(collect($attributes['user_ids'] ?? null))
            ->orderByLatestDueDate($attributes['latest_due_date'] ?? false)
            ->orderByOldestDueDate($attributes['oldest_due_date'] ?? false);
    }

    public function toArray(IndexTaskRequestContract $request): array
    {
        return [
            'model_id' => $request->getModelId(),
            'model_type' => $request->getModelType(),
            'app_key' => $request->getAppKey(),
            'professional_authorization_key' => $request->getProfessionalAuthorizationKey(),
            'account_uuid' => $request->getAccountUuid(),
            'status' => $request->getStatus()->value,
            'user_ids' => $request->getUserIds()->all(),
            'latest_due_date' => $request->isOrderingByLatestDueDate(),
            'oldest_due_date' => $request->isOrderingByOldestDueDate()
        ];
    }
}