<?php

namespace src\dao;

class DAO
{
    private int $id;
    private string $name;
    private int $edition;

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setName($name)
    {
        $this->name = ucwords(trim($name));
    }
    
    public function getName()
    {
        return $this->name;
    }

    public function setEdition($edition)
    {
        $this->edition = $edition;
    }
    
    public function getEdition()
    {
        return $this->edition;
    }
}
