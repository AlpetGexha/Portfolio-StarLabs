<?php

namespace Controller;

use DB;
use File;
use Input;
use Session;
use Token;
use Validation;

class CategoryController
{

    public $db;

    public function __construct()
    {
        $this->db = DB::getDB();
    }


    public function create(array $fields = [])
    {


        if (Input::exist()) {
            if (Token::check(Input::get('token'))) {
                $x = new Validation();
                $x->check($_POST, ['title' => ['req' => true, 'min' => 3, 'max' => 255, 'uniq' => 'categories'],]);
                if ($x->passed()) {
                    $this->db->insert('categories ', $fields);

                    Session::flash('success', 'Kategoria u shtua me sukses');
                    Input::reset();
                } else {
                    $x->getError();
                }
            }

        }

    }


    public function delete($id)
    {
        $db = DB::getDB();

        if (isset($_POST['category_delete'])) {
            $db->sql("DELETE FROM categories WHERE id = '" . $id . "'");
            Session::flash('success', 'Kategoria u fshi me sukses');
        }
    }

    public function getAll()
    {
        return $this->db->sql('SELECT * FROM categories ORDER BY id DESC')->results();
    }

    public function getTitle()
    {
//   get all categories title
        $categories = $this->db->sql("SELECT title,id FROM categories");

        return $categories->results();
    }

}