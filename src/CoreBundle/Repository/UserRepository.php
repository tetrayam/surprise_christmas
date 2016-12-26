<?php

namespace CoreBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function getUsersByNotGiftToFilterNotMe($me){
        $qb = $this->createQueryBuilder('u');
        $qb->where('u.santa is null')
            ->andWhere('u.id != :me')
            ->setParameter('me', $me->getId());

        return $qb->getQuery()->getResult();
    }
}