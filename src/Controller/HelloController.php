<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\MicroPost;
use App\Entity\User;
use App\Entity\UserProfile;
use App\Repository\CommentRepository;
use App\Repository\MicroPostRepository;
use App\Repository\UserProfileRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        'Hello', 'Hi', 'Bye'
    ];

    #[Route('/', name: 'app_index')]
    public function index(
        UserProfileRepository $profileRepository,
        MicroPostRepository $postRepository,
        CommentRepository $commentRepository
    ): Response
    {
//        $user = new User();
//        $user->setEmail('email@testmail.com');
//        $user->setPassword('123123');
//
//        $profile = new UserProfile();
//        $profile->setUser($user);
//
//        $profileRepository->add($profile, true);

        $post = new MicroPost();
        $post->setTitle('MicroPost Title');
        $post->setText('MicroPost Text');
        $post->setCreated(new \DateTime());

        $comment = new Comment();
        $comment->setText('Comment Text');

        $post->addComment($comment);

        $postRepository->add($post, true);

        return $this->render(
            'hello/index.html.twig',
            [
                'messages' => $this->messages
            ]
        );
    }

    #[Route('/messages/{id<\d+>}', name: 'app_show_one')]
    public function showOne(int $id): Response
    {
        return $this->render(
            'hello/show_one.html.twig',
            [
                'message' => $this->messages[$id] ?? "Hi"
            ]
        );
    }
}
