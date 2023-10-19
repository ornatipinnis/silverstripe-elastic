<?php

namespace Firesphere\ElasticSearch\Tests\unit\Tasks;

use Firesphere\ElasticSearch\Services\ElasticCoreService;
use Firesphere\ElasticSearch\Tasks\ElasticConfigureTask;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\Dev\SapphireTest;

class ElasticConfigureTaskTest extends SapphireTest
{
    protected $usesDatabase = true;

    public function testRun()
    {
        $task = new ElasticConfigureTask();

        $this->assertInstanceOf(ElasticCoreService::class, $task->getService());

        $run = $task->run(new HTTPRequest('GET', 'dev/tasks/ElasticConfigureTask', ['istest' => self::$is_running_test]));

        $this->assertNotContains(false, $run);

        // Same, but with clearing
        $run = $task->run(new HTTPRequest('GET', 'dev/tasks/ElasticConfigureTask', ['istest' => self::$is_running_test, 'clear' => true]));

        $this->assertNotContains(false, $run);

    }
}