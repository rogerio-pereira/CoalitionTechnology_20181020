<?php

namespace Coalition;

class ConfigRepository implements \ArrayAccess
{
    protected $config;

    /**
     * ConfigRepository Constructor
     */
    public function __construct(array $config = null)
    {
        if(!isset($config) && !is_array($config))
            $this->config = array();
        else
            $this->config = $config;

        return $this;
    }

    /*
     * ARRAY ACCESS METHODS
     */
        /**
         * Get offset config value
         */
        public function offsetGet($key)
        {
            if(isset($this->config[$key]))
                return $this->config[$key];

            return null;
        }

        /**
         * Check if offset config isset
         */
        public function offsetExists($key)
        {
            return isset($this->config[$key]);
        }


        /**
         * Set offset config value
         */
        public function offsetSet($key, $value)
        {
            $this->config[$key] = $value;
        }

        /**
         * Unset offset config value
         */
        public function offsetUnset($key)
        {
            unset($this->config[$key]);
        }
    /*
     * END OF ARRAY ACCESS METHODS
     */

    /**
     * Determine whether the config array contains the given key
     *
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        if(array_key_exists($key, $this->config))
            return true;
        
        return false;
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
        $this->config[$key] = $value;
        return $this;
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
        if(isset($this->config[$key]))
            return $this->config[$key];
        
        return $default;
    }

    /**
     * Remove an item from the config array
     *
     * @param string $key
     * @return \Coalition\ConfigRepository
     */
    public function remove($key)
    {
        unset($this->config[$key]);
        return $this;
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
        //files is array
        if(is_array($files)) {
            foreach ($files as $file) {
                $info = pathinfo($file);
                $fileName = $info['filename'];

                $this->config[$fileName] = include $file;
            }
        }
        //file is not array
        else {
            $info = pathinfo($files);
            $fileName = $info['filename'];

            $this->config[$fileName] = include $files;
        }

        return $this;
    }
}