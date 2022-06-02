<?php

namespace App\Service;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
class UserService 
{
    private UsersRepository $_User;
    public function __construct(UsersRepository $User)
    {
        $this->_User=$User;
    }
    public function getUserService()
    {
        $value = $this->_User->getUser();
        foreach($value as $item)
        {
            $arrvalue[]=
            [
                'id' => $item->getId(),
                'name'=>$item->getName(),
                'age' => $item->getAge(),
                'address'=>$item->getAddress()
            ];
        }
        return $arrvalue;
    }
    public function getUserByIdService($id)
    {
        $value = $this->_User->getUserById($id);
        $arrvalueid[]=
        [
            'id' => $value->getId(),
            'name'=>$value->getName(),
            'age' => $value->getAge(),
            'address'=>$value->getAddress()
        ];
        return $arrvalueid;
    }
    public function addUserService($value)
    {
        $form = new Users();
        $form->setName($value->Name);
        $form->setAge($value->Age);
        $form->setAddress($value->Address);
        return $this->_User->addUser($form);
    }
    public function updateUserService($form)
    {
        return $this->_User->updateUser($form);
    }
    public function deleteUserService($form)
    {
        return $this->_User->deleteUser($form);
    }
}
