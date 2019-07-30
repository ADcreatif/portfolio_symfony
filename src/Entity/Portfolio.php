<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PortfolioRepository")
 */
class Portfolio {
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=56)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $client;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $technos;

    /**
     * @ORM\Column(type="string", length=512, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $publishedDate;

    public function getId(): ?int {
        return $this->id;
    }

    public function getTitle(): ?string {
        return $this->title;
    }

    public function setTitle(string $title): self {
        $this->title = $title;

        return $this;
    }

    public function getClient(): ?string {
        return $this->client;
    }

    public function setClient(?string $client): self {
        $this->client = $client;

        return $this;
    }

    public function getUrl(): ?string {
        return $this->url;
    }

    public function setUrl(?string $url): self {
        $this->url = $url;

        return $this;
    }

    public function getImage(): ?string {
        return $this->image;
    }

    public function setImage(string $image): self {
        $this->image = $image;

        return $this;
    }

    public function getTechnos(): ?string {
        return $this->technos;
    }

    public function setTechnos(?string $technos): self {
        $this->technos = $technos;

        return $this;
    }

    public function getDescription(): ?string {
        return $this->description;
    }

    public function setDescription(?string $description): self {
        $this->description = $description;

        return $this;
    }

    public function getPublishedDate(): ?\DateTimeInterface {
        return $this->publishedDate;
    }

    public function setPublishedDate(?\DateTimeInterface $publishedDate): self {
        $this->publishedDate = $publishedDate;

        return $this;
    }
}
