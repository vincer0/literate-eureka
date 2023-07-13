<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class SubTag
{
    #[ORM\Id, ORM\Column(type: "integer")]
    #[ORM\GeneratedValue]
    protected $id = null;

    #[ORM\Column(type: Types::STRING)]
    private ?string $name = null;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'tag')]
    private ?Collection $tags = null;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    public function getBlogPosts(): Collection
    {
        return $this->tags;
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
