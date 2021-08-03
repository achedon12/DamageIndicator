<?php

namespace ashDamageIndicator;


use ash\DamageIndicator\Events\DamageEvents;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;

class Main extends PluginBase implements Listener
{

    /**@var $db Config */
    public $db;
    /** @vr main $instance*/
    private static $instance;

    public function onEnable()
    {
        self::$instance = $this;
        @mkdir($this->getDataFolder());

        $this->saveResource("config.yml");

        $this->db = new Config($this->getDataFolder() . "config.yml" . Config::YAML);

        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->getServer()->getPluginManager()->registerEvents(new DamageEvents(), $this);

    }

    public static function config()
    {
        return new Config(self::$instance->getDataFolder() . "config.yml", Config::YAML);
    }

    public static function getInstance()
    {
        return self::$instance;
    }
}