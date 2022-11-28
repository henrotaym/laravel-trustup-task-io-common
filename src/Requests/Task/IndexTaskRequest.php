<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task;

use Illuminate\Support\Collection;
use Henrotaym\LaravelTrustupTaskIoCommon\Enum\Requests\Task\TaskStatus;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\IndexTaskRequestContract;

class IndexTaskRequest implements IndexTaskRequestContract
{
    protected ?string $modelId = null;
    protected ?string $modelType = null;
    protected ?string $appKey = null;
    protected ?string $professionalAuthorizationKey = null;
    protected ?string $accountUuid = null;
    protected TaskStatus $status = TaskStatus::ALL;
    /** @var Collection<int, int> */
    protected Collection $userIds;
    protected bool $oldestDueDate = false;
    protected bool $latestDueDate = false;

    public function getModelId(): ?string
    {
        return $this->modelId;
    }

    /** @return static */
    public function setModelId(string $modelId): IndexTaskRequestContract
    {
        $this->modelId = $modelId;

        return $this;
    }

    public function getModelType(): ?string
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

    public function getProfessionalAuthorizationKey(): ?string
    {
        return $this->professionalAuthorizationKey;
    }

    /** @return static */
    public function setProfessionalAuthorizationKey(?string $professionalAuthorizationKey): IndexTaskRequestContract
    {
        $this->professionalAuthorizationKey = $professionalAuthorizationKey;

        return $this;
    }

    public function getAccountUuid(): ?string
    {
        return $this->accountUuid;
    }

    /** @return static */
    public function setAccountUuid(?string $accountUuid): IndexTaskRequestContract
    {
        $this->accountUuid = $accountUuid;

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

    /** @return Collection<int, int> */
    public function getUserIds(): Collection
    {
        return $this->userIds ??
            $this->userIds ?? collect();
    }

    public function hasUserIds(): bool
    {
        return $this->getUserIds()->isNotEmpty();
    }

    /** @return static */
    public function addUserId(int $userId): IndexTaskRequestContract
    {
        $this->getUserIds()->push($userId);

        return $this;
    }

    /**
     * @param Collection<int, int> $userIds
     * @return static
     */
    public function setUserIds(Collection $userIds): IndexTaskRequestContract
    {
        $this->userIds = $userIds;

        return $this;
    }

    /** @return static */
    public function orderByOldestDueDate(bool $isOrdering = true): IndexTaskRequestContract
    {
        $this->oldestDueDate = $isOrdering;

        return $this;
    }
    
    /** @return static */
    public function orderByLatestDueDate(bool $isOrdering = true): IndexTaskRequestContract
    {
        $this->latestDueDate = $isOrdering;

        return $this;
    }

    public function isOrderingByOldestDueDate(): bool
    {
        return $this->oldestDueDate;
    }
    
    public function isOrderingByLatestDueDate(): bool
    {
        return $this->latestDueDate;
    }

    /**
     * Telling if request is using model_id and model_type.
     */
    public function isStandardRequest(): bool
    {
        return !$this->getAccountUuid() && !$this->getProfessionalAuthorizationKey();
    }
}