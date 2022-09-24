<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ApiService;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{
      /**
     * @Route("/js", name="app_productjs")
     */
    public function index(): Response
    {
        return $this->render('product/indexjs.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }
	
  /**
     * @Route("/", name="app_product")
     */
    public function index1(ApiService $ApiService,Request $request): Response
    {
		
		
		 $response = $this->render('product/index.html.twig', [
            'products' => $ApiService->getApiProducts(), 
            
        ]);

        $response->setSharedMaxAge(3600);

        return $response;
		
		
      
    }
	
	
    /**
     * @Route("/product/detail/{id}", name="product_detail")
     */
	 
   	
	public function detail(ApiService $ApiService,$id): Response
    {
                    
     
         $response = $this->render('product/detail.html.twig', [
            'detailproduct' => $ApiService->getApiProductDetail($id), 
            
        ]);

        $response->setSharedMaxAge(3600);

        return $response; 


    }
	
	  /**
     * @Route("/product/search", name="product_search", methods={"POST"})
     */
	 
   	
	public function detailsearch(ApiService $ApiService, Request $request): Response
    {
                    
     if(!empty($request->request->get('search'))  )
        {
			$name=$request->request->get('search');
			
	         $response = $this->render('product/index.html.twig', [
            'products' => $ApiService->getApiProductName($name), 
            
        ]);
		}
		else{
				 $response = $this->render('product/index.html.twig', [
            'products' => $ApiService->getApiProducts(), 
            
        ]);
			
		}
        $response->setSharedMaxAge(5600);

        return $response; 


    }
}
