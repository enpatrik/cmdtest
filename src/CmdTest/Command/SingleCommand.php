<?php

namespace CmdTest\Command;

use CmdTest\Command\Param\CommandParams;

abstract class SingleCommand implements Command
{
    /** @var CommandParams $params */
    private $params = null;

    /**
     * @param array $paramValues
     */
    public function setParamValues(array $paramValues)
    {
        if (is_null($this->params)) {
            $this->params = $this->initCommandParams();
        }
        $this->params->setValues($paramValues);
    }

    /**
     * @return CommandParams
     */
    public function getCommandParams()
    {
        if (is_null($this->params)) {
            $this->params = $this->initCommandParams();
        }
        return $this->params;
    }

    /**
     * @return CommandParams
     */
    protected abstract function initCommandParams();

    /**
     * @return mixed
     */
    public abstract function doExecute();

    /**
     * @return mixed
     */
    public abstract function getResult();

    public function execute()
    {
        if (is_null($this->params)) {
            $this->params = $this->initCommandParams();
        }
        return $this->doExecute();
    }
}