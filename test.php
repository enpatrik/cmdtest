<?php

namespace CmdTest;

require_once 'SplClassLoader.php';
$splClassLoader = new \SplClassLoader('CmdTest', dirname(__FILE__) . DIRECTORY_SEPARATOR . 'src');
$splClassLoader->register();

use CmdTest\Command\CommandChain;
use CmdTest\Command\CommandDispatcher;
use CmdTest\Social\ByeCommand;
use CmdTest\Social\HelloCommand;

//***************************************************************************************************

echo "\n\n\n";

$helloCommand = new HelloCommand(array('to' => 'batler'));
$commandDispatcher = new CommandDispatcher($helloCommand);
$greeting = $commandDispatcher->execute();
echo $greeting . PHP_EOL;

echo "\n\n\n";

$byeCommand = new ByeCommand(array('to' => 'patlen'));
$commandChain = new CommandChain();
$commandChain->addCommand($helloCommand);
$commandChain->addCommand($byeCommand);
$phrases = $commandChain->execute();
echo implode(PHP_EOL, $phrases);

echo "\n\n\n";















