<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task;

use Illuminate\Support\Collection;
use Henrotaym\LaravelTrustupTaskIoCommon\Enum\Requests\Task\TaskStatus;

interface IndexTaskRequestContract
{
    public function getModelId(): ?string;

    /** @return static */
    public function setModelId(string $modelId): IndexTaskRequestContract;

    public function getModelType(): ?string;

    /** @return static */
    public function setModelType(string $modelType): IndexTaskRequestContract;

    public function getAppKey(): ?string;

    /** @return static */
    public function setAppKey(?string $appKey): IndexTaskRequestContract;

    public function getProfessionalAuthorizationKey(): ?string;

    /** @return static */
    public function setProfessionalAuthorizationKey(?string $professionalAuthorizationKey): IndexTaskRequestContract;

    public function getAccountUuid(): ?string;

    /** @return static */
    public function setAccountUuid(?string $accountUuid): IndexTaskRequestContract;

    public function getStatus(): TaskStatus;

    /** @return static */
    public function setStatus(TaskStatus $status): IndexTaskRequestContract;

    /** @return Collection<int, int> */
    public function getUserIds(): Collection;

    public function hasUserIds(): bool;

    /** @return static */
    public function addUserId(int $userId): IndexTaskRequestContract;

    /**
     * @param Collection<int, int> $userIds
     * @return static
     */
    public function setUserIds(Collection $userIds): IndexTaskRequestContract;

    /** @return static */
    public function orderByOldestDueDate(bool $isOrdering = true): IndexTaskRequestContract;
    
    /** @return static */
    public function orderByLatestDueDate(bool $isOrdering = true): IndexTaskRequestContract;

    public function isOrderingByOldestDueDate(): bool;
    
    public function isOrderingByLatestDueDate(): bool;

    /**
     * Telling if request is using model_id and model_type.
     */
    public function isStandardRequest(): bool;
}