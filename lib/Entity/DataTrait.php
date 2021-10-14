<?php

namespace Mazarini\SymfoTabBundle\Entity;

use Mazarini\SymfoTabBundle\Repository\ItemRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait DataTrait
{
    /**
     * @ORM\Column(type="json")
     */
    private $tableData = [];

    public function getTableData(): array
    {
        return $this->tableData;
    }

    public function setTableData(array $tableData): self
    {
        $this->tableData = $tableData;

        return $this;
    }

    public function __call(string $function, array $values): mixed {
        $type = substr($function,0,3);
        $property = strtolower(substr($function,3));
        switch (true) {
            case (!in_array($type,['get','set']) || !isset($this->tableData[$property])):
                dump($this->tableData);
                throw new \BadMethodCallException(sprintf('Uncaught Error:: Call to undefined method %s::%s()',self::class,$function),0);
            case (($type === 'set') && (count($values) === 1)):
                $this->tableData[$property] = $values[0];
                return $this;
            case (($type === 'get') && (count($values) === 0)):
                return $this->tableData[$property];
        }
        throw new \ArgumentCountError(sprintf('Wrong count of arguments for method %s::%s()',self::class,$function),0);
    }
 }
