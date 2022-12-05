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

    #[ORM\Column(length: 40)]
    private ?string $nomProduit = null;

    #[ORM\ManyToMany(targetEntity: livre::class)]
    private Collection $idlivre;

    public function __construct()
    {
        $this->idlivre = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->nomProduit;
    }

    public function setNomProduit(string $nomProduit): self
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    /**
     * @return Collection<int, livre>
     */
    public function getIdlivre(): Collection
    {
        return $this->idlivre;
    }

    public function addIdlivre(livre $idlivre): self
    {
        if (!$this->idlivre->contains($idlivre)) {
            $this->idlivre->add($idlivre);
        }

        return $this;
    }

    public function removeIdlivre(livre $idlivre): self
    {
        $this->idlivre->removeElement($idlivre);

        return $this;
    }
}
