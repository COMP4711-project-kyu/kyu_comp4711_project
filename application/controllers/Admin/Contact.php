<?php

/**
 * Contact page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Application {

    public function index() {
        // set info
        $this->data['info'] = $this->keyvalue->get('contact')->value;
        $this->data['email'] = $this->keyvalue->get('email')->value;

        $this->data['email_error'] = "";
        $this->data['info_error'] = "";
        $this->data['pagebody'] = 'admin/contact';
        $this->render('Contact', "admin");
    }

    function confirm() {
        if (empty($_REQUEST)) {
            redirect('admin/contact');
        } else {
            // Extract submitted fields
            $feild['info'] = $this->input->post('info');
            $feild['email'] = $this->input->post('email');

            // validation
            if (filter_var($feild['email'], FILTER_VALIDATE_EMAIL) === false) {
                $this->data['email_error'] = 'Email is not valid';
            } else {
                $email = $this->keyvalue->get("email");
                if (strcmp($email->value, $feild['email']) != 0) {
                    $email->value = $feild['email'];
                    $this->keyvalue->update($email);
                    $this->data['email_error'] = 'Email is successfully saved';
                } else {
                    $this->data['email_error'] = '';
                }
            }
            if (empty($feild['info'])) {
                $this->data['info_error'] = 'Message is required.';
            } else if (count($feild['info']) > 1000) {
                $this->data['info_error'] = 'Too many letters';
            } else {
                $info = $this->keyvalue->get("contact");
                if (strcmp($info->value, $feild['info']) != 0) {
                    $info->value = $feild['info'];
                    $this->keyvalue->update($info);
                    $this->data['info_error'] = 'Contact Information is successfully saved';
                } else {
                    $this->data['info_error'] = "";
                }
            }
            $this->showPage();
        }
    }

    function showPage() {
        // set error messages if any
        $this->data['info'] = $this->keyvalue->get('contact')->value;
        $this->data['email'] = $this->keyvalue->get('email')->value;
        $this->data['pagebody'] = 'admin/contact';
        $this->render('Contact', "admin");
    }

}

/* End of file Contact.php */
/* Location: ./application/controllers/Contact.php */