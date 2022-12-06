<?php

namespace App\Entity;

use App\Repository\EmpreintRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmpreintRepository::class)]
class Empreint
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'empreints')]
    private ?User $empreinter = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Book $empreinted = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Book $book = null;

    public function __construct()
    {
        $this->book = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmpreinter(): ?User
    {
        return $this->empreinter;
    }

    public function setEmpreinter(?User $empreinter): self
    {
        $this->empreinter = $empreinter;

        return $this;
    }

    public function getEmpreinted(): ?Book
    {
        return $this->empreinted;
    }

    public function setEmpreinted(?Book $empreinted): self
    {
        $this->empreinted = $empreinted;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }
}
