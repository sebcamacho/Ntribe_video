<?php

namespace App\Entity;

use App\Entity\PackVideos;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\VideosRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;

/**
 * @ORM\Entity(repositoryClass=VideosRepository::class)
 * @Vich\Uploadable
 */
class Videos
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $path;

    /**
     * @Vich\UploadableField(mapping="upload_video", fileNameProperty="path")
     * @var File
     */
    private $videoFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=PackVideos::class, inversedBy="Videos")
     */
    private $pack_videos;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->nom;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPackVideos(): ?PackVideos
    {
        return $this->pack_videos;
    }

    public function setPackVideos(?PackVideos $pack_videos): self
    {
        $this->pack_videos = $pack_videos;

        return $this;
    }

    /**
     * Return File|null
     */ 
    public function getVideoFile(): ?File
    {
        return $this->videoFile;
    }

    /**
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $videoFile
     *
     * @return  self
     */ 
    public function setVideoFile(?File $videoFile = null)
    {
        $this->videoFile = $videoFile;

        if ($videoFile){
            $this->createdAt = new \DateTime('now');
        }
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {   
        $createdAt = new \DateTime('now');
        $this->createdAt = $createdAt;

        return $this;
    }
}
