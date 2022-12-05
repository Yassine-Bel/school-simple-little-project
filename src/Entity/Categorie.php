<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nomCate = null;

    #[ORM\Column(length: 20)]
    private ?string $nivEtude = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCate(): ?string
    {
        return $this->nomCate;
    }

    public function setNomCate(string $nomCate): self
    {
        $this->nomCate = $nomCate;

        return $this;
    }

    public function getNivEtude(): ?string
    {
        return $this->nivEtude;
    }

    public function setNivEtude(string $nivEtude): self
    {
        $this->nivEtude = $nivEtude;

        return $this;
    }
}
