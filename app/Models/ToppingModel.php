<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class ToppingModel extends Model
{
    protected $table = 'topping';

    protected $allowedFields = ['name','price', 'picture'];

}