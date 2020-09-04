<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass=CompteRepository::class)
 */
class Compte
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
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cleRib;

    /**
     * @ORM\Column(type="integer")
     */
    private $solde;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateOuverture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $dateFermeture;

    /**
     * @ORM\ManyToOne(targetEntity=TypeCompte::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeCompte;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="compte_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $no;

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

    



}
