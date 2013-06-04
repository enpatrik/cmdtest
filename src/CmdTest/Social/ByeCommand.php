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
     * @return GreetingReceiver
     */
    public function getReceiver()
    {
        return parent::getReceiver();
    }

    public function prepareReceiver()
    {
        $this->getReceiver()->setGreetingPhrase(
            'Goodbye ' . $this->getCommandParams()->getParamValue('to') . ', you fool!'
        );
    }
}