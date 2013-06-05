<?php


namespace CmdTest\Social;


use CmdTest\Command\Param\CommandParam;
use CmdTest\Command\Param\CommandParams;
use CmdTest\Command\SingleCommand;

class ByeCommand extends SingleCommand
{
    /** @var GreetingReceiver */
    protected $greetingReceiver;

    public function __construct(GreetingReceiver $greetingReceiver)
    {
        $this->greetingReceiver = $greetingReceiver;
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
        $this->greetingReceiver->setGreetingPhrase(
            'Goodbye ' . $this->getCommandParams()->getParamValue('to') . ', you fool!'
        );
        $this->greetingReceiver->sayGreeting();
        return $this->greetingReceiver->getGreeting();
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return 'I said this greeting: ' . $this->greetingReceiver->getGreeting();
    }
}