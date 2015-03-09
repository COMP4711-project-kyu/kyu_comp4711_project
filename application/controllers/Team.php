<?php
/**
 * Team page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
                $this->data['pagebody'] = 'team';
                $this->render('Team');
	}
}

/* End of file Team.php */
/* Location: ./application/controllers/Team.php */