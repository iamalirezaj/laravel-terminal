<?php

namespace Josh\Terminal;

class Command extends Console
{
    /**
     * Import some helper command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     */
    use SomeCommands;

    /**
     * Response of command
     *
     * @var Response
     */
    private $body;

    /**
     * Command arguments
     *
     * @var array
     */
    protected $arguments = [];

    /**
     * Command options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Set a command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $command
     * @return $this
     */
    public function command($command)
    {
        if(! is_null($command)){
            $this->command .= $this->checkForAlias($command) . ' ';
        }

        return $this;
    }

    /**
     * Check command for aliases
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $command
     * @return mixed
     */
    public function checkForAlias($command)
    {
        if(array_key_exists($command,$this->aliases)){
            return $this->aliases[$command];
        }

        return $command;
    }

    /**
     * Add an option for command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $option
     * @return $this
     */
    public function addOption($option)
    {
        $this->options[] = $option;

        $this->command .= ( ! is_null($option) ? $option : '' );

        return $this;
    }

    /**
     * Set an argument for command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $key
     * @param null $value
     * @return $this
     */
    public function addArg($key, $value = null)
    {
        $this->arguments[$key] = $value;

        $this->command .= $key . ( is_null($value) ? '' : '=' . $value );

        return $this;
    }

    public function orOption($option)
    {
        return $this->addOption(" | " . $option);
    }

    /**
     * Set array arguments for command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $args
     * @return $this
     */
    public function addArgs($args)
    {
        foreach ($args as $arg => $value){
            $this->addArg($arg,$value);
        }

        return $this;
    }

    /**
     * Set array options for command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $options
     * @return $this
     */
    public function addOptions($options)
    {
        foreach ($options as $option){
            $this->addOption($option);
        }

        return $this;
    }

    /**
     * Get current command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return string
     * @throws \Exception
     */
    public function getCommand()
    {
        $command = $this->command;

        if(empty($command)){
            throw new \Exception('Command notfound!');
        }

        $this->clearCommand();

        return $command;
    }

    /**
     * Clear the generated command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 2 Oct, 2017
     * @return $this
     */
    public function clearCommand()
    {
        $this->command = '';

        return $this;
    }

    /**
     * Execute current command created
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return $this
     */
    public function execute()
    {
        $this->body = new Response($this,shell_exec($this->getCommand()));

        return $this;
    }

    /**
     * Get arguments generated
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return string
     */
    public function getArgs()
    {
        $args = '';

        if(! empty($this->arguments)){
            foreach ($this->arguments as $key => $arg){

                $args .= $key . '=' . $arg . ' ';
            }
        }

        return rtrim($args, ' ');
    }

    /**
     * get option generated for command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return string
     */
    public function getOptions()
    {
        $options = '';

        if(! empty($this->options)){
            foreach ($this->options as $option){

                $options .= $option . ' ';
            }
        }

        return rtrim($options, ' ');
    }

    /**
     * Get body of executed command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return Response
     */
    public function getBody()
    {
        return $this->body;
    }
}