<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

/**
 * @extends ServiceEntityRepository<Users>
 *
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
abstract class BaseRepository extends ServiceEntityRepository implements IRepository
{
    protected string $_item ;
    protected ManagerRegistry $_doctrine;
    public function __construct ( ManagerRegistry $doctrine , string $entity  )
    {
       
        $this->_item = $entity;
        $this->_doctrine = $doctrine;
        parent::__construct($doctrine,$entity);
    }
    public function getdata()
    {
        $repository = $this->_doctrine->getRepository($this->_item)->findAll();
        return $repository;
    }
    public function getdatabyid($id)
    {
        $repository = $this->_doctrine->getRepository($this->_item)->find($id);
        return $repository;
    }
    public function adddata($form)
    {
        try
        {
            $value = new $this->_item;
            $value = $form;
            
            $repository = $this->_doctrine->getManager();
            $repository->persist($value);
            $repository->flush();
            return ("ADD Done");
        }
        catch(Exception $e)
        {
            throw($e);
        }
       
    }
    public function updatedata()
    {
        return ("PUT Done");
    }
    public function deletedata()
    {
        return ("Delete Done");

    }
}
