<?php

namespace App\Entity;

use App\Repository\CompetenceRepository;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use App\Entity\Formation;
use App\Entity\Experience;
use Symfony\Component\Serializer\Annotation\Ignore;

use Symfony\Component\Validator\Constraints as Assert;
#[Vich\Uploadable]
#[ORM\Entity(repositoryClass: CompetenceRepository::class)]
class Competence
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Niveau = null;

    #[ORM\ManyToOne(inversedBy: 'competences')]
    private ?User $User = null;

    #[ORM\ManyToOne(inversedBy: 'Competence')]
    private ?Experience $experience = null;

    #[ORM\ManyToOne(inversedBy: 'Competence')]
    private ?Formation $formation = null;

 
    #[Assert\File(
        maxSize: '2M',
        mimeTypes: ['image/jpeg', 'image/png', 'image/webp']
    )]
    #[Vich\UploadableField(mapping: "avatars", fileNameProperty: "competencePicture")]
    #[Ignore]
    private ?File $imageFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $competencePicture = null;

    public function __construct()
    {
       
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->Niveau;
    }

    public function setNiveau(?string $Niveau): self
    {
        $this->Niveau = $Niveau;

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

    public function getExperience(): ?Experience
    {
        return $this->experience;
    }

    public function setExperience(?Experience $experience): self
    {
        $this->experience = $experience;

        return $this;
    }

    public function getFormation(): ?Formation
    {
        return $this->formation;
    }

    public function setFormation(?Formation $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getcompetencePicture(): ?string
    {
        return $this->competencePicture;
    }

    public function setcompetencePicture(?string $userPicture): self
    {
        $this->competencePicture = $userPicture;

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
