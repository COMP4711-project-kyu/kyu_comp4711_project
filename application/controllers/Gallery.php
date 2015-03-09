
<?php
/**
 * Gallery page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application {


	public function index()
	{
            $num = 1;
            for ($index = 0; $index < 7; $index+=3, $num++){
                // get images by row
                $pix = $this->images->getThree($index);
                $row ="";
                // set image in a cell
                foreach($pix as $picture){
                    $row .= $this->parser->parse ('_cell',(array) $picture, true);
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