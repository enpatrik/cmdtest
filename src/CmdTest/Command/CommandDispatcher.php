<?php

namespace CmdTest\Command;

class CommandDispatcher implements CommandManager
{
    /** @var SingleCommand */
    protected $command;
    /** @var CommandInvoker */
    protected $commandInvoker;

    /**
     * @param SingleCommand $command
     * @param CommandInvoker $commandInvoker
     */
    public function __construct(SingleCommand $command, CommandInvoker $commandInvoker = null)
    {
        $this->command = $command;
        $this->commandInvoker = is_null($commandInvoker) ? new CommandInvoker() : $commandInvoker;
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->commandInvoker->executeCommand($this->command);
    }
}