<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * @Route("/category")
 */
class CategoryController extends AbstractController
{
   /**
    * @Route("/", name="categorys", methods={"GET"})
    */
   public function index(CategoryRepository $categoryRepository)
   {
        $encoders = [new JsonEncoder()]; 
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $categorys = $categoryRepository->findAll();

        $categorys = $serializer->serialize($categorys, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);        
        return new Response($categorys, 200, ['Content-Type' => 'application/json']);
   }

    /**
     * @Route("/{id}", name="category_detail", methods={"GET"})
     */
    public function detail(CategoryRepository $categoryRepository, $id)
    {
        $encoders = [new JsonEncoder()]; 
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $categorys = $categoryRepository->find($id);

        $categorys = $serializer->serialize($categorys, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);        
        return new Response($categorys, 200, ['Content-Type' => 'application/json']);
    }

   /**
    * @Route("/add", name="category", methods={"POST"})
    */
   public function add(Request $request)
   {
       $data= json_decode($request->getContent(), true);
       $category = new Category($data['name']);
       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->persist($category);
       $entityManager->flush();
       return $this->json($data);
   }

   /**
    * @Route("/{id}", name="category_delete", methods={"DELETE"})
    */
   public function delete(CategoryRepository $categoryRepository, $id)
   {
       $category = $categoryRepository->find($id);
       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->remove($category);
       $entityManager->flush();      
       return $this->json("Category deleted");
   }
   
	/**
    * @Route("/edit/{id}", name="category_edit", methods={"PUT"})
    */
   public function edit(CategoryRepository $categoryRepository, Request $request, $id)
   {
       $data= json_decode($request->getContent(), true);
       $category = $categoryRepository->find($id);
       $entityManager = $this->getDoctrine()->getManager();
       if (!$category) {
           throw $this->createNotFoundException(
               'No category found for id '.$id
           );
       }     
       $category->setName($data['name']);
       $entityManager->flush();
       return $this->json("Category updated");
   }
}