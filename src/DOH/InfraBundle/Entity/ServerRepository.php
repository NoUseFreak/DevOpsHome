<?php

namespace DOH\InfraBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ServerRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ServerRepository extends EntityRepository
{
    public function getCount()
    {
        $qb = $this->_em->createQueryBuilder();

        $qb->select('count(server.id)');
        $qb->from('DOHInfraBundle:Server', 'server');

        return $qb->getQuery()->getSingleScalarResult();
    }
}
