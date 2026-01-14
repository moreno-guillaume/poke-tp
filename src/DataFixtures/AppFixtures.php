<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $pokemons = [
            'Bulbizarre',
            'Herbizarre',
            'Florizarre',
            'Salamèche',
            'Reptincel',
            'Dracaufeu',
            'Carapuce',
            'Carabaffe',
            'Tortank',
            'Pikachu',
            'Raichu',
            'Rondoudou',
            'Psykokwak',
            'Magicarpe',
            'Léviator',
            'Évoli',
            'Aquali',
            'Voltali',
            'Pyroli',
            'Mew'
        ];

        foreach ($pokemons as $name) {
            $pokemon = new Pokemon();
            $pokemon->setLabel($name);
            $manager->persist($pokemon);
        }

        $manager->flush();
    }
}