<?php

namespace Micro\Plugin\Temporal\Facade;

use Micro\Plugin\Temporal\Configuration\TemporalPluginConfigurationInterface;
use Temporal\Client\WorkflowClientInterface;
use Temporal\Internal\Support\Options;
use Temporal\Worker\WorkerFactoryInterface as TemporalWorkerFactoryInterface;

interface TemporalFacadeInterface
{
    /**
     * @param string $clientName
     *
     * @return WorkflowClientInterface
     */
    public function workflowClient(string $clientName = TemporalPluginConfigurationInterface::CLIENT_DEFAULT): WorkflowClientInterface;

    /**
     * @return Options
     */
    public function createOptions(): Options;

    /**
     * @param string $workerName
     *
     * @return TemporalWorkerFactoryInterface
     */
    public function createWorker(string $workerName = 'default'): TemporalWorkerFactoryInterface;
}