<?php

class Book
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

interface BookDAO
{
    public function create(Book $b);
    public function getAll();
    public function getById($id);
    public function delete($id);
 
}
