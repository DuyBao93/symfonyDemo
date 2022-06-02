<?php
namespace App\Controller;

use App\Repository\UsersRepository;
use App\Service\UserService;
use Doctrine\DBAL\Types\JsonType;
use PhpParser\Node\Expr\Cast\Object_;
use PhpParser\Node\Stmt\UseUse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{
    private UserService $_User;
    public function __construct(UserService $User)
    {
        $this->_User=$User;
    }
    public function index( )
    {
        $value = $this->_User->getUserService();
        return new JsonResponse(['Data'=>$value]);
    }
    public function getuserbyid(int $id)
    {
        // $id = $request->attributes->get("id");
        $value = $this->_User->getUserByIdService($id);
        return new JsonResponse(['Data'=>$value]);
    }
    public function AddUser(Request $form)
    {
        $request = json_decode($form->getContent());
        $value =  $this->_User->addUserService($request);
        return new Response(json_encode($value));
    }
    public function UpdateUser(Request $form )
    {
        $request = json_decode($form->getContent());
        $value = $this->_User->updateUserService($request);
        return new Response(json_encode($value));
    }
    public function DeleteUser(Request $form)
    {
        $request = json_decode($form->getContent());
        $value = $this->_User->deleteUserService($request);
        return new Response(json_encode($value));
    }

}