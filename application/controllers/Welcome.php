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
            

            // get recent pictures            
            $pix = $this->images->recent();
            $num = 1;
            for ($index = 0; $index < 3;  $num++){
                $row ="";
                // set in a cell
                for($i = 0; $i<2 ;$i++, $index++){
                    $row .= $this->parser->parse ('_cell_2',(array) $pix[$index], true);
                }
                $name = 'img_row'.$num;
               $this->data[$name] = $row;
            }
            
            //set updates
            $updates = $this->updates->recent();
            $output ="";
            foreach($updates as $update){
                    $output .= $this->parser->parse ('_update',(array) $update, true);
                }
            $this->data['updates']=$output;
            
            $this->data['pagebody'] = 'welcome';
            $this->render('Home');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */