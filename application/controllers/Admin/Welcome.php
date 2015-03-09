<?php

/**
 * Home page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application {

    /**
     * Index Page for this controller.
     */
    public function index() {
        $this->setRecentPictures();
        // set announcement
        $this->data['announce'] = $this->keyvalue->get("ANNOUNCEMENT")->value;
        $this->data['error'] = "";
        //set updates
        $this->setUpdates();

        $this->data['pagebody'] = 'admin/welcome';
        $this->render('Home', 'admin');
    }

    public function confirm() {
         if(empty($_REQUEST)){
            redirect('admin/');
        } else {
            // Extract submitted fields
            $field['announce'] = $this->input->post('announce');

            // validation
            if (empty($field['announce'])) {
                $this->errors[] = 'Announcement is required.';
            }
            if (strlen($field['announce']) > 1000) {
                $this->errors[] = 'Annoucement is too long. It has to be under 1000 letters';
            }
            // redisplay if any errors
            if (@count($this->errors) > 0) {
                $this->showPage();
                return; // make sure we don't try to save anything
            } else {
                $announce = $this->keyvalue->get('ANNOUNCEMENT');
                if(strcmp($announce->value, $field['announce'])!=0){ // if announcement is changed, save
                $announce->value = $field['announce'];
                $this->keyvalue->update($announce);
                $this->errors[] = 'Announcement is successfully saved.';
                $this->updates->addUpdate("Announcement", "/", $field['announce']);
                }
                $this->showPage();
            }
        }
    }

    function showPage() {
        // set error messages if any
        $message = '';
        if (@count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
                $message .= $booboo . "<br>";
        }
        $this->data['error'] = $message;
        $this->setRecentPictures();
        // set announcement
        $this->data['announce'] = $this->keyvalue->get("ANNOUNCEMENT")->value;
        //set updates
        $this->setUpdates();

        $this->data['pagebody'] = 'admin/welcome';
        $this->render('Home', 'admin');
    }

    function setRecentPictures() {
        // get recent pictures
        $pix = $this->images->getRecentImg(4);
        for ($num = 1, $index = 0; $num <= 2; $num++) {
            $row = "";
            // set 3 image in a cell for row
            for ($count = 0; $count < 2; $count++) {
                $row .= $this->parser->parse('components/_imagecell_2', (array) $pix[$index], true);
                $index++;
            }
            $name = 'img_row' . $num;
            // set img_row$num 
            $this->data[$name] = $row;
        }
    }

    function setUpdates() {
        $updates = $this->updates->recent();
        $output = "";
        foreach ($updates as $update) {
            $output .= $this->parser->parse('components/_update', (array) $update, true);
        }
        $this->data['updates'] = $output;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */