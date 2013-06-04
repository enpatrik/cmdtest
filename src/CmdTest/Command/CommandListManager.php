<?php


namespace CmdTest\Command;


abstract class CommandListManager
{
    /** @var CommandClient[] */
    private $commandClients = array();

    /**
     * @param CommandClient $commandClient
     * @return CommandListManager
     */
    public function addCommandClient(CommandClient $commandClient)
    {
        $this->commandClients[] = $commandClient;
        return $this;
    }

    /**
     * @return CommandClient[]
     */
    public function getCommandClients()
    {
        return $this->commandClients;
    }

    public abstract function execute();
}