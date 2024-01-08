<?php

namespace App\Entity;

use App\Repository\NavireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NavireRepository::class)]
class Navire
{
    
    #[Assert\Unique(fields:['imo','mmsi','indicatifAppel'])]
    
    
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column (name:'id')]
    private ?int $id = null;

    #[ORM\Column(name:'imo',length: 7)]
    #[Assert\Regex('[1-9][0-9]{6}', message: 'le numéro IMO doit être unique et composé de 7 chiffres sans commencer par 0')]
    private ?string $IMO = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $MMSI = null;

    #[ORM\Column(length: 255, name:'indicatifappel')]
    private ?string $indicatifAppel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Eta = null;

    #[ORM\Column]
    private ?int $longueur = null;

    #[ORM\Column]
    private ?int $largeur = null;

    #[ORM\Column]
    private ?float $tirantdeau = null;

    #[ORM\ManyToOne(inversedBy: 'navires')]
    #[ORM\JoinColumn(name:'idaisshiptype', referencedColumnName:'id', nullable: false)]
    private ?AisShipType $aisShipType = null;
    
    #[ORM\OneToMany(mappedBy: 'navire', targetEntity: Escale::class, orphanRemoval: true)]
        private Collection $escale;

    #[ORM\ManyToOne(inversedBy: 'navires')]
    #[ORM\JoinColumn(nullable: false, name:'idpays')]
    private ?Pays $pavillon = null;

    #[ORM\ManyToOne(inversedBy: 'navires')]
    #[ORM\JoinColumn(nullable: true, name:'idport')]
    private ?Port $destinaton = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIMO(): ?string
    {
        return $this->IMO;
    }

    public function setIMO(string $IMO): static
    {
        $this->IMO = $IMO;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMMSI(): ?string
    {
        return $this->MMSI;
    }

    public function setMMSI(string $MMSI): static
    {
        $this->MMSI = $MMSI;

        return $this;
    }

    public function getIndicatifAppel(): ?string
    {
        return $this->indicatifAppel;
    }

    public function setIndicatifAppel(string $indicatifAppel): static
    {
        $this->indicatifAppel = $indicatifAppel;

        return $this;
    }

    public function getEta(): ?string
    {
        return $this->Eta;
    }

    public function setEta(?string $Eta): static
    {
        $this->Eta = $Eta;

        return $this;
    }

    public function getLongueur(): ?int
    {
        return $this->longueur;
    }

    public function setLongueur(int $longueur): static
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getLargeur(): ?int
    {
        return $this->largeur;
    }

    public function setLargeur(int $largeur): static
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getTirantdeau(): ?float
    {
        return $this->tirantdeau;
    }

    public function setTirantdeau(float $tirantdeau): static
    {
        $this->tirantdeau = $tirantdeau;

        return $this;
    }

    public function getIdaisshiptype(): ?AisShipType
    {
        return $this->aisShipType;
    }

    public function setIdaisshiptype(?AisShipType $idaisshiptype): static
    {
        $this->aisShipType = $idaisshiptype;

        return $this;
    }

    public function getPavillon(): ?Pays
    {
        return $this->pavillon;
    }

    public function setPavillon(?Pays $pavillon): static
    {
        $this->pavillon = $pavillon;

        return $this;
    }

    public function getDestinaton(): ?Port
    {
        return $this->destinaton;
    }

    public function setDestinaton(?Port $destinaton): static
    {
        $this->destinaton = $destinaton;

        return $this;
    }
    
    
}
