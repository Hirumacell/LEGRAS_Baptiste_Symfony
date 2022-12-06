<?php

namespace App\Entity;

use App\Repository\ChatonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChatonRepository::class)
 */
class Chaton
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Sterelise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Photo;

    /**
     * @ORM\ManyToOne(targetEntity=Cateforie::class, inversedBy="chatons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Categorie;

    /**
     * @ORM\ManyToMany(targetEntity=Proprietaire::class, inversedBy="chaton_id")
     */
    private $proprietaire_id;

    public function __construct()
    {
        $this->proprietaire_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function isSterelise(): ?bool
    {
        return $this->Sterelise;
    }

    public function setSterelise(bool $Sterelise): self
    {
        $this->Sterelise = $Sterelise;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(?string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getCategorie(): ?Cateforie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Cateforie $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    /**
     * @return Collection<int, proprietaire>
     */
    public function getProprietaireId(): Collection
    {
        return $this->proprietaire_id;
    }

    public function addProprietaireId(proprietaire $proprietaireId): self
    {
        if (!$this->proprietaire_id->contains($proprietaireId)) {
            $this->proprietaire_id[] = $proprietaireId;
        }

        return $this;
    }

    public function removeProprietaireId(proprietaire $proprietaireId): self
    {
        $this->proprietaire_id->removeElement($proprietaireId);

        return $this;
    }
}
