<?php

namespace CmdTest\Command;

use CmdTest\Command\Param\CommandParams;

class CommandInvoker
{
    /** @var SingleCommand */
    private $command;

    /**
     * @param SingleCommand $command
     */
    public function setCommand(SingleCommand $command)
    {
        $this->command = $command;
    }

    /**
     * @return SingleCommand
     */
    public function getCommand()
    {
        return $this->command;
    }

    public function execute()
    {
        $this->logParams($this->getCommand()->getCommandParams());
        $this->getCommand()->execute();
    }

    /**
     * @param CommandParams $params
     */
    protected function logParams(CommandParams $params)
    {
        $paramArr = array();
        foreach ($params->getParams() as $param) {
            $paramArr[] = $param->getName() . ' = ' . $param->getValue();
        }
        echo '*** Logged params: ' . implode(', ', $paramArr) . PHP_EOL;
    }
}
