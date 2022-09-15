<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task;

use Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task\_Private\TaskUuidRequest;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\DestroyTaskRequestContract;

class DestroyTaskRequest extends TaskUuidRequest implements DestroyTaskRequestContract
{
    
}