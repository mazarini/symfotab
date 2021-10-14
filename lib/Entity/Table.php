<?php

namespace Mazarini\SymfoTabBundle\Entity;

use Mazarini\SymfoTabBundle\Repository\ItemRepository;
use Symfony\Component\Validator\Constraints as Assert;
use \ArrayIterator;

class Table extends ArrayIterator
{
    private Item $table;

    private ArrayIterator $fields;

    public function setTable(Item $table): self {
        $this->table = $table;
        return $this;
    }

    public function getTableName(): string {
        return $this->table->getName();
    }

    public function getTableLabel(): string {
        return $this->table->getLabel();
    }

    public function setFields(array $fields): self {
        $this->fields = new ArrayIterator($fields);
        return $this;
    }

    public function getFieldsName() {
        foreach ($this->fields as $field) {
            yield $field->getName();
        }
   }

   public function getFieldsLabel() {
        foreach ($this->fields as $field) {
            yield $field->getLabel();
        }
    }
}
