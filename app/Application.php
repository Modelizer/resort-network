<?php

namespace App;

class Application extends \Illuminate\Foundation\Application
{
    /**
     * @param string $path
     * @return string
     */
    public function bootstrapPath($path = '')
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'kernel/bootstrap'.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * @param string $path
     * @return false|string
     */
    public function configPath($path = '')
    {
        return realpath($this->basePath .'/kernel/config'. ($path ? DIRECTORY_SEPARATOR.$path : $path));
    }

    public function databasePath($path = '')
    {
        return ($this->databasePath ?: $this->basePath.DIRECTORY_SEPARATOR.'kernel/database').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }

    /**
     * Get the path to the storage directory.
     *
     * @return string
     */
    public function storagePath()
    {
        return $this->storagePath ?: $this->basePath.'/kernel/storage';
    }
}

