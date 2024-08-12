<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $session = session(); // Lấy session -> Xác lập User -> Menu
		$data['sitetitle'] = "ERP Travel - vietnamsic.com";
		$data['pagetitle'] = "Dashboard";
		$data['pagetitle_mobile'] = "Dashboard";
		return view('erp_home', $data);

    }
	public function setlang()
    {
		$newlang = $this->request->getPost('lang');
		if(in_array($newlang , array( 'vi' , 'en'))){
			$session = session();
			$session->set(['lang' => $newlang]);
			return true;
		}else{
			return false;
		}
    }
}
