<?php

namespace src\controllers;

use \core\Controller;
use \src\models\Book;
use \src\dao\DAO;


class HomeController extends Controller
{

    public function index()
    {
        $b = new Book();
        $this->render('home', ['list' => $b->getAll()]);
    }

    public function add()
    {
        $this->render('add');
    }

    public function addAction()
    {
        $b = new Book();
        $d = new DAO();
        $name = filter_input(INPUT_POST, 'name');
        $edition = filter_input(INPUT_POST, 'edition', FILTER_VALIDATE_INT);

        if ($name && $edition) {
            $d->setName($name);
            $d->setEdition($edition);
            $b->create($d);
            $this->redirect('/');
        }
        $this->redirect('/add');
    }

    public function del($id)
    {
        $b = new Book();
        $b->del($id);
        $this->redirect('/');
    }
}
