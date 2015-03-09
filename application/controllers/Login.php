<?php
/**
 * Login page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
      
            $this->data['pagebody'] = 'login';
            $this->render('Login');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */