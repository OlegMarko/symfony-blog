<?php

namespace App\DataFixtures;

use App\Entity\MicroPost;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $userPasswordHasher) {}

    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setEmail('test1@mail.com');
        $user1->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user1,
                'password'
            )
        );
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('test2@mail.com');
        $user2->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user2,
                'password'
            )
        );
        $manager->persist($user2);

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
