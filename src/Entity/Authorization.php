<?php

namespace App\Entity;

use App\Repository\AuthorizationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuthorizationRepository::class)]
#[ORM\Table(name: '`authorization`')]
class Authorization
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $role = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $authentified = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getAuthentified(): ?User
    {
        return $this->authentified;
    }

    public function setAuthentified(?User $authentified): self
    {
        $this->authentified = $authentified;

        return $this;
    }
}
