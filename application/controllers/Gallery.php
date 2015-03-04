
<?php
/**
 * Gallery page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application {


	public function index()
	{
            
            $highest = $this->images->highest();
            // get latest 9 pictures
            $pix = $this->images->getGroup($highest,9);
            for ($num = 1, $index = 0; $num <= 3; $num++){
                $row ="";
                // set 3 image in a cell for row
                for($count = 0; $count < 3; $count++ ){
                    $row .= $this->parser->parse ('_cell',(array) $pix[$index], true);
                    $index++;
                }
                $name = 'img_row'.$num;
                // set img_row$num 
               $this->data[$name] = $row;
            }
            $this->data['pagebody'] = 'gallery';
            $this->render('Gallery');
	}
        
        
}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */