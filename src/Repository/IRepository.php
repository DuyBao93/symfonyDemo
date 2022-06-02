<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


interface IRepository 
{
    public function getdata();
    public function getdatabyid($id);
    public function adddata($form);
    public function updatedata();
    public function deletedata();
}
