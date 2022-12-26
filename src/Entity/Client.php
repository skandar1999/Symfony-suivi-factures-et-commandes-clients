<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomc = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 7, scale: 3)]
    private ?string $creditc = null;

    #[ORM\Column(length: 255)]
    private ?string $adrc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomc(): ?string
    {
        return $this->nomc;
    }

    public function setNomc(string $nomc): self
    {
        $this->nomc = $nomc;

        return $this;
    }

    public function getCreditc(): ?string
    {
        return $this->creditc;
    }

    public function setCreditc(string $creditc): self
    {
        $this->creditc = $creditc;

        return $this;
    }

    public function getAdrc(): ?string
    {
        return $this->adrc;
    }

    public function setAdrc(string $adrc): self
    {
        $this->adrc = $adrc;

        return $this;
    }
    public function __toString()
        {
        return $this->nomc . ' ' . $this->creditc ;

        }

    }
       