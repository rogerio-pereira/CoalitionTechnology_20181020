<?php

namespace Coalition;

class ConfigRepository
{
    /**
     * ConfigRepository Constructor
     */
    public function __construct()
    {
       
    }

    /**
     * Determine whether the config array contains the given key
     *
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        
    }

    /**
     * Set a value on the config array
     *
     * @param string $key
     * @param mixed  $value
     * @return \Coalition\ConfigRepository
     */
    public function set($key, $value)
    {
        
    }

    /**
     * Get an item from the config array
     *
     * If the key does not exist the default
     * value should be returned
     *
     * @param string     $key
     * @param null|mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {

    }

    /**
     * Remove an item from the config array
     *
     * @param string $key
     * @return \Coalition\ConfigRepository
     */
    public function remove($key)
    {

    }

    /**
     * Load config items from a file or an array of files
     *
     * The file name should be the config key and the value
     * should be the return value from the file
     * 
     * @param array|string The full path to the files $files
     * @return void
     */
    public function load($files)
    {

    }
}