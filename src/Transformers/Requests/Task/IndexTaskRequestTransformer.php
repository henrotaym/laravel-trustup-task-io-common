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
            ->setModelId($attributes['model_id'] ?? null)
            ->setModelType($attributes['model_type'] ?? null)
            ->setProfessionalAuthorizationKey($attributes['professional_authorization_key'] ?? null)
            ->setAccountUuid($attributes['account_uuid'] ?? null)
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
            'professional_authorization_key' => $request->getProfessionalAuthorizationKey(),
            'account_uuid' => $request->getAccountUuid(),
            'status' => $request->getStatus()->value,
        ];
    }
}