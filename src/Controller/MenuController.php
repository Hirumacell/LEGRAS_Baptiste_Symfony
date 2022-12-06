<?php

namespace App\Controller;

use App\Entity\Cateforie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    public function _menu(ManagerRegistry $doctrine): Response
    {
        return $this->render('menu/index.html.twig', [
            'categories'=>$doctrine->getRepository(Cateforie::class)->findAll()
        ]);
    }
}
