<?php

namespace App\Entity;

use App\Repository\PcRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PcRepository::class)]
class Pc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $codp = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: '0')]
    private ?string $qtec = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodp(): ?produit
    {
        return $this->codp;
    }

    public function setCodp(?produit $codp): self
    {
        $this->codp = $codp;

        return $this;
    }

    public function getQtec(): ?string
    {
        return $this->qtec;
    }

    public function setQtec(string $qtec): self
    {
        $this->qtec = $qtec;

        return $this;
    }
    



}
