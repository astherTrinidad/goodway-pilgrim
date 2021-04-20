<?php

namespace App\Repository;

use App\Entity\Logro;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\LogroUsuario;

/**
 * @method Logro|null find($id, $lockMode = null, $lockVersion = null)
 * @method Logro|null findOneBy(array $criteria, array $orderBy = null)
 * @method Logro[]    findAll()
 * @method Logro[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LogroRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Logro::class);
    }

    public function getById($id)
    {
        $em = $this->getEntityManager();
        $db = $em->getConnection();

        $query = "SELECT * FROM logro_usuario";
        $result = $db->executeQuery($query);
        $logrosResult = $result->fetchAll();
        $logros = array();

        foreach ($logrosResult as $logro) {
            array_push($logros, $logro);
        }
        return $logros;
    }

    public function getThreeById($id)
    {
        $em = $this->getEntityManager();
        $db = $em->getConnection();

        $query = "SELECT * FROM logro_usuario WHERE id_usuario = $id ORDER BY date DESC LIMIT 3";
        $result = $db->executeQuery($query);
        $logrosResult = $result->fetchAll();
        $logros = array();

        foreach ($logrosResult as $logro) {
            array_push($logros, $logro);
        }
        return $logros;
    }
}
