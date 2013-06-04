<?php


namespace CmdTest\Social;


use CmdTest\Command\CommandReceiver;

class GreetingReceiver extends CommandReceiver
{
    /** @var string */
    protected $greeting;

    /**
     * @param string $greeting
     */
    public function setGreetingPhrase($greeting)
    {
        $this->greeting = $greeting;
    }

    /**
     * @return string
     */
    public function doAction()
    {
        echo $this->greeting . PHP_EOL;
        return $this->greeting;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return 'I said this greeting: ' . $this->greeting;
    }
}