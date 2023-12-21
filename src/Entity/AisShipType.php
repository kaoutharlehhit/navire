<?php

namespace App\Entity;

use App\Repository\AisShipTypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: AisShipTypeRepository::class)]
#[ORM\Table(name:'aisshiptype')]
class AisShipType
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column (name:'aisshiptype')]
    #[Assert\Range(
            min: 1,
            max: 9,
            notInRangeMessage: 'Le type AIS doit être compris entre {{ min }} et {{ max }}',
    )]
    private ?int $aisShipType = null;

    #[ORM\Column(name: 'libelle' , length: 60)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'aisShipType', targetEntity: Navire::class)]
    private Collection $navires;

    public function __construct()
    {
        $this->navires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAisShipType(): ?int
    {
        return $this->aisShipType;
    }

    public function setAisShipType(int $aisShipType): static
    {
        $this->aisShipType = $aisShipType;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection<int, Navire>
     */
    public function getNavires(): Collection
    {
        return $this->navires;
    }

    public function addNavires(Navire $navires): static
    {
        if (!$this->navires->contains($navires)) {
            $this->navires->add($navires);
            $navires->setIdaisshiptype($this);
        }

        return $this;
    }

    public function removeNavires(Navire $navires): static
    {
        if ($this->navires->removeElement($navires)) {
            // set the owning side to null (unless already changed)
            if ($navires->getIdaisshiptype() === $this) {
                $navires->setIdaisshiptype(null);
            }
        }

        return $this;
    }
    
    
}
