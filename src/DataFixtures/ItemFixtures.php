<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Item;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ItemFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $item = new Item();
            $item->setTitle('test-item-'.$i);
            $item->setMenu($this->getReference(MenuFixtures::MENU_REFERENCE .'-'. rand(0, 5)));
            $manager->persist($item);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            MenuFixtures::class
        ];
    }
}