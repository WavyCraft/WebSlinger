<?php

declare(strict_types=1);

namespace wavycraft\webslinger;

use pocketmine\event\Listener;
use pocketmine\event\entity\ProjectileHitBlockEvent;

use pocketmine\entity\projectile\Snowball;

use pocketmine\world\Position;

use pocketmine\block\VanillaBlocks;

class EventListener implements Listener {

    public function onProjectileHit(ProjectileHitBlockEvent $event) : void{
        $projectile = $event->getEntity();

        if ($projectile instanceof Snowball) {
            $blockHit = $event->getBlockHit();
            if ($blockHit !== null) {
                $position = $blockHit->getPosition();
                $world = $position->getWorld();
                $world->setBlock($position, VanillaBlocks::COBWEB());
            }
        }
    }
}