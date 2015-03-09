<?php

/**
 * Contact page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Application {

    public function index() {
        // set info
        $this->data['info'] = $this->keyvalue->get('contact')->value;
        $this->data['error'] = "";
        $this->data['pagebody'] = 'contact';
        $this->render('Contact');
    }

    function confirm() {
        
        // Extract submitted fields
        $email['name'] = $this->input->post('name');
        $email['email'] = $this->input->post('email');
        $email['subject'] = $this->input->post('subject');
        $email['message'] = $this->input->post('message');

        // validation
        if (empty($email['name']) || strcasecmp($email['name'], "Name") == 0 ) {
            $this->errors[] = 'Name is required.';
        }
        if (filter_var($email['email'], FILTER_VALIDATE_EMAIL) === false) {
            $this->errors[] = 'Email is not valid';
        }
        if (empty($email['message'])||strcasecmp($email['message'], "Message:") == 0||strcasecmp($email['message'], "Message") == 0) {
            $this->errors[] = 'Message is required.';
        }

        // redisplay if any errors
        if (count($this->errors) > 0) {
            $this->showPage($email);
            return; // make sure we don't try to save anything
        }else{
            
        }
    }

    function showPage() {
        // set error messages if any
        $message = '';
        if (count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
                $message .= $booboo . "<br>";
        }
        $this->data['error'] = $message;
        $this->data['info'] = $this->keyvalue->get('contact')->value;
        $this->data['pagebody'] = 'contact';
        $this->render('Contact');
    }

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */