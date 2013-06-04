<?php


namespace CmdTest\Command;


abstract class CommandReceiver
{
    /** @var mixed */
    protected $returnValue;

    public function action()
    {
        $this->setReturnValue($this->doAction());
        $this->logResult($this->getResult());
    }

    /**
     * @param mixed $returnValue
     */
    public function setReturnValue($returnValue)
    {
        $this->returnValue = $returnValue;
        $this->logReturnValue();
    }

    /**
     * @return mixed
     */
    public abstract function doAction();

    /**
     * @return mixed
     */
    public abstract function getResult();


    /**
     * @param mixed $result
     */
    protected function logResult($result)
    {
        echo '*** Logged result: ' . $result . PHP_EOL;
    }

    protected function logReturnValue()
    {
        echo '*** Logged return: ' . $this->returnValue . PHP_EOL;
    }
}