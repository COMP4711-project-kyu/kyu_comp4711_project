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
    
    // retrieve $num images from specified index
    public function getGroup($index, $num) {
        $this->db->where('id <=', $index);
        $this->db->where('id >', $index-$num);
        $this->db->order_by("id", "desc"); 

        $images = $this->db->get('images');
        return $images->result();
    }


}
