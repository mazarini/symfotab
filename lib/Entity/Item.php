<?php

namespace Mazarini\SymfoTabBundle\Entity;

use Mazarini\SymfoTabBundle\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 */
class Item
{
    use EntityTrait;
    use StampTrait;

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
}
