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

        $microPost1 = new MicroPost();
        $microPost1->setTitle('Post 1');
        $microPost1->setText('Post 1 Text');
        $microPost1->setAuthor($user1);
        $manager->persist($microPost1);

        $microPost2 = new MicroPost();
        $microPost2->setTitle('Post 2');
        $microPost2->setText('Post 2 Text');
        $microPost2->setAuthor($user2);
        $manager->persist($microPost2);

        $microPost3 = new MicroPost();
        $microPost3->setTitle('Post 3');
        $microPost3->setText('Post 3 Text');
        $microPost3->setAuthor($user1);
        $manager->persist($microPost3);

        $manager->flush();
    }
}
