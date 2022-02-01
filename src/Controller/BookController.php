<?php

namespace App\Controller;

use App\Entity\Book;
use Exception;
use App\Helpers\EntityManagerHelper;
use App\Models\AbstractRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class BookController
{
    public function all()
    {
        $em = EntityManagerHelper::getEntityManager();
        $booksRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\Book"));
        $books = $booksRepository->findAll();
        $ratesRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\Rate"));
        //$rates = $ratesRepository->findAll();
        include './src/Views/AllBooks.php';
    }

    public function showArticle($id){
        $em = EntityManagerHelper::getEntityManager();
        $booksRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\Book"));
        $book = $booksRepository->find($id);
        include './src/Views/Book.php';
    }

    public function add()
    {
        if (!empty($_POST)) {
            $_POST = array_map('trim', array_map('strip_tags', $_POST));
            $em = EntityManagerHelper::getEntityManager();
            $book = new Book($_POST['isbn'], $_POST['title'], $_POST['resume'], $_POST['author'], $_POST['editor']);
            $em->persist($book);
            try {
                $em->flush();
                echo "Book created";
            } catch (\Throwable $th) {
                $msg = $th->getMessage();
                $code = $th->getCode();
                echo "Error $code : $msg";
            }
        }
        include "./src/Views/AddBook.php";
    }
    public function modify($id)
    {
        $em = EntityManagerHelper::getEntityManager();
        $booksRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\Book"));
        $book = $booksRepository->find($id);
        if (!empty($_POST)) {
            $book->setTitle($_POST['title']);
            $book->setResume($_POST['resume']);
            $book->setAuthor($_POST['author']);
            $book->setEditor($_POST['editor']);
            try {
                $em->flush();
                echo "Book modified";
            } catch (Exception $e) {
                $msg = $e->getMessage();
                $code = $e->getCode();
                echo "Error $code : $msg";
            }
        }
        include './src/Views/EditBook.php';
    }

    public function delete($id)
    {
        $em = EntityManagerHelper::getEntityManager();
        $articleRepository = new AbstractRepository($em, new ClassMetadata("App\Entity\Book"));
        $article = $articleRepository->find($id);
        $em->remove($article);
        try {
            $em->flush();
            echo "Book deleted";
            echo "<a href='http://127.0.0.6/home'>Back to home</a>";
        } catch (Exception $e) {
            $msg = $e->getMessage();
            $code = $e->getCode();
            echo "Error $code : $msg";
        }
    }
}
