<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task;

use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\IndexTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Enum\Requests\Task\TaskStatus;

class IndexTaskRequest implements IndexTaskRequestContract
{
    protected int $modelId;
    protected string $modelType;
    protected ?string $appKey = null;
    protected TaskStatus $status = TaskStatus::ALL;

    public function getModelId(): int
    {
        return $this->modelId;
    }

    /** @return static */
    public function setModelId(int $modelId): IndexTaskRequestContract
    {
        $this->modelId = $modelId;

        return $this;
    }

    public function getModelType(): string
    {
        return $this->modelType;
    }

    /** @return static */
    public function setModelType(string $modelType): IndexTaskRequestContract
    {
        $this->modelType = $modelType;

        return $this;
    }

    public function getAppKey(): ?string
    {
        return $this->appKey;
    }

    /** @return static */
    public function setAppKey(?string $appKey): IndexTaskRequestContract
    {
        $this->appKey = $appKey;

        return $this;
    }

    public function getStatus(): TaskStatus
    {
        return $this->status;
    }

    /** @return static */
    public function setStatus(TaskStatus $status): IndexTaskRequestContract
    {
        $this->status = $status;

        return $this;
    }
}