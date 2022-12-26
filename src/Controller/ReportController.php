<?php

namespace App\Controller;

use App\Repository\ClientRepository;
use App\Repository\CommandeRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class ReportController extends AbstractController

    {
        
        #[Route('/most-popular-client', name: 'app_most_popular_client')]
        public function index(ClientRepository $clientRepository): Response
        {
    
          /*  $produit = $commandeRepository->findMostPopularProduits();
    return $this->render('report/index.html.twig', [
    'produits' => $produit,
    ]); */
    
    $client = $clientRepository->findMostPopularVilles();
    return $this->render('report/indexville.html.twig', [
    'clients' => $client,
    ]);
    
            return $this->render('report/indexville.html.twig', [
                'controller_name' => 'ReportController',
            ]); 
        }
    
    
        #[Route('/most-popular-produit', name: 'app_most_popular_produit')]
        public function index3(CommandeRepository $commandeRepository): Response
        {
    
          $produit = $commandeRepository->findMostPopularProduits();
    return $this->render('report/index.html.twig', ['produits' => $produit,]); 
    
            return $this->render('report/index.html.twig', [
                'controller_name' => 'ReportController',
            ]);
        }
    
    
        #[Route('/most-popular-date', name: 'app_most_popular_date')]
        public function index2(CommandeRepository $commandeRepository, ClientRepository $clientRepository): Response
        {
    
          $commande = $commandeRepository->findMostPopularDates();
    return $this->render('report/indexdate.html.twig', [
    'commandes' => $commande, 
    ]); 
    
    return $this->render('report/indexdate.html.twig', [
        'controller_name' => 'ReportController',
    ]);
    
    $client = $clientRepository->findMostPopularDates();
    return $this->render('report/indexdate.html.twig', [
    'clients' => $client, 
    ]); 
            return $this->render('report/indexdate.html.twig', [
                'controller_name' => 'ReportController',
            ]);
        }
    
        #[Route('/most-popular-stock', name: 'app_most_popular_stock')]
        public function index1(ProduitRepository $produitRepository): Response
        {
    
          $produit = $produitRepository->findMostPopularStocks();
    return $this->render('report/index1.html.twig', [
    'produits' => $produit,
    ]); 
    
            return $this->render('report/index1.html.twig', [
                'controller_name' => 'ReportController',
            ]);
        }
    
        
        
    
    
    }   
    
    