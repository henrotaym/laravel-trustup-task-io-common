<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Models;

use Carbon\Carbon;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\TaskContract;
use Illuminate\Support\Collection;
use Henrotaym\LaravelTrustupTaskIoCommon\Models\Traits\IsTaskModel;

class Task implements TaskContract
{
    protected ?int $id = null;
    protected ?string $uuid = null;
    protected string $title;
    protected ?Carbon $doneAt = null;
    protected Carbon $dueDate;
    protected bool $havingDueDateTime = false;
    protected Collection $users;

    use IsTaskModel;
}