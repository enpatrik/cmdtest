<?php


namespace CmdTest\Command;


abstract class CommandListManager implements CommandManager
{
    /** @var SingleCommand[] */
    private $commandList = array();
    /** @var CommandInvoker */
    private $commandInvoker;

    /**
     * @param CommandInvoker $commandInvoker
     */
    public function __construct(CommandInvoker $commandInvoker = null)
    {
        $this->commandInvoker = is_null($commandInvoker) ? new CommandInvoker() : $commandInvoker;
    }

    /**
     * @return CommandInvoker
     */
    protected function getCommandInvoker()
    {
        return $this->commandInvoker;
    }

    /**
     * @param SingleCommand $command
     * @return CommandListManager
     */
    public function addCommand(SingleCommand $command)
    {
        $this->commandList[] = $command;
        return $this;
    }

    /**
     * @return SingleCommand[]
     */
    public function getCommands()
    {
        return $this->commandList;
    }
}