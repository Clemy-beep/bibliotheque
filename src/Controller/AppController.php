<?php

namespace App\Controller;

use Router\Router;
use App\Helpers\EntityManagerHelper;
use App\Models\AbstractRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

final class AppController
{

    public function index(): void
    {
        include './src/Views/HomeAno.php';
    }

    public function error404(): void
    {
        Router::redirect("404");
    }
    public function login(): void
    {
        if (!empty($_POST)) {
            $_POST = array_map('trim', array_map('strip_tags', $_POST));
            $em = EntityManagerHelper::getEntityManager();
            $userRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\User"));
            $user = $userRepository->findBy(['username' => $_POST['username']]);

            if (empty($user)) {
                echo "User not found";
                die('User not found');
            }

            if (!password_verify($_POST['password'], $user[0]->getPwd())) {
                echo "User not found";
                echo "<a href='http://127.0.0.6/sign-up'>Please create an account</a>";
            };

            $_SESSION['id'] = $user[0]->getId();
            $_SESSION['username'] = $user[0]->getUsername();
            header('Location: /home');
        }
        include './src/Views/Login.php';
    }
    public function home()
    {
        include './src/Views/HomeLogged.php';
    }

    public function logout()
    {
        unset($_SESSION);
        session_unset();
        session_destroy();
        header("Location: /");
    }
}
