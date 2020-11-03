<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PizzaModel;
use App\Models\ToppingModel;
use App\Models\SidesModel;
use App\Models\SpecialModel;

class Cart extends Controller
{

    public function view_cart(){
        session()->start();

		$pizzaModel = new PizzaModel();
		$data['pizza'] = $pizzaModel->orderBy('id', 'ASC')->findAll();	

		$toppingModel = new ToppingModel();
		$data['topping'] = $toppingModel->orderBy('id', 'ASC')->findAll();

		$sidesModel = new SidesModel();
		$data['sides'] = $sidesModel->orderBy('id', 'ASC')->findAll();
		
		$specialModel = new SpecialModel();
		$data['special'] = $specialModel->orderBy('id', 'ASC')->findAll();

		echo view('templates/header', $data);
		echo view('cart');
		return view('templates/footer');
	}

	public function remove($cart_item_id){
		session()->start();

			$_SESSION['total'] = $_SESSION['total'] - $_SESSION['cart'][$cart_item_id]['price'];
			$_SESSION['count']--;	
			unset($_SESSION['cart'][$cart_item_id]);
        	return redirect()->to(base_url('Cart/view_cart'));
	}
}
