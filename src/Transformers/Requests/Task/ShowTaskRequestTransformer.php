<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task;

use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\ShowTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Requests\Task\ShowTaskRequestTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\_Private\TaskUuidRequestTransformer;

class ShowTaskRequestTransformer extends TaskUuidRequestTransformer implements ShowTaskRequestTransformerContract
{
    public function fromArray(array $attributes): ShowTaskRequestContract
    {
        /** @var ShowTaskRequestContract */
        $request = app()->make(ShowTaskRequestContract::class);

        return $this->setRequestFromAttributes($request, $attributes);
    }

    public function toArray(ShowTaskRequestContract $request): array
    {
        return $this->toArrayFromRequest($request);
    }
}