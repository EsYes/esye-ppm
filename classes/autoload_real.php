<?php

/**
 * ESYE-PPM.
 * Alexander S. Lysyakov.
 */

class Autoloader
{
    public const ROOT_DIR = __DIR__ . '../../../../';
    public const DEFAULT_NAMESPACE = 'App';
    public const DEFAULT_DIR = 'src';

    public static array $config;

    /**
     * Register autoloader.
     *
     * @return void
     */
    public static function getLoader(): void
    {
        $config = new ConfigParser();
        $config = $config->getConfig();
        self::$config = $config;

        spl_autoload_register([
            'Autoloader',
            'loadClass'
        ], true, true);
    }

    /**
     * Load class file.
     *
     * @param string $class
     * @return void
     */
    public static function loadClass(string $class): void
    {
        $path = self::ROOT_DIR . self::buildPath($class);

        if (file_exists($path)) {
            require_once $path;
        }
    }

    /**
     * Build path to class by config.json.
     *
     * @param string $class
     * @return string
     */
    public static function buildPath(string $class): string
    {
        $pathParts = explode('\\', $class);

        if (count($pathParts) < 2) {
            return false;
        }

        /**
         * By default, the `App` references the `src` folder.
         */
        $pathParts[0] = ($pathParts[0] == self::DEFAULT_NAMESPACE)
        ? self::DEFAULT_DIR
        : $pathParts[0];

        $path = implode(DIRECTORY_SEPARATOR, $pathParts);

        /**
         * Get config.json.
         */
        $psr4 = (isset(self::$config['autoload']['psr-4'])) ? self::$config['autoload']['psr-4'] : [];

        /**
         * Replace path to class by config.json.
         */
        foreach ($psr4 as $mainClass => $mainClassPath) {
            $path = str_replace($mainClass, $mainClassPath, $path);
        }

        return sprintf(
            '%s.php',
            $path
        );
    }
}
