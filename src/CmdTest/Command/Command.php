<?php

namespace CmdTest\Command;

interface Command
{
    /**
     * @return mixed
     */
    public function execute();
}