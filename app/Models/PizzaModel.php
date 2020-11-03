<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class PizzaModel extends Model
{
    protected $table = 'pizza';

    protected $allowedFields = ['name', 'small', 'medium', 'large', 'picture'];

}