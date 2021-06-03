<?php

namespace App\Controller;

use App\Entity\Cheque;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChequeController extends AbstractController
{
    /**
     * @Route("/cheque", name="cheque")
     */
    public function index(): Response
    {
         $repo = $this->getDoctrine()->getRepository(Cheque::class);
         $cheques = $repo->findAll();
        return $this->render('cheque/index.html.twig', [
            'controller_name' => 'ChequeController',
             'cheques' => $cheques,
        ]);
    }
}
