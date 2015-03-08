<?php

/**
 * This is a "CMS" model for Images, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author Mao
 */
class Images extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('images');
    }
    
    // retrieve recently added $num images 
    public function getRecentImg($num) {
        $this->db->order_by("id", "desc"); // get all pictures descendant order
        $images = $this->db->get('images',$num,0);
        return $images->result();// get array of images
    }

    // retrieve $num images from specified index with album name $album
    public function getGroupByAlbum($page, $num, $album) {
        if(strcmp($album, "All") != 0 ){//if the album is selected
             $this->db->where("'album' = ", $album);
        }
        $this->db->order_by("id", "desc");        
        // skip pages of images and get number of images
        $images = $this->db->get('images', $num,($page-1) * $num);
        return $images->result();
    }
    
    public function getAlbumSize($album)
    {
         $this->db->where("'album' = ", $album);
         return $this->db->count_all_results('images');
    }

}
