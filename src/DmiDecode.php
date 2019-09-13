<?php


namespace app;


/**
 * Данные системы.
 */
class DmiDecode
{
    /**
     * @var string
     */
    private $command = 'dmidecode --type';

    /**
     * @var bool
     */
    private $useSudo;

    /**
     * DmiDecode constructor.
     * @param bool $useSudo
     */
    public function __construct(bool $useSudo = false)
    {
        $this->useSudo = $useSudo;
    }

    /**
     * Возвращает данные о BIOS.
     *
     * @return string
     */
    public function getBIOS()
    {
        return $this->run('BIOS');
    }

    /**
     * Возвращает данные материнской платы.
     *
     * @return string
     */
    public function getBaseboard()
    {
        return $this->run('baseboard');
    }

    /**
     * Возвращает данные о памяти.
     *
     * @return string
     */
    public function getMemory()
    {
        return $this->run('memory ');
    }

    /**
     * Вызов команды для получения данных.
     *
     * @param string $type тип данных
     * @return string
     */
    private function run($type): string
    {
        $command = '';

        if ($this->useSudo) {
            $command = 'sudo ';
        }

        $command .= $this->command . ' ' . $type;

        $results = null;
        exec($command, $results);

        return $results;
    }

}