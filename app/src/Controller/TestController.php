<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class TestController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function __invoke(): Response
    {
        return $this->render('base.html.twig');
    }
}
