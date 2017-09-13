<?php

namespace Josh\Terminal;

use Illuminate\Support\Facades\Facade;

class TerminalFacade extends Facade
{
    /**
     * Set facade of terminal class
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'terminal';
    }
}