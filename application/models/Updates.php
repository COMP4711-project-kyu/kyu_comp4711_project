<?php

/**
 * This is a "CMS" model for Updates, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author Mao
 */
class Updates extends CI_Model {

    var $data = array(
        array('id' => '1', 'title' => 'COACH COMMENT', 'link' => '/team', 'comment'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm......'),
        array('id' => '2', 'title' => 'SCHEDULE', 'link' => '/team', 'comment'=>'Saturday September 15 Dragons vs Bros Time:8:30 Location:Holy Park'),
        array('id' => '3', 'title' => 'CAPTAIN COMMENT', 'link' => '/team', 'comment'=>'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonumm......'),

    );

    // retrieve recent 3 updates
    public function recent() {
        return array_slice($this->data,0,3);
    }


}
