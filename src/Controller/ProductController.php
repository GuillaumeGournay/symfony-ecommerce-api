<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\CategoryRepository;
use App\Repository\TagRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

// A Mettre pour serialiser le retour du service en json
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;


/**
 * @Route("/product")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/", name="products", methods={"GET"})
     */
    public function index(ProductRepository $productRepository): Response
    {
        $encoders = [new JsonEncoder()]; // If no need for XmlEncoder
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $products = $productRepository->findAll();

        $products = $serializer->serialize($products, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);        
        return new Response($products, 200, ['Content-Type' => 'application/json']);
	}
	
	/**
     * @Route("/{id}", name="detail_product", methods={"GET"})
     */
    public function detail(ProductRepository $productRepository, $id): Response
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
		$serializer = new Serializer($normalizers, $encoders);
		
        $products = $productRepository->find($id);
        $products = $serializer->serialize($products, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);
        return new Response($products, 200, ['Content-Type' => 'application/json']);
    }


    /**
     * @Route("/add", name="add_product", methods={"POST"})
     */
	public function add(Request $request, CategoryRepository $categoryRepository, TagRepository $tagRepository)
    {
        $data= json_decode($request->getContent(), true);
        $category = $categoryRepository->find($data['category']);
        $product = new Product($data['name'],$data['price'],$data['image'], $category);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($product);
		
        $entityManager->flush();
        foreach($data['tag'] as $tag){
			$tag = $tagRepository->find($tag);
            $product->addTag($tag);   
			$entityManager->persist($product);
        }
		$entityManager->flush();
        return $this->json($data);
    }


    /**
     * @Route("/{id}", name="delete_product", methods={"DELETE"})
     */
    public function delete(ProductRepository $productRepository, $id)
    {
        $product = $productRepository->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($product);
        $entityManager->flush();       
        return $this->json("Product deleted");
    }


    /**
     * @Route("/edit/{id}", name="edit_product", methods={"PUT"})
     */
    public function edit(ProductRepository $productRepository, CategoryRepository $categoryRepository, Request $request, $id)
    {
        $data= json_decode($request->getContent(), true);
        $product = $productRepository->find($id);

        $category = $categoryRepository->find($data['category']);
        $entityManager = $this->getDoctrine()->getManager();
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }      
        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setImage($data['image']);
        $product->setCategory($category);
        $entityManager->flush();
        return $this->json("Product updated");
    }


}
