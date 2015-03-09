<?php

/**
 * This is a "CMS" model for Updates, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author Mao
 */
class Updates extends MY_Model {
    // constructor
    function __construct() {
        parent::__construct('updates');
    }

    // retrieve recent 3 updates
    public function recent() {
        $this->db->order_by("id", "desc"); 
        $updates = $this->db->get('updates',3);
        return $updates->result();
    }
    
    public function addUpdate($title, $link, $comment){
        $update = $this->updates->create();
 
        $update->title = $title;
        $update->link = $link;
        // shorten comment if it's too long
        if(strlen($comment)>80){
            $comment = substr($comment, 0, 80)."......";
        }
        $update->comment = $comment;
        // set date and time
        date_default_timezone_set("America/Vancouver");
        $update->date = date("F j, Y, g:i a");
        
        $this->updates->add($update);
        
        // if there are more than 3 data, delete the oldest data;
        if($this->updates->size()>3){
            $this->db->limit(1);
            $firstRecord = $this->db->get($this->_tableName)->result();
            $this->updates->delete($firstRecord[0]->id);
        }

    }


}
