<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Ignore;


#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomEtablissement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Diplome = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateDebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $DateFin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Description = null;

    #[ORM\ManyToOne(inversedBy: 'formations')]
    private ?User $User = null;

    #[ORM\OneToMany(mappedBy: 'formation', targetEntity: Competence::class)]
    private Collection $Competence;

    #[Assert\File(
        maxSize: '2M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp']
    )]
    #[Vich\UploadableField(mapping: "avatars", fileNameProperty: "formationPicture")]
    #[Ignore]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $formationPicture = null;


    public function __construct()
    {
        $this->Competence = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEtablissement(): ?string
    {
        return $this->NomEtablissement;
    }

    public function setNomEtablissement(string $NomEtablissement): self
    {
        $this->NomEtablissement = $NomEtablissement;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->Diplome;
    }

    public function setDiplome(?string $Diplome): self
    {
        $this->Diplome = $Diplome;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(?\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection<int, Competence>
     */
    public function getCompetence(): Collection
    {
        return $this->Competence;
    }

    public function addCompetence(Competence $competence): self
    {
        if (!$this->Competence->contains($competence)) {
            $this->Competence->add($competence);
            $competence->setFormation($this);
        }

        return $this;
    }

    public function removeCompetence(Competence $competence): self
    {
        if ($this->Competence->removeElement($competence)) {
            // set the owning side to null (unless already changed)
            if ($competence->getFormation() === $this) {
                $competence->setFormation(null);
            }
        }

        return $this;
    }

    public function getformationPicture(): ?string
    {
        return $this->formationPicture;
    }

    public function setformationPicture(?string $formationPicture): self
    {
        $this->formationPicture = $formationPicture;

        return $this;
    }

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
        if ($image) {
            
        }
        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

}
