<?php

namespace App\Controller;

use App\Helpers\EntityManagerHelper;
use App\Models\AbstractRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Exception;
use App\Entity\User;

class UserController
{
    public function register()
    {
        if (!empty($_POST)) {
            $em = EntityManagerHelper::getEntityManager();
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                echo 'Email address is not valid';
            }
            try {
                $this->verifyMail($_POST["email"]);
            } catch (\Throwable $th) {
                $msg = $th->getMessage();
                $code = $th->getCode();
                echo "Error $code : $msg";
            }
            $hashpwd = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $user = new User($_POST['firstname'], $_POST['lastname'], $_POST['username'], $hashpwd, $_POST['email']);
            $em->persist($user);
            try {
                $em->flush();
                echo "User successfully created.";
            } catch (\Throwable $th) {
                $msg = $th->getMessage();
                $code = $th->getCode();
                echo "Error $code : $msg";
            }
        }
        include "./src/Views/SignUp.php";
    }

    private function verifyMail($email)
    {
        $em = EntityManagerHelper::getEntityManager();
        $userRepository = new AbstractRepository($em,  new ClassMetadata("App\Entity\User"));
        $user = $userRepository->findBy(["email" => $email]);
        if (!isset($user)) {
            throw new Exception("Email already taken.");
        }
    }
}