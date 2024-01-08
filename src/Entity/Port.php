<?php

namespace App\Entity;

use App\Repository\PortRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    #[ORM\OneToMany(mappedBy: 'port', targetEntity: Escale::class, orphanRemoval: true)]
        private Collection $escale;
    
    #[ORM\ManyToOne]
    #[ORM\JoinColumn(name:'idpays', nullable: false)]
    private ?Pays $pays =null;

    #[ORM\OneToMany(mappedBy: 'destinaton', targetEntity: Navire::class)]
    private Collection $navires;

    public function __construct()
    {
        $this->navires = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Navire>
     */
    public function getNavires(): Collection
    {
        return $this->navires;
    }

    public function addNavire(Navire $navire): static
    {
        if (!$this->navires->contains($navire)) {
            $this->navires->add($navire);
            $navire->setDestinaton($this);
        }

        return $this;
    }

    public function removeNavire(Navire $navire): static
    {
        if ($this->navires->removeElement($navire)) {
            // set the owning side to null (unless already changed)
            if ($navire->getDestinaton() === $this) {
                $navire->setDestinaton(null);
            }
        }

        return $this;
    }
}
