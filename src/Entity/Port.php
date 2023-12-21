<?php

namespace App\Entity;

use App\Repository\PortRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PortRepository::class)]
class Port
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 70, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $indicatif = null;
    
    #[ORM\ManyToMany(targetEntity: AisShipType::class, inversedBy: 'portsComatibles')]
    #[ORM\JoinTable(name:'porttypecompatible')]
    #[ORM\JoinColumn(name:'idport', referencedColumnName:'id')]
    #[ORM\InverseJoinColumn(name:'idaisshiptype', referencedColumnName:'id')]
    private Collection $types;
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name:'idpays', nullable: false)]
    private ?Pays $pays =null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getIndicatif(): ?string
    {
        return $this->indicatif;
    }

    public function setIndicatif(?string $indicatif): static
    {
        $this->indicatif = $indicatif;

        return $this;
    }
}
