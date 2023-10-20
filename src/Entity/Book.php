<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BookRepository::class)]
class Book
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $title = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $category = null;

    
    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ref = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Publication_date = null;

    #[ORM\Column]
    private ?bool $published = null;

    #[ORM\ManyToOne(inversedBy: 'books')]
    private ?Author $author = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setRef(string $ref): void
    {
        $this->ref = $ref;
    }
    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getPublicationdate(): ?\DateTimeInterface
    {
        return $this->Publication_date;
    }

    public function setPublicationdate(\DateTimeInterface $Publication_date): static
    {
        $this->Publication_date = $Publication_date;

        return $this;
    }

    public function isPublished(): ?bool
    {
        return $this->published;
    }

    public function setPublished(bool $published): static
    {
        $this->published = $published;

        return $this;
    }

    public function getAuthor(): ?Author
    {
        return $this->author;
    }

    public function setAuthor(?Author $author_id): static
    {
        $this->author = $author_id;

        return $this;
    }
}
