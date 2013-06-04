<?php

namespace CmdTest\Command\Param;

class CommandParams
{
    /** @var CommandParam[] */
    protected $params = array();

    /**
     * @param CommandParam $param
     * @return CommandParams
     */
    public function addParam(CommandParam $param)
    {
        $this->params[$param->getName()] = $param;
        return $this;
    }

    /**
     * @return CommandParam[]
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param string $name
     * @return CommandParam
     * @throws \Exception
     */
    public function getParam($name)
    {
        if (!isset($this->params[$name])) {
            throw new \Exception('Param does not exist: ' . $name);
        }
        return $this->params[$name];
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \Exception
     */
    public function getParamValue($name)
    {
        return $this->getParam($name)->getValue();
    }

    /**
     * @param array $params
     * @throws \Exception
     */
    public function setValues(array $params)
    {
        foreach ($params as $name => $value) {
            if (isset($this->params[$name])) {
                $param = $this->params[$name];
                $param->setValue($value);
            } else {
                throw new \Exception('Invalid param: ' . $name);
            }
        }
    }
}