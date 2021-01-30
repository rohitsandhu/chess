<?php

namespace App\Entity;

use App\Repository\ArbitreRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArbitreRepository::class)
 */
class Arbitre
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
    private $pais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cognoms;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contrasenya;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $usuari;

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

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(string $pais): self
    {
        $this->pais = $pais;

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

    public function getContrasenya(): ?string
    {
        return $this->contrasenya;
    }

    public function setContrasenya(string $contrasenya): self
    {
        $this->contrasenya = $contrasenya;

        return $this;
    }

    public function __toString()
    {
        return $this->nom." ".$this->cognoms;
    }

    public function getUsuari(): ?string
    {
        return $this->usuari;
    }

    public function setUsuari(string $usuari): self
    {
        $this->usuari = $usuari;

        return $this;
    }
}
