<?php
/**
 * Created by PhpStorm.
 * User: Paul
 * Date: 6/18/14
 * Time: 10:16 AM
 */

namespace PG\NewsBundle\Entity\EventListener;


use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use PG\NewsBundle\Entity\Post;

class PostListener {
    public function prePersist(Post $article, LifecycleEventArgs $event)
    {
        $article->setDate(new \DateTime('now'));
    }
} 