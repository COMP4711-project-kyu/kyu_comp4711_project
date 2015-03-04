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
    
    var $data = array(
        array('id' => '1', 'name' => 'e1.jpg', 'thumb_path' => 'May_30,_2014/thumb/es1.jpg', 'path'=>'May_30,_2014/e1.jpg'),
        array('id' => '2', 'name' => 'e2.jpg', 'thumb_path' => 'May_30,_2014/thumb/es2.jpg', 'path'=>'May_30,_2014/e2.jpg'),
        array('id' => '3', 'name' => 'e3.jpg', 'thumb_path' => 'May_30,_2014/thumb/es3.jpg', 'path'=>'May_30,_2014/e3.jpg'),
        array('id' => '4', 'name' => 'e4.jpg', 'thumb_path' => 'May_30,_2014/thumb/es4.jpg', 'path'=>'May_30,_2014/e4.jpg'),
        array('id' => '5', 'name' => 'e5.jpg', 'thumb_path' => 'May_30,_2014/thumb/es5.jpg', 'path'=>'May_30,_2014/e5.jpg'),
        array('id' => '6', 'name' => 'e6.jpg', 'thumb_path' => 'May_30,_2014/thumb/es6.jpg', 'path'=>'May_30,_2014/e6.jpg'),
        array('id' => '7', 'name' => 'e7.jpg', 'thumb_path' => 'May_30,_2014/thumb/es7.jpg', 'path'=>'May_30,_2014/e7.jpg'),
        array('id' => '8', 'name' => 'e8.jpg', 'thumb_path' => 'May_30,_2014/thumb/es8.jpg', 'path'=>'May_30,_2014/e8.jpg'),
        array('id' => '9', 'name' => 'e9.jpg', 'thumb_path' => 'May_30,_2014/thumb/es9.jpg', 'path'=>'May_30,_2014/e9.jpg'),

    );
    
    public function getRecent(){
        
    }

    // retrieve 3 images from specified index
    public function getGroup($index, $num) {
        $this->db->where('id <=', $index);
        $this->db->where('id >', $index-$num);
        $this->db->order_by("id", "desc"); 

        $images = $this->db->get('images');
        return $images->result();
    }

    // retrieve the first 4 images
    public function recent() {
        return array_slice($this->data, 0,4);
    }

}
