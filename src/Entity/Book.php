<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="book")
 */
class Book
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
    private int $isbn;
    /**
     * @ORM\Column(type="string")
     */
    private string $title;
    /**
     * @ORM\Column(type="string")
     */
    private string $resume;
    /**
     * @ORM\Column(type="string")
     */
    private string $author;
    /**
     * @ORM\Column(type="string")
     */
    private string $editor;
    /**
     * @ORM\OneToMany(targetEntity="Rate", mappedBy="book")
     */
    private Collection $rates;

    public function __construct(int $i, string $t, string $r, string $a, string $e)
    {
        $this->isbn = $i;
        $this->title = $t;
        $this->resume = $r;
        $this->author = $a;
        $this->editor = $e;
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
     * Get the value of isbn
     *
     * @return int
     */
    public function getIsbn(): int
    {
        return $this->isbn;
    }

    /**
     * Set the value of isbn
     *
     * @param int $isbn
     *
     * @return self
     */
    public function setIsbn(int $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of resume
     *
     * @return string
     */
    public function getResume(): string
    {
        return $this->resume;
    }

    /**
     * Set the value of resume
     *
     * @param string $resume
     *
     * @return self
     */
    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get the value of author
     *
     * @return Author
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @param Author $author
     *
     * @return self
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of editor
     *
     * @return Editor
     */
    public function getEditor(): string
    {
        return $this->editor;
    }

    /**
     * Set the value of editor
     *
     * @param Editor $editor
     *
     * @return self
     */
    public function setEditor(string $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

    /**
     * Get the value of rates
     */
    public function getRates()
    {
        return $this->rates;
    }

    /**
     * Set the value of rates
     */
    public function setRates($rates): self
    {
        $this->rates = $rates;

        return $this;
    }
}
