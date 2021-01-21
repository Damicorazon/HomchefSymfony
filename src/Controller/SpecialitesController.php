<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpecialitesController extends AbstractController
{
    /**
     * @Route("/specialites", name="specialites")
     */
    public function index(): Response
    {
        return $this->render('specialites/index.html.twig', [
            'controller_name' => 'SpecialitesController',
        ]);
    }
}
