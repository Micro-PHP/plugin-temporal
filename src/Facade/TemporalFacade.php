<?php

namespace Micro\Plugin\Temporal\Facade;

use Micro\Plugin\Temporal\Configuration\TemporalPluginConfigurationInterface;
use Micro\Plugin\Temporal\Worker\Factory\WorkerFactoryInterface;
use Micro\Plugin\Temporal\Workflow\Client\Repository\ClientRepositoryInterface;
use Temporal\Client\WorkflowClientInterface;
use Temporal\Client\WorkflowOptions;
use Temporal\Internal\Support\Options;
use Temporal\Worker\WorkerFactoryInterface as TemporalWorkerFactoryInterface;

class TemporalFacade implements TemporalFacadeInterface
{
    /**
     * @param ClientRepositoryInterface $clientRepository
     * @param WorkerFactoryInterface $workerFactory
     */
    public function __construct(
        private readonly ClientRepositoryInterface $clientRepository,
        private readonly WorkerFactoryInterface $workerFactory
    )
    {
    }

    /**
     * {@inheritDoc}
     */
    public function workflowClient(string $clientName = TemporalPluginConfigurationInterface::CLIENT_DEFAULT): WorkflowClientInterface
    {
        return $this->clientRepository->client($clientName);
    }

    /**
     * {@inheritDoc}
     */
    public function createWorker(string $workerName = 'default'): TemporalWorkerFactoryInterface
    {
        return $this->workerFactory->create($workerName);
    }

    /**
     * {@inheritDoc}
     */
    public function createOptions(): Options
    {
        return WorkflowOptions::new();
    }
}