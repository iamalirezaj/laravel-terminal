<?php

namespace Josh\Terminal;

trait SomeCommands
{
    /**
     * Pwd helper command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return $this
     */
    public function pwd()
    {
        $this->command('pwd;');

        return $this;
    }

    /**
     * change directory to home directory helper command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return $this
     */
    public function cdHome()
    {
        $home = $this->getHomePath();

        $this->cd($home);

        return $this;
    }

    /**
     * change directory to back from current
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return $this
     */
    public function cdBack()
    {
        $this->cd('../');

        return $this;
    }

    /**
     * Get home path directory
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return string
     */
    public function getHomePath()
    {
        return rtrim(shell_exec('echo $HOME'), "\n");
    }

    /**
     * change directory from current
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @param $directory
     * @return $this
     */
    public function cd($directory)
    {
        $this->command('cd ' . $directory . ';');

        return $this;
    }

    /**
     * list of files and directory helper command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return $this
     */
    public function ls()
    {
        $this->command('ls;');

        return $this;
    }

    /**
     * Git helper command
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     * @return $this
     */
    public function git()
    {
        $this->command('git');

        return $this;
    }
}