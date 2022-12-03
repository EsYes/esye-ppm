<?php

/**
 * ESYE-PPM.
 * Alexander S. Lysyakov.
 */

class ConfigParser
{
    const ROOT_DIR         = __DIR__ . '/../../';
    const CONFIG_FILE_PATH = self::ROOT_DIR . 'ppm-config.json';

    public array $config;

    /**
     * ConfigParser constructor.
     */
    public function __construct()
    {
        $this->config = [];
        $this->cloneConfig();
    }

    /**
     * Get config.
     *
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * Clone config.
     *
     * @return void
     */
    public function cloneConfig(): void
    {
        if ($this->isFileExists()) {
            $config = $this->getConfigFileContent();
            $config = json_decode($config, true);

            $this->config = $config;
        }
    }

    /**
     * Check config file exists.
     *
     * @return boolean
     */
    private function isFileExists(): bool
    {
        if (file_exists(self::CONFIG_FILE_PATH) && is_readable(self::CONFIG_FILE_PATH)) {
            return true;
        }

        return false;
    }

    /**
     * Get config file content.
     *
     * @return string
     */
    private function getConfigFileContent(): string
    {
        $configFile = file_get_contents(self::CONFIG_FILE_PATH);

        return $configFile;
    }
}
