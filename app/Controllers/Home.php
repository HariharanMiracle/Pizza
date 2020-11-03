<?php namespace App\Controllers;
use App\Models\PizzaModel;
use App\Models\SidesModel;
use App\Models\SpecialModel;

class Home extends BaseController
{
	public function index()
	{
		session()->start();
		$pizzaModel = new PizzaModel();
		$sidesModel = new SidesModel();
		$specialModel = new SpecialModel();

		$data['pizza'] = $pizzaModel->orderBy('name', 'ASC')->findAll();
		$data['sides'] = $sidesModel->orderBy('name', 'ASC')->findAll();
		$data['special'] = $specialModel->orderBy('name', 'ASC')->findAll();

		echo view('templates/header', $data);
		echo view('home');
		return view('templates/footer');
	}

}
