<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyaccountController extends AbstractController
{
    /**
     * @Route("/myaccount", name="app_myaccount")
     */
    public function index(): Response
    {
        return $this->render('myaccount/index.html.twig', [
            'controller_name' => 'MyaccountController',
        ]);
    }
}
