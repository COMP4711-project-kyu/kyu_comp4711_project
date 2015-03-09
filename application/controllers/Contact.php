<?php
/**
 * Contact page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Application {

	public function index()
	{
                $this->data['pagebody'] = 'contact';
                $this->render('Contact');
	}
}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */