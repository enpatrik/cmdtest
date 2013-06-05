<?php


namespace CmdTest\Command;


class CommandChain extends CommandManager
{
    /**
     * @return array
     */
    public function execute()
    {
        $result = array();
        foreach ($this->getCommands() as $command) {
            $result[] = $this->executeCommand($command);
        }
        return $result;
    }
}