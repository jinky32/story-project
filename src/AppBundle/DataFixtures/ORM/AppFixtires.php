<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Doctrine\DataFixtures\AbstractLoader;

class AppFixtures extends AbstractLoader
{
    /**
     * {@inheritdoc}
     */
    public function getFixtures()
    {
        return [
            __DIR__.'/users.yml',
//            '@DummyBundle/DataFixtures/ORM/product.yml',
        ];
    }

    public function parentName()
    {
        $names = array(
            'John',
            'Jane',
            'Sarah',
            'Stuart',
            'Catherine',
            'Kate',
            'Chris,'
        );

        return $names[array_rand($names)];
    }
}