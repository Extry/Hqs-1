<?php

namespace src\models;

use \core\Model;
use \src\dao\DAO;


class Book extends Model
{

    public function create(DAO $b)
    {
        Book::insert(['name' => $b->getName(), 'edition' => $b->getEdition()])->execute();
    }

    public function getAll()
    {
        $array = [];
        $data = Book::select()->execute();
        if (count($data) > 0) {
            foreach ($data as $item) {
                $b = new DAO();
                $b->setId($item['id']);
                $b->setName($item['name']);
                $b->setEdition($item['edition']);
                $array[] = $b;
            }
        }
        return $array;
    }

    public function getById($id)
    {
        $data = Book::select()->where('id', $id)->execute();
        if (count($data) > 0) {
            $b = new DAO();
            $b->setId($data['id']);
            return $b;
        } else {
            return false;
        }
    }

    public function del($id)
    {
        Book::delete()->where('id', $id)->execute();
    }
}
