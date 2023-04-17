<?php

namespace App\Controller;

use App\Entity\BucketList;
use App\Entity\Categorie;
use App\Entity\User;
use App\Form\BucketListType;
use App\Repository\BucketListRepository;
use App\Repository\CategorieRepository;
use App\Service\Operation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Csrf\CsrfToken;

class WishController extends AbstractController
{   

    private $bucketListRepository;
    public function __construct( BucketListRepository $bucketListRepository)
    {
        $this->bucketListRepository = $bucketListRepository;
    }

    /**
    * @isGranted("ROLE_USER")
    * @Route("/add", name="add")
    */
    function add(Request $request, Operation $operation): Response
    {  
        $user = $this->getUser();
        $bucket = new BucketList();
        $formBucket = $this->createForm(BucketListType::class, $bucket);
        $formBucket->handleRequest($request);
        if ($formBucket->isSubmitted()) {
            $bucket->setAuthor($user->getUsername());
            $bucket->setUser($user);
            $this->bucketListRepository->add($bucket, true);
            $this->addFlash("sucess","L'article a bien été ajouté !");
            return $this->redirectToRoute("detail",["id"=>$bucket->getId()]);
        }
        return $this->render("wish/addBucket.html.twig", ["bucketListForm" => $formBucket->createView()]);
    }

    /**
     * @isGranted("ROLE_USER")
     * @Route("/displayList", name="displayList")
     */
    function displayList():Response {
        return $this->render("wish/displayList.html.twig", ["listBucketlist"=> $this->bucketListRepository->findAll()]);
    }

    /**
    * @isGranted("ROLE_USER") 
    * @Route("/detail/{id}", name="detail", requirements={"id":"\d+"})
    */
    function detail($id):Response {
        return $this->render("wish/displayDetails.html.twig",["bucketList"=> $this->bucketListRepository->find($id)]);
    }
    
    /**
     * @Route("/displayListIsTodo", name="displayListIsTodo")
     */
    function displayListIsTodo():Response {
        return $this->render("wish/displayList.html.twig", ["listBucketlist"=> $this->bucketListRepository->findBy(["isTodo"=>true])]);
    }

    /**
    * @Route("/title/{name}", name="findTitle")
    */
    public function findTitle($name) {
        dd($this->bucketListRepository->findName($name));
    }

    /**
    * @Route("/date/{startDate}/{endDate}", name="findDate")
    */
    public function findDate($startDate, $endDate) {
        dd($this->bucketListRepository->findDate($startDate, $endDate));

    }

    /**
    * @isGranted("ROLE_USER") 
    * @Route("/detail/edit/{id}", name="edit", requirements={"id":"\d+"})
    */
    public function edit(Request $request, BucketList $bucket) {
        $bucketForm = $this->createForm(BucketListType::class, $bucket);
        $bucketForm->handleRequest($request);

        if ($bucketForm->isSubmitted()) {
            $this->bucketListRepository->update();
            $this->addFlash("sucess","L'article a bien été modifié !");
            return $this->redirectToRoute("detail",["id"=>$bucket->getId()]);
        }
        return $this->render("wish/editBucket.html.twig", ["bucketListForm" => $bucketForm->createView()]);
    }

    /**
    *@isGranted("ROLE_USER") 
    *@Route("/delete", name="delete")
    */
    public function delete(Request $request) {

        if ($this->isCsrfTokenValid("anthony", $request->get("token"))) {
            $id = $request->get("id");
            $this->bucketListRepository->remove($this->bucketListRepository->find($id), true);
            $this->addFlash("sucess", "L'article a bien été suprimé");
            return $this->redirectToRoute("displayList");
        } else {
            $this->addFlash("danger", "erreur dans CSRF TOKEN");
            return $this->redirectToRoute("displayList");
        }  
    }

}
