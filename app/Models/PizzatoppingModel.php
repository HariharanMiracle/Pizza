<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class PizzatoppingModel extends Model
{
    protected $table = 'pizzatopping';

    protected $allowedFields = ['pizzaid', 'toppingid', 'size', 'price'];

}