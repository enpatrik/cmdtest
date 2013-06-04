<?php

namespace CmdTest\Command;

use CmdTest\Command\Param\CommandParams;

abstract class SingleCommand implements Command
{
    /** @var \CmdTest\Command\CommandReceiver */
    private $commandReceiver;
    /** @var CommandParams $params */
    private $params;

    /**
     * @param CommandReceiver $commandReceiver
     * @param mixed|array $params
     */
    public function __construct(CommandReceiver $commandReceiver, $params = null)
    {
        $this->commandReceiver = $commandReceiver;
        $this->params = $this->initCommandParams();

        if (is_null($params)) {
            $params = array();
        } else if (!is_null($params) && !is_array($params)) {
            $params = array($params);
        }

        $this->params->setValues($params);
    }

    /**
     * @return CommandReceiver
     */
    public function getReceiver()
    {
        return $this->commandReceiver;
    }

    /**
     * @return CommandParams
     */
    public function getCommandParams()
    {
        return $this->params;
    }

    /**
     * @return CommandParams
     */
    protected abstract function initCommandParams();

    protected abstract function prepareReceiver();

    /**
     * @return mixed
     */
    public function execute()
    {
        $this->prepareReceiver();
        $this->commandReceiver->action();
    }
}