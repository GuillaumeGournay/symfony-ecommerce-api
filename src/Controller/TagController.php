<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * @Route("/tag")
 */
class TagController extends AbstractController
{
   /**
    * @Route("/", name="tags", methods={"GET"})
    */
   public function index(TagRepository $tagRepository)
   {
       $encoders = [new JsonEncoder()]; 
       $normalizers = [new ObjectNormalizer()];
       $serializer = new Serializer($normalizers, $encoders);
       
       $tags = $tagRepository->findAll();
       $tags = $serializer->serialize($tags, 'json', [
           'circular_reference_handler' => function ($object) {
               return $object->getId();
           }
       ]);        
       return new Response($tags, 200, ['Content-Type' => 'application/json']);
   }

    /**
     * @Route("/{id}", name="tag_detail", methods={"GET"})
     */
    public function detail(TagRepository $tagRepository, $id)
    {
        $encoders = [new JsonEncoder()]; 
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $tags = $tagRepository->find($id);
        $tags = $serializer->serialize($tags, 'json', [
            'circular_reference_handler' => function ($object) {
                return $object->getId();
            }
        ]);        
        return new Response($tags, 200, ['Content-Type' => 'application/json']);
    }

   /**
    * @Route("/add", name="tag", methods={"POST"})
    */
   public function add(Request $request)
   {
       $data= json_decode($request->getContent(), true);
       $tag = new Tag($data['name']);
       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->persist($tag);
       $entityManager->flush();
       return $this->json($data);
   }

   /**
    * @Route("/{id}", name="tag_delete", methods={"DELETE"})
    */
   public function delete(TagRepository $tagRepository, $id)
   {
       $tag = $tagRepository->find($id);
       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->remove($tag);
       $entityManager->flush();      
       return $this->json("Tag deleted");
   }
   
	/**
    * @Route("/edit/{id}", name="tag_edit", methods={"PUT"})
    */
   public function edit(TagRepository $tagRepository, Request $request, $id)
   {
       $data= json_decode($request->getContent(), true);
       $tag = $tagRepository->find($id);
       $entityManager = $this->getDoctrine()->getManager();
       if (!$tag) {
           throw $this->createNotFoundException(
               'No tag found for id '.$id
           );
       }     
       $tag->setName($data['name']);
       $entityManager->flush();
       return $this->json("Tag updated");
   }
}