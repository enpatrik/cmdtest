<?php

namespace CmdTest\Social;

use CmdTest\Command\Param\CommandParam;
use CmdTest\Command\Param\CommandParams;
use CmdTest\Command\SingleCommand;

class HelloCommand extends SingleCommand
{
    /** @var GreetingService */
    protected $greetingService;

    public function __construct(GreetingService $greetingService)
    {
        $this->greetingService = $greetingService;
    }

    /**
     * @return CommandParams
     */
    protected function initCommandParams()
    {
        $params = new CommandParams();
        $params->addParam(new CommandParam('to'));
        return $params;
    }

    public function doExecute()
    {
        return $this->greetingService->createHelloPhrase($this->getCommandParams()->getParamValue('to'));
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return 'I said this greeting: Hello!';
    }
}