<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=BucketList::class, mappedBy="categorie", orphanRemoval=true)
     */
    private $BucketList;

    public function __construct()
    {
        $this->BucketList = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, BucketList>
     */
    public function getBucketList(): Collection
    {
        return $this->BucketList;
    }

    public function addBucketList(BucketList $bucketList): self
    {
        if (!$this->BucketList->contains($bucketList)) {
            $this->BucketList[] = $bucketList;
            $bucketList->setCategorie($this);
        }

        return $this;
    }

    public function removeBucketList(BucketList $bucketList): self
    {
        if ($this->BucketList->removeElement($bucketList)) {
            // set the owning side to null (unless already changed)
            if ($bucketList->getCategorie() === $this) {
                $bucketList->setCategorie(null);
            }
        }

        return $this;
    }
}
