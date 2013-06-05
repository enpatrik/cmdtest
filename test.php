<?php

namespace CmdTest;

require_once 'SplClassLoader.php';
$splClassLoader = new \SplClassLoader('CmdTest', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'src');
$splClassLoader->register();

use CmdTest\Command\CommandChain;
use CmdTest\Command\CommandClient;
use CmdTest\Social\ByeCommand;
use CmdTest\Social\GreetingReceiver;
use CmdTest\Social\HelloCommand;

//***************************************************************************************************

echo "\n\n\n";


$greetingReceiver = new GreetingReceiver();
$helloCommand = new HelloCommand($greetingReceiver);
$helloCommand->setParamValues(array('to' => 'batler'));

$helloClient = new CommandClient($helloCommand);
$helloClient->execute();


echo "\n\n\n";


$byeCommand = new ByeCommand($greetingReceiver);
$byeCommand->setParamValues(array('to' => 'patlen'));
$byeClient = new CommandClient($byeCommand);

$commandChain = new CommandChain();
$commandChain->addCommandClient($helloClient);
$commandChain->addCommandClient($byeClient);
$commandChain->execute();


echo "\n\n\n";















