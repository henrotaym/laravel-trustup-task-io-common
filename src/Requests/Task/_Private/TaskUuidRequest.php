<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task\_Private;

use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\_Private\TaskUuidRequestContract;

class TaskUuidRequest implements TaskUuidRequestContract
{
    protected string $uuid;

    /** @return static */
    public function setUuid(string $uuid): TaskUuidRequestContract
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getUuid(): string
    {
        return $this->uuid;
    }
}