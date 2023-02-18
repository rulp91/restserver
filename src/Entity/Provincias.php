<?php

namespace App\Entity;

use App\Repository\ProvinciasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProvinciasRepository::class)]
class Provincias
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $cod_provincias = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\Column(length: 1024)]
    private ?string $imagen_path = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descripcion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodProvincias(): ?int
    {
        return $this->cod_provincias;
    }

    public function setCodProvincias(int $cod_provincias): self
    {
        $this->cod_provincias = $cod_provincias;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getImagenPath(): ?string
    {
        return $this->imagen_path;
    }

    public function setImagenPath(string $imagen_path): self
    {
        $this->imagen_path = $imagen_path;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
