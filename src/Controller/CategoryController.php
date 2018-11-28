<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\State;
use App\Entity\Traobject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class CategoryController
 * @package App\Controller
 * @Route("/category")
 */
class CategoryController extends BaseController
{
    /**
     * @Route("/", name="category")
     */
    public function footerCategory()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

        return $this->render('category/footercategory.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/show/{id}", name="category_show")
     *
     * @param Category $category
     * @return Response
     */
    public function showTraobjectByCategory(Category $category)
    {
        $traobjects = $this->getDoctrine()->getRepository(Traobject::class)->findBy(["category" => $category], ["eventAt" => "DESC"]);

        return $this->render('category/show.html.twig', [
            'category' => $category,
            'traobjects' => $traobjects
        ]);

    }
}
