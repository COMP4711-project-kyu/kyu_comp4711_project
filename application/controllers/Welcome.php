<?php
/**
 * Home page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
            $this->setRecentPictures();
            // set announcement
            $this->data['announce'] = $this->keyvalue->get("ANNOUNCEMENT")->value;
            //set updates
            $this->setUpdates();
            
            $this->data['pagebody'] = 'welcome';
            $this->render('Home');
	}
        
        function setRecentPictures(){
            // get recent pictures
            $pix = $this->images->getRecentImg(4);
            for ($num = 1, $index = 0; $num <= 2; $num++){
                $row ="";
                // set 3 image in a cell for row
                for($count = 0; $count < 2; $count++ ){
                    $row .= $this->parser->parse ('components/_imagecell_2',(array) $pix[$index], true);
                    $index++;
                }
                $name = 'img_row'.$num;
                // set img_row$num 
               $this->data[$name] = $row;
            }
            
        }
        function setUpdates(){
            $updates = $this->updates->recent();
            $output ="";
            foreach($updates as $update){
                    $output .= $this->parser->parse ('components/_update',(array) $update, true);
                }
            $this->data['updates']=$output;
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */