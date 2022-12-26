<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    private ?Client $codc = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodc(): ?Client
    {
        return $this->codc;
    }

    public function setCodc(?Client $codc): self
    {
        $this->codc = $codc;

        return $this;
    }

    public function getDatc(): ?\DateTimeInterface
    {
        return $this->datc;
    }

    public function setDatc(\DateTimeInterface $datc): self
    {
        $this->datc = $datc;

        return $this;
    }
}
