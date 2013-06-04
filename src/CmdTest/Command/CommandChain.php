<?php


namespace CmdTest\Command;


class CommandChain extends CommandListManager
{
    public function execute()
    {
        foreach ($this->getCommandClients() as $commandClient) {
            $commandClient->execute();
        }
    }
}