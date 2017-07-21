<?php

namespace Octava\MySlow\MessageBus;

use Symfony\Bridge\Monolog\Logger;

class CollectHandler
{
    /**
     * @var Logger
     */
    protected $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function handle(CollectMessage $message)
    {
        $this->logger->info('aaa');
    }
}
