<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class SidesModel extends Model
{
    protected $table = 'sides';

    protected $allowedFields = ['name', 'price', 'picture'];

}