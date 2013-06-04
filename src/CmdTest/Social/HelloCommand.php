<?php

namespace CmdTest\Social;

use CmdTest\Command\Param\CommandParam;
use CmdTest\Command\Param\CommandParams;
use CmdTest\Command\SingleCommand;

class HelloCommand extends SingleCommand
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
        return 'I said hello to ' . $this->getCommandParams()->getParamValue('to');
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return 'Hello ' . $this->getCommandParams()->getParamValue('to') . '!!!!';
    }
}