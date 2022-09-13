<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Models;

use Carbon\Carbon;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\TaskContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Models\Traits\HasOptions;
use Illuminate\Support\Collection;

class Task implements TaskContract
{
    protected int $modelId;
    protected string $modelType;
    protected string $appKey;
    protected ?int $id = null;
    protected ?string $uuid = null;
    protected string $title;
    protected ?Carbon $doneAt = null;
    protected Carbon $dueDate;
    protected bool $havingDueDateTime = false;
    protected Collection $users;

    use HasOptions;

    public function getModelId(): int
    {
        return $this->modelId;
    }

    /** @return static */
    public function setModelId(int $modelId): TaskContract
    {
        return $this->modelId = $modelId;

        return $this;
    }

    public function getModelType(): string
    {
        return $this->modelType;
    }

    /** @return static */
    public function setModelType(string $modelType): TaskContract
    {
        $this->modelType = $modelType;

        return $this;
    }

    public function getAppKey(): ?string
    {
        return $this->appKey;
    }

    /** @return static */
    public function setAppKey(string $appKey): TaskContract
    {
        $this->appKey = $appKey;

        return $this;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    /** @return static */
    public function setId(int $id): TaskContract
    {
        $this->id = $id;

        return $this;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /** @return static */
    public function setUuid(string $uuid): TaskContract
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /** @return static */
    public function setTitle(string $title): TaskContract
    {
        $this->title = $title;

        return $this;
    }

    public function isDone(): bool
    {
        return !!$this->doneAt;
    }

    /** @return static */
    public function setDoneAt(?Carbon $doneAt): TaskContract
    {
        $this->doneAt = $doneAt;

        return $this;
    }

    /** @return static */
    public function getDoneAt(): ?Carbon
    {
        return $this->doneAt;
    }

    /** @return static */
    public function setIsDone(bool $isDone): TaskContract
    {
        return $this->setDoneAt($isDone ? now() : null);
    }

    public function getDueDate(): ?Carbon
    {
        return $this->dueDate;
    }

    /** @return static */
    public function setDueDate(Carbon $dueDate): TaskContract
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function isHavingDueDateTime(): bool
    {
        return $this->havingDueDateTime;
    }

    /** @return static */
    public function setIsHavingDueDateTime(bool $isHavingDueDateTime): TaskContract
    {
        $this->havingDueDateTime = $isHavingDueDateTime;

        return $this;
    }

    /** @return Collection<int, UserContract> */
    public function getUsers(): Collection
    {
        return $this->users ??
            $this->setUsers(collect())->users;
    }

    /** 
     * @param Collection<int, UserContract>
     * @return static
     */
    public function setUsers(Collection $users): TaskContract
    {
        $this->users = $users;

        return $this;
    }
}