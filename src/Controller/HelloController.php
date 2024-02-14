<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        'Hello', 'Hi', 'Bye'
    ];

    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
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
