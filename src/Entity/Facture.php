<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $codc = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datf = null;

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

    public function getDatf(): ?\DateTimeInterface
    {
        return $this->datf;
    }

    public function setDatf(\DateTimeInterface $datf): self
    {
        $this->datf = $datf;

        return $this;
    }
}
