<?php

namespace CmdTest;

require_once 'SplClassLoader.php';
$splClassLoader = new \SplClassLoader('CmdTest', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'src');
$splClassLoader->register();

use CmdTest\Command\CommandChain;
use CmdTest\Command\CommandClient;
use CmdTest\Social\ByeCommand;
use CmdTest\Social\GreetingService;
use CmdTest\Social\HelloCommand;

//***************************************************************************************************

echo "\n\n\n";


$greetingService = new GreetingService();
$helloCommand = new HelloCommand($greetingService);
$helloCommand->setParamValues(array('to' => 'batler'));

$commandChain = new CommandChain();
$commandChain->addCommand($helloCommand);
$result = $commandChain->execute();
echo reset($result) . PHP_EOL;


echo "\n\n\n";


$byeCommand = new ByeCommand($greetingService);
$byeCommand->setParamValues(array('to' => 'patlen'));

$commandChain = new CommandChain();
$commandChain->addCommand($helloCommand);
$commandChain->addCommand($byeCommand);
$results = $commandChain->execute();
foreach ($results as $result) {
    echo $result . PHP_EOL;
}


echo "\n\n\n";















