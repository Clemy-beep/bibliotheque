<?php


namespace App\Entity;

use App\Entity\User;
use App\Entity\Article;
use Exception;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="rate")
 */
class Rate
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;
    /**
     * @ORM\Column(type="integer")
     */
    private int $rate;
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private string $comment;
    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id", nullable=false)
     */
    private User $author;
    /**
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="rate")
     * @ORM\JoinColumn(name="book_id", referencedColumnName="id", nullable=false)
     */
    private Book $book;
    public function __construct(int $r, ?string $c, User $a, Book $b)
    {
        $this->rate = $r;
        $this->comment = $c;
        $this->author = $a;
        $this->book = $b;
    }

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }



    /**
     * Get the value of rate
     *
     * @return int
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * Set the value of rate
     *
     * @param int $rate
     *
     * @return self
     */
    public function setRate(int $rate): self
    {
        if ($rate <= 5 || $rate >= 0) {
            $this->rate = $rate;
        } else throw new Exception("rate must be between 0 and 5.");

        return $this;
    }

    /**
     * Get the value of comment
     *
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @param string $comment
     *
     * @return self
     */
    public function setComment(string $comment): self
    {
        if (empty(trim($comment))) $comment = null;
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of author
     *
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @param User $author
     *
     * @return self
     */
    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of article
     *
     * @return Article
     */
    public function getArticle(): Book
    {
        return $this->book;
    }

    /**
     * Set the value of article
     *
     * @param Article $article
     *
     * @return self
     */
    public function setArticle(Book $book): self
    {
        $this->book = $book;

        return $this;
    }
}
