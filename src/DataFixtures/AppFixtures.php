<?php

namespace App\DataFixtures;

use App\Entity\MicroPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $microPost = new MicroPost();
        $microPost->setTitle('Post 1');
        $microPost->setText('Post 1 Text');
        $microPost->setCreated(new \DateTime());
        $manager->persist($microPost);

        $microPost = new MicroPost();
        $microPost->setTitle('Post 2');
        $microPost->setText('Post 2 Text');
        $microPost->setCreated(new \DateTime());
        $manager->persist($microPost);

        $microPost = new MicroPost();
        $microPost->setTitle('Post 3');
        $microPost->setText('Post 3 Text');
        $microPost->setCreated(new \DateTime());
        $manager->persist($microPost);

        $manager->flush();
    }
}
