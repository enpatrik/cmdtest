<?php


namespace CmdTest\Social;


use CmdTest\Command\Param\CommandParam;
use CmdTest\Command\Param\CommandParams;
use CmdTest\Command\SingleCommand;

class ByeCommand extends SingleCommand
{
    /**
     * @return CommandParams
     */
    protected function initCommandParams()
    {
        $params = new CommandParams();
        $params->addParam(new CommandParam('to'));
        return $params;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return 'I said bye to ' . $this->getCommandParams()->getParamValue('to');
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return 'Goodbye ' . $this->getCommandParams()->getParamValue('to') . ' you fool!';
    }
}