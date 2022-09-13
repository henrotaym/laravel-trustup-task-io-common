<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task;

use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\IndexTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Requests\Task\IndexTaskRequestTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\_Private\TaskRequestTransformer;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\Traits\IsTaskRequestTransformer;

class IndexTaskRequestTransformer extends TaskRequestTransformer implements IndexTaskRequestTransformerContract
{
    public function fromArray(array $attributes): IndexTaskRequestContract
    {
        $request = app()->make(IndexTaskRequestContract::class);

        return $this->setRequestFromAttributes($request, $attributes);
    }

    public function toArray(IndexTaskRequestContract $request): array
    {
        return $this->toArrayFromRequest($request);
    }
}