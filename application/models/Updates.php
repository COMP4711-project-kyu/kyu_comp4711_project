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
        $highest = $this->updates->highest();
        $this->db->where('id <=', $highest);
        $this->db->where('id >', $highest-3);
        $this->db->order_by("id", "desc"); 

        $updates = $this->db->get('updates');
        return $updates->result();
    }


}
