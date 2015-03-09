
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
            $this->setArrows("All", 1);
            $this->setAlbumLinks();//set links for dropdown list
            $this->data['album'] = "All Pictures";
            // get latest 9 pictures
            $pix = $this->images->getRecentImg(9);
            $this->setImages($pix);
            $this->data['pagebody'] = 'gallery';
            $this->render('Gallery');
	}
        
        // this function is called when URL is like gallery/(:any)/(:num) or gallery/(:any)/
        // shows images by albums(dates)
        public function album($album, $page = 1)
	{
            $this->data['page'] = $page;
            if(strcmp($album, "All")== 0 ){
                $this->data['num_page'] = floor($this->images->size() / 9) + 1;
                $this->data['album'] = "All Pictures";
            }else{
                $this->data['num_page'] = floor($this->images->getAlbumSize($album) / 9) + 1;
                $this->data['album'] = date_format(DateTime::createFromFormat("Ymd",$album), 'F d, Y');//set album name
            }
            $this->setArrows($album,$page);
            $this->setAlbumLinks();//set links for dropdown list
            $pix = $this->images->getGroupByAlbum($page, 9 ,$album);
            $this->setImages($pix);
            $this->data['pagebody'] = 'gallery';
            $this->render('Gallery');
	}
        
        //set images in a table
        function setImages($pix){
            $size = count($pix);
            for ($num = 1, $index = 0; $num <= 3; $num++){
                $row ="";
                // set 3 image in a cell for row
                for($count = 0; $count < 3; $count++ ){
                    if($index<$size){
                        $row .= $this->parser->parse ('components/_imagecell_3',(array) $pix[$index], true);
                    }
                    $index++;
                }
                $name = 'img_row'.$num;
                // set img_row$num 
                 $this->data[$name] = $row;
            }
        }
        
        // set links for dropdown list to select albums
        function setAlbumLinks(){
            $albums = $this->images->getAllAlbums();
            $album_links = "";
            foreach($albums as $album){
                $dateString = date_format(DateTime::createFromFormat("Ymd",$album->album), 'F d, Y');
                $album_links.= '<li><a href="/gallery/'.$album->album.'">'.$dateString.'</a></li>';
            }
            $this->data['album_link'] = $album_links;
        }
        
        // set arrows to go to a page which shows next images or previous images
        function setArrows($album,$page){
            if($page  != 1)
                // show button to go previous images page
                $this->data['left_arrow'] = "<a href='/gallery/".$album."/".($page-1)."'><img src='/assets/images/arrowleft.png' ></a>"; 
            else
               $this->data['left_arrow'] = "";
            
            if($this->data['num_page'] != $page)
                // show button to go next images page
                $this->data['right_arrow'] = "<a href='/gallery/".$album."/".($page+1)."'><img src='/assets/images/arrowright.png' ></a>";
            else
               $this->data['right_arrow'] = "";
        }
        
        
        
}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */