<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Ordermodel;
use App\Models\ItemModel;
use App\Models\PizzatoppingModel;

class Order extends Controller
{
	public function cancelOrder()
	{
		session()->destroy();
		session()->start();
		$_SESSION['order'] = 0;
		return redirect()->to(base_url('Home'));
	}

	public function checkout(){
		session()->start();

		echo view('templates/header');
		echo view('checkout');
		return view('templates/footer');
	}

	public function  confirmOrder(){
		echo 'confirm order';
		session()->start();
		$ordermodel = new Ordermodel();
		$itemmodel = new ItemModel();
		$pizzatoppingModel = new PizzatoppingModel();
		
		$data = [
			'address' => $this->request->getVar('address'),
			'number' => $this->request->getVar('phoneNumber'),
			'total' => $_SESSION['total'],
			'name' => $this->request->getVar('name'),
		];

		$orderId = $ordermodel->insert($data);

		foreach($_SESSION['cart'] as $cartObj){
			if($cartObj['specialid'] != 0){
				$data1 = [
					'orderid' => $orderId,
					'specialid' => $cartObj['specialid'],
					'sidesid' => 1,
					'pizzatoppingid' => 1,
				];

				$save = $itemmodel->insert($data1);
			}
			else if($cartObj['sidesid'] != 0){
				$data1 = [
					'orderid' => $orderId,
					'specialid' => 1,
					'sidesid' => $cartObj['specialid'],
					'pizzatoppingid' => 1,
				];

				$save = $itemmodel->insert($data1);
			}
			else{
				$data2 = [
					'pizzaid' => $cartObj['pizzaid'],
					'toppingid' => $cartObj['toppingid'],
					'size' => $cartObj['size'],
					'price' => $cartObj['price'],
				];

				$pizzatoppingid = $pizzatoppingModel->insert($data2);

				$data1 = [
					'orderid' => $orderId,
					'specialid' => 1,
					'sidesid' => 1,
					'pizzatoppingid' => $pizzatoppingid,
				];

				$save = $itemmodel->insert($data1);
			}
		}

		$data['orderId'] = $orderId;

		session()->destroy();

		echo view('templates/header', $data);
		echo view('confirm_order');
		return view('templates/footer');
	}

	public function trackOrder(){
		session()->start();

		echo view('templates/header');
		echo view('view_track_order');
		return view('templates/footer');
	}

	public function track(){
		session()->start();

		$ordermodel = new OrderModel();
		$data['order'] = $ordermodel->where('id', $this->request->getVar('number'))->first();	
		
		echo view('templates/header', $data);
		echo view('view_order');
		return view('templates/footer');
	}
}
