<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/23
 * Time: 下午10:56
 */

namespace Blogger\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{
    public function getCommentsForBlog($blogId,$approved=true)
    {
        $query = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.blog=:blog_id')
            ->addOrderBy('c.created')
            ->setParameter('blog_id',$blogId);

        if(false === is_null($approved))
            $query->andWhere('c.approved=:approved')
                ->setParameter('approved',$approved);
        return $query->getQuery()
            ->getResult();
    }
    public function getLastestComments($limit = 10)
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c')
            ->addOrderBy('c.id','DESC');
        if(false === is_null($limit))
            $qb->setMaxResults($limit);

        return $qb->getQuery()->getResult();
    }
}