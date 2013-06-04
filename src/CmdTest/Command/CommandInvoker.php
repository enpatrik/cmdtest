<?php

namespace CmdTest\Command;

use CmdTest\Command\Param\CommandParams;

class CommandInvoker
{
    /**
     * @param SingleCommand $command
     * @return mixed
     */
    public function executeCommand(SingleCommand $command)
    {
        $this->logParams($command->getCommandParams());
        $returnValue = $command->execute();
        $this->logResult($command->getResult());
        $this->logReturnValue($returnValue);
        return $returnValue;
    }

    /**
     * @param CommandParams $params
     */
    public function logParams(CommandParams $params)
    {
        $paramArr = array();
        foreach ($params->getParams() as $param) {
            $paramArr[] = $param->getName() . ' = ' . $param->getValue();
        }
        echo 'Logged params: ' . implode(', ', $paramArr) . PHP_EOL;
    }

    /**
     * @param mixed $result
     */
    public function logResult($result)
    {
        echo 'Logged result: ' . $result . PHP_EOL;
    }

    /**
     * @param mixed $returnValue
     */
    public function logReturnValue($returnValue)
    {
        echo 'Logged return: ' . $returnValue . PHP_EOL;
    }
}
