<?php

namespace Mazarini\SymfoTabBundle\Entity;

use Mazarini\SymfoTabBundle\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ItemRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */

class Item
{
    use EntityTrait;
    use StampTrait;
    use DataTrait;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $tableName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tableKey;

    /**
     * @ORM\Column(type="integer")
     */
    private $tableOrder;

    /**
     * ==================================================================================================================================================
     * Default functions
     * ==================================================================================================================================================
     */
    public function getTableName(): ?string
    {
        return $this->tableName;
    }

    public function setTableName(string $tableName): self
    {
        $this->tableName = $tableName;

        return $this;
    }

    public function getTableKey(): ?string
    {
        return $this->tableKey;
    }

    public function setTableKey(string $tableKey): self
    {
        $this->tableKey = $tableKey;

        return $this;
    }

    public function getTableOrder(): ?int
    {
        return $this->tableOrder;
    }

    public function setTableOrder(int $tableOrder): self
    {
        $this->tableOrder = $tableOrder;

        return $this;
    }
}
