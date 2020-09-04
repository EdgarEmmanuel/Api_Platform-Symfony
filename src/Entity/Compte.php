<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ApiResource(
 *      normalizationContext={"groups"={"read:comptes"}},
 *      collectionOperations={"get"},
 *      itemOperations={"get"}
 *)
 * @ApiFilter(SearchFilter::class, properties={"id": "exact"})
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:comptes"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:comptes"})
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:comptes"})
     */
    private $cleRib;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read:comptes"})
     */
    private $solde;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:comptes"})
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:comptes"})
     */
    private $dateOuverture;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:comptes"})
     */
    private $dateFermeture;

    /**
     * @ORM\ManyToOne(targetEntity=TypeCompte::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:comptes"})
     */
    private $typeCompte;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="compte_id")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:comptes"})
     */
    private $no;

    /**
     * @ORM\OneToMany(targetEntity=Operation::class, mappedBy="compte_id")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:comptes"})
     */
    private $operation;

    public function __construct(){
        $this->operation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getCleRib(): ?string
    {
        return $this->cleRib;
    }

    public function setCleRib(string $cleRib): self
    {
        $this->cleRib = $cleRib;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDateOuverture(): ?string
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(string $dateOuverture): self
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    public function getDateFermeture(): ?string
    {
        return $this->dateFermeture;
    }

    public function setDateFermeture(string $dateFermeture): self
    {
        $this->dateFermeture = $dateFermeture;

        return $this;
    }

    public function getTypeCompte(): ?TypeCompte
    {
        return $this->typeCompte;
    }

    public function setTypeCompte(?TypeCompte $typeCompte): self
    {
        $this->typeCompte = $typeCompte;

        return $this;
    }

    public function getNo(): ?Client
    {
        return $this->no;
    }

    public function setNo(?Client $no): self
    {
        $this->no = $no;

        return $this;
    }


    /**
     * @return Collection|Operation[]
     */
    public function getOperations(): Collection
    {
        return $this->operation;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operation->contains($operation)) {
            $this->operation[] = $operation;
            $operation->setCompteId($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->contains($operation)) {
            $this->operations->removeElement($operation);
            // set the owning side to null (unless already changed)
            if ($operation->getCompteId() === $this) {
                $operation->setCompteId(null);
            }
        }

        return $this;
    }

    



}
