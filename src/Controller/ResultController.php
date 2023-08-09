<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\OrderRepository;

class ResultController extends AbstractController
{

    #[Route('/search', name: 'search')]
    public function search(Request $request, ProductRepository $productRepository): Response
    {
        $keyword = $request->query->get('keyword');

        $products = $productRepository->searchByKeyword($keyword);

        return $this->render('result/index.html.twig', [
            'products' => $products,
            'keyword' => $keyword,
        ]);
    }
}
