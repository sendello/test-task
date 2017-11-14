<?php

namespace AppBundle\Controller;

use AppBundle\Traits\RestExceptionTrait;
use AppBundle\Traits\RestResponseTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Article;

class ArticleController extends Controller
{
    use RestExceptionTrait;

    use RestResponseTrait;

    /**
     * @param Request $request
     * @return mixed
     * @Route("/api/article", name="articles", methods={"GET"})
     */
    public function articleAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $articles = $this->get('app.pagination')->paginate($repository->getFindAllQuery());

        $data = $this->get('serializer')->serialize($articles, $this->getFormat($request));
        return $this->getResponse($data, $this->getFormat($request));
    }

    /**
     * @param $id
     * @param Request $request
     * @return  mixed
     * @Route("/api/article/{id}", name="articleId", methods={"GET"})
     */
    public function articleIdAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);
        $article = $repository->find($id);

        if (!$article) {
            return $this->notFoundException('No article found for id ' . $id);
        }
        $data = $this->get('serializer')->serialize($article, $this->getFormat($request));
        return $this->getResponse($data, $this->getFormat($request));
    }

}
