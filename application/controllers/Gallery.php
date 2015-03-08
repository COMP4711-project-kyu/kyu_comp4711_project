
<?php
/**
 * Gallery page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application {


	public function index()
	{
            $this->data['page'] = 1;
            $this->data['num_page'] = floor($this->images->size() / 9) + 1;
            $this->data['left_arrow'] = ""; // do not set button to go previous images page
            // show button to go next images page
            $this->data['right_arrow'] = "<a href='/gallery/All/2'><img src='/assets/images/arrowright.png' ></a>";
            // get latest 9 pictures
            $pix = $this->images->getRecentImg(9);
            $this->setImages($pix);
            $this->data['pagebody'] = 'gallery';
            $this->render('Gallery');
	}
        
        public function album($album, $page = 1)
	{
            $this->data['page'] = $page;
            if(strcmp($album, "All")== 0 ){
                $this->data['num_page'] = floor($this->images->size() / 9) + 1;
            }else{
                $this->data['num_page'] = floor($this->images->getAlbumSize($album) / 9) + 1;
            }
            if($page  != 1){
                $this->data['left_arrow'] = "<a href='/gallery/".$album."/".($page-1)."'><img src='/assets/images/arrowleft.png' ></a>"; // do not set button to go previous images page
            }else{
               $this->data['left_arrow'] = ""; // do not set button to go previous images page
            }
            if($this->data['num_page'] != $page){
                // show button to go next images page
                $this->data['right_arrow'] = "<a href='/gallery/".$album."/".($page+1)."'><img src='/assets/images/arrowright.png' ></a>";
            }else{
               $this->data['right_arrow'] = "";
            }
            $pix = $this->images->getGroupByAlbum($page, 9 ,$album);
            $this->setImages($pix);
            $this->data['pagebody'] = 'gallery';
            $this->render('Gallery');
	}
        
        function setImages($pix){
            $size = count($pix);
            for ($num = 1, $index = 0; $num <= 3; $num++){
                $row ="";
                // set 3 image in a cell for row
                for($count = 0; $count < 3; $count++ ){
                    if($index<$size){
                        $row .= $this->parser->parse ('_cell',(array) $pix[$index], true);
                    }
                    $index++;
                }
                $name = 'img_row'.$num;
                
                // set img_row$num 
                 $this->data[$name] = $row;
            }
        }
        
        
}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */