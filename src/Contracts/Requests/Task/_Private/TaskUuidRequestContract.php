<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\_Private;

interface TaskUuidRequestContract
{
    /** @return static */
    public function setUuid(string $uuid): TaskUuidRequestContract;

    public function getUuid(): string;
}