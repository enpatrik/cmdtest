<?php


namespace CmdTest\Social;


class GreetingReceiver
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
    public function sayGreeting()
    {
        echo $this->greeting . PHP_EOL;
    }

    /**
     * @return mixed
     */
    public function getGreeting()
    {
        return $this->greeting;
    }
}