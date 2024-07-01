<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Schema;

class Home extends BaseController {

	// [ Views ] ==================================================================================================== //

		public function index() {

			echo view('landing_page/_builder/header');
			echo view('landing_page/_builder/navbar');
			echo view('landing_page/home/index');
			echo view('landing_page/_builder/footer');

			
		}

		public function pendaftaran() {

			echo view('landing_page/_builder/header');
			echo view('landing_page/_builder/navbar');
			echo view('landing_page/pendaftaran/index');
			echo view('landing_page/_builder/footer');

		}

	// [ Views - Adminpanel ] ==================================================================================================== //

		public function adm_dashboard()
		{
			echo view('landing_page/_adminpage/_builder/header');
			echo view('landing_page/_adminpage/_builder/menu');
			echo view('landing_page/_adminpage/dashboard/index');
			echo view('landing_page/_adminpage/_builder/footer');
		}
}