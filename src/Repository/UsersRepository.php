<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

/**
 * @extends ServiceEntityRepository<Users>
 *
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends BaseRepository 
{
    public function __construct(ManagerRegistry $doctrine)
    {
        parent::__construct($doctrine , Users::class ) ;
    }
    public function getUser()
    {
        $value = $this->getdata();
        return $value;
    }
    public function getUserById($id)
    {
        $value = $this->getdatabyid($id);
        return $value;
    }
    public function addUser($form)
    {
        return $this->adddata($form);
    }
    public function updateUser($form)
    {
        $repository = $this->_doctrine->getManager();
        $checkdata = $this->_doctrine->getRepository(Users::class)->find($form->id);
        if($checkdata == null)
        {
            return "User Not Found";
        }
        $checkdata->setName($form->Name);
        $checkdata->setAge($form->Age);
        $checkdata->setAddress($form->Address);
        $repository->flush();
        return $this->updatedata();
    }
    public function deleteUser($form)
    {
        $entityManager = $this->_doctrine->getManager();
        $checkdata = $this->_doctrine->getRepository(Users::class)->find($form->id);
        if($checkdata == null)
        {
            return "User Not Found";
        }
        $entityManager->remove($checkdata);
        $entityManager->flush();
        return $this->deletedata();
    }
}
