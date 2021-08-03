<?php

namespace ash\DamageIndicator\Events;

use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;

use pocketmine\Player;

class DamageEvents implements Listener{

    public function onDamage(EntityDamageEvent $event){

        $entity = $event->getEntity();
        if($entity instanceof EntityDamageByEntityEvent){
            $damager = $event->getDamager();
            $damaged = $event->getEntity();
            if($damager instanceof Player and $damaged instanceof Player){

                $damager->sendMessage("§d".$damaged->getName()."§f has §d".$damaged->getHealth()." hp");
            }
        }
    }
}