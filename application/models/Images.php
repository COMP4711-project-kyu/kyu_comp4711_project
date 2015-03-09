<?php

/**
 * This is a "CMS" model for Images, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author Mao
 */
class Images extends CI_Model {

    var $data = array(
        array('id' => '1', 'name' => 'e1.jpg', 'thumb_path' => 'images/es1.jpg', 'path'=>'images/e1.jpg'),
        array('id' => '2', 'name' => 'e2.jpg', 'thumb_path' => 'images/es2.jpg', 'path'=>'images/e2.jpg'),
        array('id' => '3', 'name' => 'e3.jpg', 'thumb_path' => 'images/es3.jpg', 'path'=>'images/e3.jpg'),
        array('id' => '4', 'name' => 'e4.jpg', 'thumb_path' => 'images/es4.jpg', 'path'=>'images/e4.jpg'),
        array('id' => '5', 'name' => 'e5.jpg', 'thumb_path' => 'images/es5.jpg', 'path'=>'images/e5.jpg'),
        array('id' => '6', 'name' => 'e6.jpg', 'thumb_path' => 'images/es6.jpg', 'path'=>'images/e6.jpg'),
        array('id' => '7', 'name' => 'e7.jpg', 'thumb_path' => 'images/es7.jpg', 'path'=>'images/e7.jpg'),
        array('id' => '8', 'name' => 'e8.jpg', 'thumb_path' => 'images/es8.jpg', 'path'=>'images/e8.jpg'),
        array('id' => '9', 'name' => 'e9.jpg', 'thumb_path' => 'images/es9.jpg', 'path'=>'images/e9.jpg'),

    );

    // retrieve 3 images from specified index
    public function getThree($index) {
        
        return array_slice($this->data,$index ,3);
    }

    // retrieve the first 4 images
    public function recent() {
        return array_slice($this->data, 0,4);
    }

}
