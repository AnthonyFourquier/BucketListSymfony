<?php

namespace App\Controller;

use App\Service\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController {
    
    /**
    *@Route("/", name="home")
    */
    function home(Mailer $mailer):Response {
        $mailer->send("test@test.fr", "test1@test.fr", "test", "test");
        return $this->render("main/home.html.twig");
    }
    /**
    *@Route("/contact", name="contact")
    */
    function contact():Response {
        return $this->render("main/contact.html.twig");
    }
    /**
    *@Route("/apropos", name="apropos")
    */
    function apropos():Response {
        return $this->render("main/aPropos.html.twig");
    }
    /**
    *@Route("/mentions", name="mentions")
    */
    function mentions():Response {
        return $this->render("main/mentions.html.twig");
    }
}
