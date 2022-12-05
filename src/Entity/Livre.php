<?php

namespace App\Entity;

use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $numeroDeSerie = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?categorie $idCategorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getNumeroDeSerie(): ?int
    {
        return $this->numeroDeSerie;
    }

    public function setNumeroDeSerie(int $numeroDeSerie): self
    {
        $this->numeroDeSerie = $numeroDeSerie;

        return $this;
    }

    public function getIdCategorie(): ?categorie
    {
        return $this->idCategorie;
    }

    public function setIdCategorie(?categorie $idCategorie): self
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }
}
