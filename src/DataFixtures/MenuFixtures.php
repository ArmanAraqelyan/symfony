<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Menu;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MenuFixtures extends Fixture
{
    public const MENU_REFERENCE = 'menu';

    public function load(ObjectManager $manager)
    {
        $menuList = [];
        for ($i = 0; $i < 5; $i++) {
            $menuList[$i] = new Menu();
            $menuList[$i]->setTitle('menu-'.$i);
            $manager->persist($menuList[$i]);
            $this->addReference(self::MENU_REFERENCE .'-'. $i, $menuList[$i]);
        }
        $manager->flush();
    }
}