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
            // get dragons about descrioption
            $this->data['about'] = $this->profile->get(0)->description;
            
            // get information for 2 people on team page
            //manager
            $person1 = $this->profile->get(1);
            $this->data['pImg1'] = $person1->image_path;
            $this->data['pTitle1'] = $person1->title;
            $this->data['pName1'] = $person1->name;
            $this->data['pDescription1'] = $person1->description;
            //captain
            $person2 = $this->profile->get(2);
            $this->data['pImg2'] = $person2->image_path;
            $this->data['pTitle2'] = $person2->title;
            $this->data['pName2'] = $person2->name;
            $this->data['pDescription2'] = $person2->description;
            
            // set history
            $histories = $this->history->all();
            $table = "";
            foreach($histories as $history){
                $table .= $this->parser->parse ('components/_history',(array) $history, true);
            }
            $this->data['history'] = $table;            
            $this->data['pagebody'] = 'team';
            $this->render('Team');
	}
}

/* End of file Team.php */
/* Location: ./application/controllers/Team.php */