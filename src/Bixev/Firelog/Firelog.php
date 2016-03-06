<?php
namespace Bixev\Firelog;

class Firelog
{

    static private $timer = 0.0;

    static protected $_enabled = true;

    /**
     * @param null $obj
     * @param null $label
     * @param string $type
     */
    static public function log($obj = null, $label = null, $type = LoggerLevel::LEVEL_LOG)
    {

        if (!static::$_enabled) {
            return;
        }

        if ($type == LoggerLevel::LEVEL_TRACE) {
            $e = new \Exception();
            $obj = explode("\n", $e->getTraceAsString());
            $label = empty($label) ? 'TRACE' : $label . ' | TRACE';
            $type = null;
        }

        $type = strtoupper($type);

        $delay = static::getTimer();
        $label = $delay . ' :: ' . $label;

        \ChromePhp::log($type, $label);
        \ChromePhp::log($type, $obj);
        $instance = \FirePHP::getInstance(true);
        $instance->fb($obj, $label, $type);
    }

    /**
     * log memory usage
     *
     * @param string $info
     */
    static public function mem($info = '')
    {

        if (!static::$_enabled) {
            return;
        }

        $txt = round(memory_get_usage() / 1024 / 1024, 2) . ' Mo / ' . round(memory_get_usage(true) / 1024 / 1024, 2) . ' Mo';
        $txt .= $info != '' ? ' (' . $info . ')' : '';
        firelog($txt, 'MemoryUsage', 'info');
    }

    static protected function getTimer()
    {
        $delay = self::$timer == 0.0 ? "0.000" : round(microtime(true) - self::$timer, 3);
        self::$timer = microtime(true);

        return $delay;
    }

    static public function enable()
    {
        static::$_enabled = true;
    }

    static public function disable()
    {
        static::$_enabled = false;
    }
}
