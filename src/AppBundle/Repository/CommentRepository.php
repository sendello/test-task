<?php
/**
 * Created by PhpStorm.
 * User: izabashta
 * Date: 14.11.17
 * Time: 14:58
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Article;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getFindAllQuery()
    {
        $qb = $this->createQueryBuilder('comment');
        return $qb;
    }

    /**
     * @param Article $article
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getArticleCommentQuery(Article $article)
    {
        $qb = $this->createQueryBuilder('comment')
            ->where('comment.article = :article')
            ->setParameter('article', $article);
        return $qb;
    }
}