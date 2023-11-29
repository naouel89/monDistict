<?php

// src/Controller/MyTableController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyTableController extends AbstractController
{
    /**
     * @Route("/my-table", name="my_table")
     */
    #[Route('/table', name: 'app_my_table')]
    public function index(): Response
    {
        return $this->render('my_table/index.html.twig');
    }
}