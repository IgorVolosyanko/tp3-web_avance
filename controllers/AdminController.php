<?php
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Models\Book;
use App\Models\Category;
use App\Models\Author;
use App\Models\Editor;
use App\Models\User;
use App\Providers\Auth;

class AdminController {
    public function manage(){          
        $book = new Book;
        $select = $book->select();          
        return View::render('admin/manage', ['books' => $select]);
   }

   public function store($data = []){
        $values = $data;
        $book = new Book;
        $category = new Category;
        $editor = new Editor;
        $author = new Author;
        
        $authorArray['nom'] = $values['auteur'];
        $authorId = $author->insert($authorArray);
        $values['auteur_id'] = $authorId;
        unset($values['auteur']);
        $editorArray['nom'] = $values['editeur'];
        $editorId = $editor->insert($editorArray);
        $values['editeur_id'] = $editorId;
        unset($values['editeur']);
        $categArray['nom'] = $values['categorie'];
        $categoryId = $category->insert($categArray);
        $values['categorie_id'] = $categoryId;
        unset($values['categorie']);
        $book->insert($values);    
        return View::redirect('admin/manage');
   }

   public function modify($data = []){
        print_r($data); 
        print_r($_GET['id']);      
        $book = new Book;
        $book->update($data['description'], 'description', $_GET['id']);
        return View::redirect('admin/manage');
   }


   public function edit(){    
    $book = new Book;
    $select = $book->selectId($_GET['id']); 
    print_r($select);
    return View::render('admin/edit', ['book' => $select]);
   }

   public function delete($data = []){    
        $book = new Book;
        $select = $book->deleteId($data['id'], 'id');
        return View::redirect('admin/manage');
   }

   public function add($data = []){
        return View::render('admin/add');
   }
}
?>