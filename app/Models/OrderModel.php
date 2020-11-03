<?php namespace App\Models;
use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;
 
class OrderModel extends Model
{
    protected $table = 'order';

    protected $allowedFields = ['address', 'number', 'total', 'name', 'status'];

}