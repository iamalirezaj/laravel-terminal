<?php

namespace Josh\Terminal\Tests;

use Josh\Terminal\Command;
use PHPUnit\Framework\TestCase as TestCase;

class CommandTest extends TestCase
{
    public function testCommand()
    {
        $command = new Command();

        $command = $command->cdBack()->ls()->execute();

        $this->assertTrue(is_array($command->getBody()->getContents()));
    }

    public function testCommandWithAlias()
    {
        $command = new Command();

        $command->alias('list','ls');

        $command = $command->cdBack()->command('list')->execute();

        $this->assertTrue(is_array($command->getBody()->getContents()));
    }
}