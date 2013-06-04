<?php

namespace CmdTest\Command;

class CommandClient
{
    /** @var CommandInvoker */
    private $commandInvoker;

    /**
     * @param SingleCommand $command
     * @param CommandInvoker $commandInvoker
     */
    public function __construct(SingleCommand $command, CommandInvoker $commandInvoker = null)
    {
        $commandInvoker = is_null($commandInvoker) ? new CommandInvoker() : $commandInvoker;
        $commandInvoker->setCommand($command);
        $this->commandInvoker = $commandInvoker;
    }

    /**
     * @return CommandInvoker
     */
    protected function getCommandInvoker()
    {
        return $this->commandInvoker;
    }

    public function execute()
    {
        $this->getCommandInvoker()->execute();
    }
}