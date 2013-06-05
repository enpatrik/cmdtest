<?php


namespace CmdTest\Command;


use CmdTest\Command\Param\CommandParams;

abstract class CommandManager
{
    /** @var Command[] */
    private $commands = array();

    /**
     * @param Command $command
     * @return CommandManager
     */
    public function addCommand(Command $command)
    {
        $this->commands[] = $command;
        return $this;
    }

    /**
     * @return Command[]
     */
    public function getCommands()
    {
        return $this->commands;
    }

    public abstract function execute();

    /**
     * @param SingleCommand $command
     * @return mixed
     */
    protected function executeCommand(SingleCommand $command)
    {
        $this->logParams($command->getCommandParams());
        $returnValue = $command->execute();
        $this->logReturnValue($returnValue);
        $this->logResult($command->getResult());
        return $returnValue;
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

    /**
     * @param mixed $result
     */
    private function logResult($result)
    {
        echo '*** Logged result: ' . $result . PHP_EOL;
    }

    /**
     * @param $returnValue
     */
    private function logReturnValue($returnValue)
    {
        echo '*** Logged return: ' . $returnValue . PHP_EOL;
    }

}