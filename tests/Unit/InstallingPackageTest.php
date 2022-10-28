<?php
namespace Henrotaym\LaravelTrustupTaskIoCommon\Tests\Unit;

use Henrotaym\LaravelTrustupTaskIoCommon\Tests\TestCase;
use Henrotaym\LaravelPackageVersioning\Testing\Traits\InstallPackageTest;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\TaskContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Models\UserContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\ShowTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\IndexTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\StoreTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\UpdateTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Requests\Task\DestroyTaskRequestContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Models\TaskTransformerContract;
use Henrotaym\LaravelTrustupTaskIoCommon\Contracts\Transformers\Models\UserTransformerContract;
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
        $this->app->make(TaskContract::class); 
        $this->app->make(UserContract::class); 

        // Requests
        $this->app->make(DestroyTaskRequestContract::class); 
        $this->app->make(IndexTaskRequestContract::class); 
        $this->app->make(ShowTaskRequestContract::class); 
        $this->app->make(StoreTaskRequestContract::class); 
        $this->app->make(UpdateTaskRequestContract::class); 

        // Transformers
        
            // Models 
            $this->app->make(TaskTransformerContract::class); 
            $this->app->make(UserTransformerContract::class); 
            // Requests
            $this->app->make(DestroyTaskRequestTransformerContract::class); 
            $this->app->make(IndexTaskRequestTransformerContract::class); 
            $this->app->make(ShowTaskRequestTransformerContract::class); 
            $this->app->make(StoreTaskRequestTransformerContract::class); 
            $this->app->make(UpdateTaskRequestTransformerContract::class);
        $this->assertTrue(true);
    }

    /** @test */
    public function creatingTask()
    {
        /** @var TaskContract */
        $task = $this->app->make(TaskContract::class);

        $task->setAppKey('invoicing')
            ->setDoneAt(null)
            ->setDueDate(now())
            ->setIsHavingDueDateTime(true)
            ->setModelId(35)
            ->setModelType('professional')
            ->setOptions(['some' => ['nested' => "values"]])
            ->setTitle("Un super titre")
            ->setUsers(collect());

        $this->assertInstanceOf(TaskContract::class, $task);
    }

    /** @test */
    public function transformingTask()
    {
        $task = $this->getBasicTask();
        /** @var TaskTransformerContract */
        $transformer = $this->app->make(TaskTransformerContract::class);
        dd($transformed = $transformer->toArray($task));

        $retransformed = $transformer->fromArray($transformed);

        $this->assertInstanceOf(TaskContract::class, $retransformed);
        $this->assertIsArray($transformed);
    }

    protected function getBasicTask(): TaskContract
    {
        /** @var TaskContract */
        $task = $this->app->make(TaskContract::class);

        return $task->setAppKey('invoicing')
            ->setDoneAt(null)
            ->setDueDate(now())
            ->setIsHavingDueDateTime(true)
            ->setModelId(35)
            ->setModelType('professional')
            ->setAccountUuid('test')
            ->setProfessionalAuthorizationKey('testastos')
            ->setOptions(['some' => ['nested' => "values"]])
            ->setTitle("Un super titre")
            ->setUsers(collect());
    }
}