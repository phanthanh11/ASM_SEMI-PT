<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Form\ProductType;

class ProductuserController extends AbstractController
{
    #[Route('/productuser', name: 'app_productuser')]

    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();

        return $this->render('productuser/index.html.twig', [
            'products' => $products,
        ]);
    }
}
