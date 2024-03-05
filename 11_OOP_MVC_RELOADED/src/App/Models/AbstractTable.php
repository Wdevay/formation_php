<?php

namespace App\Models;

abstract class AbstractTable
{
    protected ?int $id = null;
    protected ?string $className = null;

    public function __construct(?int $id = null)
    {
        $this->id = $id;
        $this->setClassName($this);
    }

    public function setClassName(?object  $obj): void
    {
        $this->className = get_class($obj);
    }

    public function getClassName(): ?string
    {
        return $this->className;
    }

    public function getAttributes(): ?array
    { // Return un tableau des propriétés d'une classe
        $attributes = [];
        $filter = ['id','className'];
        $class = get_class_vars($this->getClassName());
        foreach($class as $k => $v){
            if (!in_array($k,$filter)) $attributes[] =$k; 
        }

        return $attributes;
    }

}