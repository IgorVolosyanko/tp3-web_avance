<?php
namespace App\Models;
use App\Models\CRUD;

class Journal extends CRUD{
    protected $table = 'log';
    protected $primaryKey = 'id';
    protected $fillable = ['nom', 'ip', 'url', 'date'];

}