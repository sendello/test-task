<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Traits\RestResponseTrait;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Comment;
use AppBundle\Traits\RestExceptionTrait;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends Controller
{
    use RestExceptionTrait;
    use RestResponseTrait;

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response|static
     * @Route("/api/comment", name="comments", methods={"GET"})
     */
    public function commentAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Comment::class);
        $comments = $this->get('app.pagination')->paginate($repository->getFindAllQuery());

        $data = $this->get('serializer')->serialize($comments, $this->getFormat($request));

        return $this->getResponse($data, $this->getFormat($request));
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     * @Route("/api/comment/{id}", name="commentId", methods={"GET"})
     */
    public function commentIdAction($id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Comment::class);
        $comment = $repository->find($id);

        if (!$comment) {
            return $this->notFoundException('No comment found for id ' . $id);
        }

        $data = $this->get('serializer')->serialize($comment, $this->getFormat($request));
        return $this->getResponse($data, $this->getFormat($request));
    }

    /**
     * @param $id
     * @param Request $request
     * @return mixed
     * @Route("/api/comment/article/{id}", name="articleComments", methods={"GET"})
     */
    public function articleCommentsAction($id, Request $request)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        if (!$article) {
            return $this->notFoundException('No article found for id ' . $id);
        }

        $repository = $this->getDoctrine()->getRepository(Comment::class);
        $comments = $this->get('app.pagination')->paginate($repository->getArticleCommentQuery($article));

        $data = $this->get('serializer')->serialize($comments, $this->getFormat($request), array('groups' => ['public']));
        return $this->getResponse($data, $this->getFormat($request));
    }

}