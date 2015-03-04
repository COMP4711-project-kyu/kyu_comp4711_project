<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 */
class Application extends CI_Controller {

    protected $data = array();      // parameters for view components
    protected $id;		  // identifier for our content
    protected $choices = array(// our menu navbar
        'Home' => '/', 'Team'=>'/team', 'Gallery'=>'/gallery', 'Contact' => '/Contact'  
    );

    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct()
    {
	parent::__construct();
	$this->data = array();
        $this->data['pagetitle'] = 'Van Dragons';
    }

     function render($pagetitle, $role = "")
    {
        $this->data['menubar'] = build_menu_bar($this->choices, $pagetitle);
        if(strcmp($pagetitle,"Home") == 0 ){
            $pagetitle = "";
        }else{ 
            $pagetitle .=" - ";
        }
        
        if(strcmp($role ,"admin") == 0){
            $this->data["role_color"] = "#680000" ;
        }else if(strcmp($role,"team")==0){
            $this->data["role_color"] = "#003399" ;
        }else{
            $this->data['role_color'] = "#000";
        }
        $this->data['pagetitle'] = $pagetitle.'Van Dragons';
        $this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
        $this->data['data'] = &$this->data;
	$this->parser->parse('template', $this->data);
    }

}

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */