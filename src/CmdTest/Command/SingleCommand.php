<?php

namespace CmdTest\Command;

use CmdTest\Command\Param\CommandParams;

abstract class SingleCommand implements Command
{
    /** @var CommandParams $params */
    private $params;

    /**
     * @param mixed|array $params
     */
    public function __construct($params = null)
    {
        $this->params = $this->initCommandParams();

        if (is_null($params)) {
            $params = array();
        } else if (!is_null($params) && !is_array($params)) {
            $params = array($params);
        }

        $this->params->setValues($params);
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

    /**
     * @return mixed
     */
    public abstract function getResult();

    /**
     * @return mixed
     */
    public abstract function execute();
}