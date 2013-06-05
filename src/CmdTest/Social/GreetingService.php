<?php


namespace CmdTest\Social;


class GreetingService
{
    public function createHelloPhrase($to)
    {
        return 'Hello ' . $to . '!';
    }

    public function createGoodbyePhrase($to)
    {
        return 'Bye ' . $to . '!';
    }
}