<?php
namespace App\Controllers;

use App\Providers\View;
use App\Models\User;
use App\Models\Privilege;
use App\Providers\Validator;
use App\Providers\Auth;

class UserController {

    public function __construct(){
        // Auth::session();
        // Auth::privilege(1);
    }
    public function create(){        
        $privilege = new Privilege;
        $privileges = $privilege->select('privilege');
      
        return View::render('user/create', ['privileges' => $privileges]);
    }

    public function store($data){
   
        $validator = new Validator;
        $validator->field('nom_utilisateur', $data['nom_utilisateur'])->min(2)->max(50)->unique('user');
        $validator->field('password', $data['password'])->min(6)->max(20);
        $validator->field('adresse', $data['adresse'])->min(3);
        $validator->field('telephone', $data['telephone'])->min(10)->max(13);        
        $validator->field('courriel', $data['courriel'])->required()->max(50)->email();
        $validator->field('privilege_id', $data['privilege_id'], 'privilege')->required()->int();

        if($validator->isSuccess()){
            $user = new User;           
            $data['password'] = $user->hashPassword($data['password']);
           $insert = $user->insert($data);
           if($insert){
                return view::redirect('login');
           }else{
                return view::render('error');
           }

        }else{
            $errors = $validator->getErrors();
            $privilege = new Privilege;
            $privileges = $privilege->select('privilege');
            return view::render('user/create', ['errors'=>$errors, 'privileges' => $privileges, 'user' =>$data]);
        }
    }
}

?>