<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 16/2/23
 * Time: 下午6:10
 */

namespace Blogger\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BlogRepository extends EntityRepository{
    public function getLatestBlogs($limit=null)
    {
        $query=$this->createQueryBuilder('b')
            ->select('b','c')
            ->leftJoin('b.comments','c')
            ->addOrderBy('b.created','DESC');

        if(false === is_null($limit))
            $query->setMaxResults($limit);

        return $query->getQuery()->getResult();
    }
    public function getTags()
    {
        $blogTags = $this->createQueryBuilder('b')
            ->select('b.tags')
            ->getQuery()
            ->getResult();
        $tags=array();
        foreach($blogTags as $blogTag)
        {
            $tags = array_merge(explode(",",$blogTag['tags']),$tags);
        }
        foreach($tags as $tag)
        {
            $tag=trim($tag);
        }
        return $tags;
    }
    public function getTagWeights($tags)
    {
        $tagWeights=array();
        if(empty($tags))
            return $tagWeights;

        foreach($tags as $tag)
        {
            $tagWeights[$tag]=(isset($tagWeights[$tag]))?$tagWeights[$tag]+1:1;
        }

        uksort($tagWeights,function(){
            return rand()>rand();
        });

        $max = max($tagWeights);

        $multiplier=($max>5) ? 5/$max : 1;
        foreach($tagWeights as $tag)
        {
            $tag = ceil($tag*$multiplier);
        }
        return $tagWeights;

    }
}

