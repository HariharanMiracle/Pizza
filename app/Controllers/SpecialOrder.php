<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\SpecialModel;

class SpecialOrder extends Controller
{
	public function index($special_id)
	{
		session()->start();

        echo 'index';
	}

    public function addToCart($special_id){
        session()->start();
        $_SESSION['order'] = 1;
		$specialModel = new SpecialModel();

        $special = $specialModel->where('id', $special_id)->first();

        $specialid = $special_id;
        $sidesid = 0;
        $pizzaid = 0;
        $toppingid = 0;
        $size = 0;
        $price = $special['price'];

        if(isset($_SESSION['cart'])){
            $count = count($_SESSION['cart']);
            $item_array = array(
                'id' => $count,
                'specialid' => $specialid,
                'sidesid' => $sidesid,
                'pizzaid' => $pizzaid,
                'toppingid' => $toppingid,
                'size' => $size,
                'price' => $price
            );
            $_SESSION['cart'][$count] = $item_array;

            $total = 0;
            $_SESSION['count'] = $count + 1;
            foreach ($_SESSION['cart'] as $obj) {
                $total += $obj['price'];
            }
            $_SESSION['total'] = $total;			
        }
        else{
            $item_array = array(
                'id' => 0,
                'specialid' => $specialid,
                'sidesid' => $sidesid,
                'pizzaid' => $pizzaid,
                'toppingid' => $toppingid,
                'size' => $size,
                'price' => $price
            );
            $_SESSION['cart'][0] = $item_array;

            $_SESSION['count'] = 1;			
            $_SESSION['total'] = $price;	

            $count = count($_SESSION['cart']);
        }

		return redirect()->to(base_url('Home'));
    }
}
