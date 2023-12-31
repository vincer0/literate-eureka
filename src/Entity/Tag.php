<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Tag
{
    #[ORM\Id, ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    protected $id = null;

    #[ORM\Column(type: Types::STRING)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: BlogPost::class, mappedBy: 'tag')]
    private Collection $blogPosts;

    #[ORM\ManyToMany(targetEntity: SubTag::class, mappedBy: 'tag')]
    private Collection $subTags;

    public function __construct()
    {
        $this->blogPosts = new ArrayCollection();
        $this->subTags = new ArrayCollection();
    }

    public function getBlogPosts(): Collection
    {
        return $this->blogPosts;
    }

    public function getSubTags(): Collection
    {
        return $this->subTags;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
