<?php


namespace CmdTest\Command;


class CommandChain extends CommandListManager
{
    /**
     * @return array
     */
    public function execute()
    {
        $return = array();
        foreach ($this->getCommands() as $command) {
            $return[] = $this->getCommandInvoker()->executeCommand($command);
        }
        return $return;
    }
}