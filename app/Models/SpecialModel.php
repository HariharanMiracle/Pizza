<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class SpecialModel extends Model
{
    protected $table = 'special';

    protected $allowedFields = ['name','description', 'price', 'picture'];

}