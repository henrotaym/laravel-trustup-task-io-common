<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Tests\Unit;

use Henrotaym\LaravelTrustupTaskIoCommon\Tests\TestCase;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;
use Henrotaym\LaravelTrustupTaskIoCommon\Package;
use Henrotaym\LaravelTrustupTaskIoCommon\Models\Task;
use Henrotaym\LaravelTrustupTaskIoCommon\Models\User;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\TaskContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\UserContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task\ShowTaskRequest;
use Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task\IndexTaskRequest;
use Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task\StoreTaskRequest;
use Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task\UpdateTaskRequest;
use Henrotaym\LaravelTrustupTaskIoCommon\Requests\Task\DestroyTaskRequest;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Models\TaskTransformer;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Models\UserTransformer;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\ShowTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\IndexTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\StoreTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\UpdateTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\DestroyTaskRequestContract;
use Henrotaym\LaravelPackageVersioning\Providers\Abstracts\VersionablePackageServiceProvider;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Models\TaskTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Models\UserTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\ShowTaskRequestTransformer;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\IndexTaskRequestTransformer;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\StoreTaskRequestTransformer;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\UpdateTaskRequestTransformer;
use Henrotaym\LaravelTrustupTaskIoCommon\Transformers\Requests\Task\DestroyTaskRequestTransformer;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Requests\Task\ShowTaskRequestTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Requests\Task\IndexTaskRequestTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Requests\Task\StoreTaskRequestTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Requests\Task\UpdateTaskRequestTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Requests\Task\DestroyTaskRequestTransformerContract;

class InstallingPackageTest extends TestCase
{
    use InstallPackageTest;

    /** @test */
    public function gettingMediaClient()
    {
        dd($this->app->make(TaskContract::class), 
        $this->app->make(UserContract::class), 

        // Requests
        $this->app->make(DestroyTaskRequestContract::class), 
        $this->app->make(IndexTaskRequestContract::class), 
        $this->app->make(ShowTaskRequestContract::class), 
        $this->app->make(StoreTaskRequestContract::class), 
        $this->app->make(UpdateTaskRequestContract::class), 

        // Transformers
        
            // Models 
            $this->app->make(TaskTransformerContract::class), 
            $this->app->make(UserTransformerContract::class), 
            // Requests
            $this->app->make(DestroyTaskRequestTransformerContract::class), 
            $this->app->make(IndexTaskRequestTransformerContract::class), 
            $this->app->make(ShowTaskRequestTransformerContract::class), 
            $this->app->make(StoreTaskRequestTransformerContract::class), 
            $this->app->make(UpdateTaskRequestTransformerContract::class),);
    }
}