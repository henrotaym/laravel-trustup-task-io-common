<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task;

use Henrotaym\LaravelTrustupTaskIoCommon\Enum\Requests\Task\TaskStatus;

interface IndexTaskRequestContract
{
    public function getModelId(): int;

    /** @return static */
    public function setModelId(int $modelId): IndexTaskRequestContract;

    public function getModelType(): string;

    /** @return static */
    public function setModelType(string $modelType): IndexTaskRequestContract;

    public function getAppKey(): ?string;

    /** @return static */
    public function setAppKey(string $appKey): IndexTaskRequestContract;

    public function getStatus(): TaskStatus;

    public function setStatus(TaskStatus $status);
}