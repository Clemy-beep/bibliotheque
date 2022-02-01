<?php

namespace App\Controller;

use App\Entity\Rate;
use Exception;
use App\Helpers\EntityManagerHelper;
use App\Models\AbstractRepository;
use Doctrine\ORM\Mapping\ClassMetadata;


class RateController
{
    public function add($id)
    {
        $em = EntityManagerHelper::getEntityManager();
        $booksRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\Book"));
        $book = $booksRepository->find($id);
        $userRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\User"));
        $user = $userRepository->find($_SESSION['id']);
        if (!empty($_POST)) {
            $rate = new Rate($_POST['rate'], (empty($_POST['comment'])) ? null : $_POST['comment'], $user, $book);
            $em->persist($rate);
            try {
                $em->flush();
                header("Location: /book/$id");
                echo "Book rated";
            } catch (Exception $e) {
                $msg = $e->getMessage();
                $code = $e->getCode();
                echo "Error $code : $msg";
            }
        }
        include './src/Views/RateBook.php';
    }

    public function modify($id)
    {
        $em = EntityManagerHelper::getEntityManager();
        $ratesRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\Rate"));
        $rate = $ratesRepository->find($id);
        if (!empty($_POST)) {
            $rate->setRate($_POST['rate']);
            $rate->setComment($_POST['comment']);
            echo "rate updated";
            try {
                $em->flush();
            } catch (\Throwable $e) {
                $msg = $e->getMessage();
                $code = $e->getCode();
                echo "Error $code : $msg";
            }
        }

        include './src/Views/EditRate.php';
    }
    public function delete($id)
    {
        $em = EntityManagerHelper::getEntityManager();
        $ratesRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\Rate"));
        $rate = $ratesRepository->find($id);
        $em->remove($rate);
        try {
            $em->flush();
            echo "<p>Rate deleted successfully</p>";
            echo "<a href='http://127.0.0.6/home'>Back to home</a>";
        } catch (Exception $e) {
            $msg = $e->getMessage();
            $code = $e->getCode();
            echo "Error $code : $msg";
        }
    }
}
