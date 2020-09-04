<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\ManyToOne(targetEntity=TypeClient::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeClient;

    /**
     * @ORM\OneToMany(targetEntity=Compte::class, mappedBy="no")
     * @ORM\JoinColumn(nullable=false)
     */
    private $compte_id;

    public function __construct()
    {
        $this->compte_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getTypeClient(): ?TypeClient
    {
        return $this->typeClient;
    }

    public function setTypeClient(?TypeClient $typeClient): self
    {
        $this->typeClient = $typeClient;

        return $this;
    }

    /**
     * @return Collection|Compte[]
     */
    public function getCompteId(): Collection
    {
        return $this->compte_id;
    }

    public function addCompteId(Compte $compteId): self
    {
        if (!$this->compte_id->contains($compteId)) {
            $this->compte_id[] = $compteId;
            $compteId->setNo($this);
        }

        return $this;
    }

    public function removeCompteId(Compte $compteId): self
    {
        if ($this->compte_id->contains($compteId)) {
            $this->compte_id->removeElement($compteId);
            // set the owning side to null (unless already changed)
            if ($compteId->getNo() === $this) {
                $compteId->setNo(null);
            }
        }

        return $this;
    }
}
