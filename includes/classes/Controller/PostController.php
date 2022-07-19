<?php

namespace Controller;

use Input;
use Session;
use Token;
use Validation;

class PostController extends Controller
{

    public function create(array $fields = [])
    {

        if (Input::exist()) {
            if (Token::check(Input::get('token'))) {
                $x = new Validation();
                $x->check($_POST, [
                        'title' => ['req' => true, 'min' => 3, 'max' => 255, 'uniq' => 'posts'],
                        'body' => ['req' => true, 'min' => 15],
//                       'photo' => ['req' => true, 'min' => 1, 'photo' => true],
                       'category' => ['req' => true],
                    ]
                );
                if ($x->passed()) {


//                    if(!$category->count()){
//                        $x->addError('category', 'Kategoria e zgjedhur nuk ekziston');
//                    }

                    $this->db->insert('posts ', $fields);

                    $post_id = ($this->db->lastId('posts'));

                    //check if category exist on categories table

                    $category_id = Input::getArray('category');
                    $category = $this->db->sql("SELECT id FROM categories WHERE id IN ($category_id)");

                    $count = true;
                    if (!$category->count()) {
                        Session::flash('error', 'Kategoria nuk ekziston');
                        $count = false;
                    }

                    if($count){
                        foreach ($category->results() as $cat) {
                            $this->db->insert('post_categories', [
                                'post_id' => $post_id,
                                'categories_id' => $cat->id
                            ]);
                        }
                    }

                    Input::reset();
                    Session::flash('success', 'Postimi u shtua me sukses');

                } else {
                    $x->getError();
                }
            }

        }

    }


    public function getAll()
    {
        return $this->db->sql('SELECT * FROM posts ORDER BY id DESC');
    }
}