<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class ItemModel extends Model
{
    protected $table = 'item';

    protected $allowedFields = ['orderid','specialid', 'sidesid', 'pizzatoppingid'];

}