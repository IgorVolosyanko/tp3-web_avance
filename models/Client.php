<?php
namespace App\Models;
use App\Models\CRUD;

class Client extends CRUD{
    protected $table = 'utilisateur';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'nom_utilisateur', 'password', 'adresse', 'telephone', 'courriel', 'privilege_id'];

}