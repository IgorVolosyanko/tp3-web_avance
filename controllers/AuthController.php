<?php
namespace App\Controllers;

use App\Providers\View;
use App\Providers\Validator;
use App\Models\User;


class AuthController {

    public function login(){      
         return View::render('auth/login');
    }

    public function store($data){
        $validator = new Validator;
        $validator->field('nom_utilisateur', $data['nom_utilisateur'])->required()->min(2)->max(20);
        $validator->field('password', $data['password'])->required()->min(6)->max(20);
      
         if($validator->isSuccess()){
            
            $user = new User;
            $checkuser = $user->checkUser($data['nom_utilisateur'], $data['password']);
            if($checkuser){
               if($_SESSION['privilege_id'] == 1){
                  return View::redirect('admin/manage');
               }
               
               return View::redirect('client/order?id='.$_SESSION['user_id']);
            }else{
                $errors['message'] = "Please check your credentials";
                return view::render('auth/login', ['errors'=>$errors, 'user' =>$data]); 
            }

         }else{
            $errors = $validator->getErrors();
            return view::render('auth/login', ['errors'=>$errors, 'user' =>$data]);
         }

    }
    public function delete(){
        session_destroy();
        return View::redirect('login');
    }
}
?>