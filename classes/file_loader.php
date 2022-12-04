<?php

/**
 * ESYE-PPM.
 * Alexander S. Lysyakov.
 */

class FileLoader
{
    public const ROOT_DIR = __DIR__ . '../../../../';

    public static array $config;

    /**
     * FileLoader constructor.
     */
    public function __construct()
    {
        $config = new ConfigParser();
        $config = $config->getConfig();
        self::$config = $config;
    }

    /**
     * Load files.
     *
     * @return void
     */
    public function loadFiles(): void
    {
        /**
         * Get config.json.
         */
        $files = (isset(self::$config['autoload']['files'])) ? self::$config['autoload']['files'] : [];

        /**
         * Require files.
         */
        foreach ($files as $file) {
            $path = self::ROOT_DIR . $file;

            if (file_exists($path)) {
                require_once $path;
            }
        }
    }
}
