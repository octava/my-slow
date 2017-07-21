<?php

namespace Octava\MySlow\Command;

use Octava\MySlow\MessageBus\CollectMessage;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CollectCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('my-slow:collect')
            ->setDescription('Collect slow query');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $logger = $this->getContainer()->get('logger');
        $logger->debug('Start command', ['name' => $this->getName()]);

        $message = new CollectMessage();
        $this->getContainer()
            ->get('command_bus')
            ->handle($message);

        $logger->debug('Complete command', ['name' => $this->getName()]);
    }
}
