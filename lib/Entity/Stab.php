<?php

namespace Mazarini\SymfoTabBundle\Entity;

use Mazarini\SymfoTabBundle\Repository\StabRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StabRepository::class)
 */
class Stab
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $tabName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tabKey;

    /**
     * @ORM\Column(type="json")
     */
    private $tabData = [];

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updateBy;

    public function getTabData(): string|array
    {
        return $this->tabData;
    }

    public function setTabData(string|array $tabData): self
    {
       $this->tabData = [];
//     $this->tabData = $tabData;

        return $this;
    }

    /**
     * ==================================================================================================================================================
     * Default functions
     * ==================================================================================================================================================
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTabName(): ?string
    {
        return $this->tabName;
    }

    public function setTabName(string $tabName): self
    {
        $this->tabName = $tabName;

        return $this;
    }

    public function getTabKey(): ?string
    {
        return $this->tabKey;
    }

    public function setTabKey(string $tabKey): self
    {
        $this->tabKey = $tabKey;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdateBy(): ?\DateTimeImmutable
    {
        return $this->updateBy;
    }

    public function setUpdateBy(?\DateTimeImmutable $updateBy): self
    {
        $this->updateBy = $updateBy;

        return $this;
    }
}
