<?php

namespace App\Entity;

use App\Repository\WishesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=WishesRepository::class)
 */
class Wishes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank(message="Le souhait doit avoir un titre!!");
     * @Assert\Length(
     *     min=5,
     *     max=50,
     *     minMessage="Ton titre est trop court!",
     *     maxMessage="Oula! Ton titre est bien trop long!"
     * )
     * @ORM\Column(type="string", length=250)
     */
    private $titre;

    /**
     * @Assert\NotBlank(message="Décris-moi plus en détail!!");
     * @Assert\Length(
     *     min=5,
     *     max=250,
     *     minMessage="Tu veux pas nous en dire plus? On est curieux, ton message est trop court!",
     *     maxMessage="Oula! T'es bavard toi! Ton message est bien trop long!"
     * )
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @Assert\NotBlank(message="Anonymous? Nope, pas ici!")
     * @Assert\Length(
     *     min=5,
     *     max=50,
     *     minMessage="Ton nom est trop court!",
     *     maxMessage="Oula! Ton nom est bien trop long!"
     * )
     * @ORM\Column(type="string", length=50)
     */
    private $auteur;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estVisible;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCrea;

    /**
     * @ORM\ManyToOne(targetEntity=categories::class, inversedBy="wishes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getEstVisible(): ?bool
    {
        return $this->estVisible;
    }

    public function setEstVisible(bool $estVisible): self
    {
        $this->estVisible = $estVisible;

        return $this;
    }

    public function getDateCrea(): ?\DateTimeInterface
    {
        return $this->dateCrea;
    }

    public function setDateCrea(\DateTimeInterface $dateCrea): self
    {
        $this->dateCrea = $dateCrea;

        return $this;
    }

    public function getCategories(): ?categories
    {
        return $this->categories;
    }

    public function setCategories(?categories $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

}
