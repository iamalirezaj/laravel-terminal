<?php

namespace Josh\Terminal;

class Console
{
    /**
     * Command instance
     *
     * @var Command
     */
    public $command;

    /**
     * Terminal command aliases
     *
     * @var array
     */
    protected $aliases = [];

    /**
     * Set terminal command aliases
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param array $aliases
     * @return $this
     */
    public function aliases($aliases = [])
    {
        if(! empty($aliases)){
            foreach ($aliases as $alias => $orginal){
                $this->alias($alias,$orginal);
            }
        }

        return $this;
    }

    /**
     * Set terminal command alias
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $alias
     * @param $orginal
     * @return $this
     */
    public function alias($alias, $orginal)
    {
        $this->aliases[$alias] = $orginal;

        return $this;
    }
}