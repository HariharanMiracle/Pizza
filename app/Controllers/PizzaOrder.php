<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ToppingModel;
use App\Models\PizzaModel;

class PizzaOrder extends Controller
{
	public function addToppings($pizza_id)
	{
		session()->start();
        $toppingModel = new ToppingModel();
		$pizzaModel = new PizzaModel();
        
        $data['topping'] = $toppingModel->orderBy('id', 'ASC')->findAll();
        $data['pizzaObj'] = $pizzaModel->where('id', $pizza_id)->first();

        echo view('templates/header', $data);
        echo view('pizza-topping');
        return view('templates/footer');
    }

    public function addToCart(){
        session()->start();
        $_SESSION['order'] = 1;

        $str = $this->request->getVar('topping');
        $pieces = explode("/", $str);
        
        $specialid = 0;
        $sidesid = 0;
        $pizzaid = $this->request->getVar('pizzaId');
        $toppingid = $pieces[0];
        $size = $this->request->getVar('size');
        $price = $this->request->getVar('total');

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
