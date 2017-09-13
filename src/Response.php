<?php

namespace Josh\Terminal;

class Response
{
    /**
     * Current command instance
     *
     * @var Command
     */
    protected $command = null;

    /**
     * Response of command
     *
     * @var string
     */
    protected $output = null;

    /**
     * Set comamnd and response
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param Command $command
     * @param $content
     * @throws \Exception
     */
    public function __construct(Command $command, $content)
    {
        $this->command = $command;

        if(is_null($content)){
            throw new \Exception("There's no output for command: " . $command->getCommand());
        }

        $this->output = $this->clean($this->toArray($content));
    }

    /**
     * Convert response to an array
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $content
     * @return array
     */
    public function toArray($content)
    {
        return explode("\n",$content);
    }

    /**
     * Optimize and clean response content
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $input
     * @return array|mixed|string
     */
    public function clean($input)
    {
        $result = '';

        if(is_array($input)){
            $result = [];

            foreach ($input as $key => $value){
                if(! empty($value)){
                    $result[] = $value;
                }
            }
        }

        if(is_string($input)){
            $result = str_replace("\n",'',$input);
        }

        return $result;
    }

    /**
     * Get current command executed
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return string
     */
    public function getCommand()
    {
        return $this->command->getCommand();
    }

    /**
     * Get contents of command executed
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return array|mixed|null|string
     */
    public function getContents()
    {
        return $this->output;
    }
}