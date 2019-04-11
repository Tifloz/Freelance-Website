<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render(
            'home/index.html.twig',
            [
                'controller_name' => 'HomeController',
            ]
        );
    }

    /**
     * @Route("/about-me", name="about-me")
     */
    public function about()
    {
        return $this->render(
            'about-me/about-me.html.twig',
            [
                'controller_name' => 'About me',
            ]
        );
    }
}
