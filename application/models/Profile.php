<?php

/**
 * This is a "CMS" model for Images, but with bogus hard-coded data.
 * This would be considered a "mock database" model.
 *
 * @author Mao
 */
class Profile extends MY_Model {

    // constructor
    function __construct() {
        parent::__construct('team');
    }
   
}
