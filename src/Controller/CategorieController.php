<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{   
    private $categoryRepository;
    public function __construct( CategorieRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

     /**
    *@Route("/addCategorie", name="addCategorie")
    */
    function addCategorie(Request $request): Response
    {   
        $categorie = new Categorie();
        $formCat = $this->createForm(CategorieType::class, $categorie);
        $formCat->handleRequest($request);
        if ($formCat->isSubmitted()) {
            $this->categoryRepository->add($categorie, true);
            $this->addFlash("sucess","L'article a bien été ajouté !");
            return $this->redirectToRoute("displayCategorie");
        }
        return $this->render("category/addCategorie.html.twig", ["categorieForm" => $formCat->createView()]);
    }

    /**
    *@Route("/displayCategorie", name="displayCategorie")
    */
    function displayCategorie(): Response
    {   
        return $this->render("category/displayCategorie.html.twig", ["categories"=> $this->categoryRepository->findAll()]);
    }

    /**
    *@Route("/displayCategorieDetail/{id}", name="displayCategorieDetail")
    */
    function displayCategorieDetail(Categorie $categorie): Response
    {   
        return $this->render("category/displayCategorieDetail.html.twig", ["categories"=> $this->categoryRepository->findAll(), 'categorie' => $categorie]);
    }
    
}
