<?php

namespace App\Entity;

use App\Repository\JugadorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JugadorRepository::class)
 */
class Jugador
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
    private $cognoms;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $equip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pais;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $elo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $byes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $contadorPunts;

    /**
     * @ORM\ManyToMany(targetEntity=Jugador::class)
     */
    private $jugadorsEnfrontats;

    public function __construct()
    {
        $this->jugadorsEnfrontats = new ArrayCollection();
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

    public function getCognoms(): ?string
    {
        return $this->cognoms;
    }

    public function setCognoms(string $cognoms): self
    {
        $this->cognoms = $cognoms;

        return $this;
    }

    public function getEquip(): ?string
    {
        return $this->equip;
    }

    public function setEquip(?string $equip): self
    {
        $this->equip = $equip;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getElo(): ?int
    {
        return $this->elo;
    }

    public function setElo(?int $elo): self
    {
        $this->elo = $elo;

        return $this;
    }

    public function getByes(): ?int
    {
        return $this->byes;
    }

    public function setByes(?int $byes): self
    {
        $this->byes = $byes;

        return $this;
    }

    public function __toString()
    {
        return $this->nom." ".$this->cognoms;
    }

    public function getContadorPunts(): ?int
    {
        return $this->contadorPunts;
    }

    public function setContadorPunts(?int $contadorPunts): self
    {
        $this->contadorPunts = $contadorPunts;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getJugadorsEnfrontats(): Collection
    {
        return $this->jugadorsEnfrontats;
    }

    public function addJugadorsEnfrontat(self $jugadorsEnfrontat): self
    {
        if (!$this->jugadorsEnfrontats->contains($jugadorsEnfrontat)) {
            $this->jugadorsEnfrontats[] = $jugadorsEnfrontat;
        }

        return $this;
    }

    public function removeJugadorsEnfrontat(self $jugadorsEnfrontat): self
    {
        $this->jugadorsEnfrontats->removeElement($jugadorsEnfrontat);

        return $this;
    }
}
