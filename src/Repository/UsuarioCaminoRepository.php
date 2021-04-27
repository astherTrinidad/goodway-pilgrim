<?php

namespace App\Repository;

use App\Entity\UsuarioCamino;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UsuarioCamino|null find($id, $lockMode = null, $lockVersion = null)
 * @method UsuarioCamino|null findOneBy(array $criteria, array $orderBy = null)
 * @method UsuarioCamino[]    findAll()
 * @method UsuarioCamino[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioCaminoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UsuarioCamino::class);
    }

    public function getAllById($id)
    {
        $em = $this->getEntityManager();
        $db = $em->getConnection();
        $query = "SELECT * FROM usuario_camino WHERE id_usuario = $id";
        $result = $db->executeQuery($query);
        $usersPaths = $result->fetchAll();

        return $usersPaths;
    }

    public function getActivePath($id)
    {
        $em = $this->getEntityManager();
        $db = $em->getConnection();
        $query = "SELECT * FROM usuario_camino WHERE id_usuario = $id AND status = 'Active'";
        $result = $db->executeQuery($query);
        $usersPathsActive = $result->fetchAll();
        if(count($usersPathsActive) == 0){
            return null;
        }
        return $usersPathsActive[0];
    }
}
