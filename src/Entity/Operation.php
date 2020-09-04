<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=OperationRepository::class)
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"read:comptes"})
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:comptes"})
     */
    private $dateOperation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:comptes"})
     */
    private $nomOperation;

    /**
     * @ORM\ManyToOne(targetEntity=Compte::class, inversedBy="operation")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:comptes"})
     */
    private $compte_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateOperation(): ?string
    {
        return $this->dateOperation;
    }

    public function setDateOperation(string $dateOperation): self
    {
        $this->dateOperation = $dateOperation;

        return $this;
    }

    public function getNomOperation(): ?string
    {
        return $this->nomOperation;
    }

    public function setNomOperation(string $nomOperation): self
    {
        $this->nomOperation = $nomOperation;

        return $this;
    }

    public function getCompteId(): ?Compte
    {
        return $this->compte_id;
    }

    public function setCompteId(?Compte $compte_id): self
    {
        $this->compte_id = $compte_id;

        return $this;
    }

  

}
