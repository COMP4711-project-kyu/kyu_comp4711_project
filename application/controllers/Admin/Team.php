<?php

/**
 * Team page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends Application {

    /**
     * Index Page for this controller.
     */
    public function index() {
        $this->setFields();
        $this->data['pagebody'] = 'admin/team';
        $this->data['about_error'] = "";
        $this->data['history_error'] = "";
        $this->data['p1_error'] = "";
        $this->data['p2_error'] = "";
        $this->render('Team', "admin");
    }

    function setFields() {
        // get dragons about descrioption
        $this->data['about'] = $this->profile->get(0)->description;

        // get information for 2 people on team page
        //manager
        $this->setP1();
        //captain
        $this->setP2();

        $this->setHistory();
    }

    function setHistory($errors = array()) {
        // set history
        $histories = $this->history->all();
        $table = "";
        // add empty feild
        $histories[] = $this->history->create();
        $num = 1;
        $index = 0;
        foreach ($histories as $history) {
            $history->num = $num++;
            if (count($errors) == 0) {
                $history->event_error = "";
                $history->date_error = "";
            } else {
                $history->event_error = $errors['event'][$index];
                $history->date_error = $errors['date'][$index];
                $index ++;
            }
            $table .= $this->parser->parse('components/_admin_history', (array) $history, true);
        }
        $this->data['history'] = $table;
    }

    function setP1() {
        $person1 = $this->profile->get(1);
        $this->data['pImg1'] = $person1->image_path;
        $this->data['pTitle1'] = $person1->title;
        $this->data['pName1'] = $person1->name;
        $this->data['pDescription1'] = $person1->description;
    }

    function setP2() {
        $person2 = $this->profile->get(2);
        $this->data['pImg2'] = $person2->image_path;
        $this->data['pTitle2'] = $person2->title;
        $this->data['pName2'] = $person2->name;
        $this->data['pDescription2'] = $person2->description;
    }

    public function confirm($feildName) {
        if (empty($_REQUEST)) {
            redirect('admin/team');
        } else {
            $this->data['about_error'] = "";
            $this->data['history_error'] = "";
            $this->data['p1_error'] = "";
            $this->data['p2_error'] = "";
            if (strcmp($feildName, "about") == 0) {
                $this->inputAbout();
            } else if (strcmp($feildName, "history") == 0) {
                $this->inputHistory();
            } else if (strcmp($feildName, "p1") == 0) {
                $this->inputPerson(1);
            } else if (strcmp($feildName, "p2") == 0) {
                $this->inputPerson(2);
            }
        }
    }

    function inputAbout() {
        // Extract submitted fields
        $about = $this->input->post('about');
        // validation
        if (empty($about)) {
            $this->errors[] = 'About is required.';
        }
        if (strlen($about) > 1000) {
            $this->errors[] = 'The input too long. It has to be under 1000 letters';
        }
        // redisplay if any errors
        if (@count($this->errors) <= 0) {
            $savedabout = $this->profile->get(0);
            if (strcmp($savedabout->description, $about) != 0) { // if data is changed, save
                $savedabout->description = $about;
                $this->profile->update($savedabout);
                $this->errors[] = 'About is successfully saved.';
                $this->updates->addUpdate("About Dragons", "/team", $about);
            }
        }
        // set error messages if any
        $message = '';
        if (@count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
                $message .= $booboo . "<br>";
        }
        $this->data['about_error'] = $message;
        $this->showPage();
    }

    function inputHistory() {
        $event = array();
        $date = array();
        //get all data from field
        $numHistoryFeild = $this->history->size() + 1;
        for ($i = 1; $i <= $numHistoryFeild; $i++) {
            $event[] = $this->input->post('event' . $i);
            $date[] = $this->input->post('date' . $i);
        }
        $event_errors=$this->validationForEvent($event, $numHistoryFeild-1);
        $date_errors =$this->validationForDate($date, $numHistoryFeild-1);
        // save if there is no error
        $result = array();
        if ($this->isEmpty($event_errors) && $this->isEmpty($date_errors)) {
            $result = $this->saveHistory($event,$date);
        }
        if (@$result['ifSaved']) {
            $this->data['history_error'] = "History is successfully saved";
            $this->updates->addUpdate("History", "/team", $result['updateMsg']);
        }
        
        // set fields
        $this->data['about'] = $this->profile->get(0)->description;
        $this->setP1();
        $this->setP2();
        
        $errors['event'] = $event_errors;
        $errors['date'] = $date_errors;
        $this->setHistory($errors);
        
        $this->data['pagebody'] = 'admin/team';
        $this->render('Team', "admin");
    }
    
    // lastIndex is the index of the last field which is new history
    function validationForEvent($event, $lastIndex){
        for($i = 0; $i < $lastIndex; $i++) {
            if (strlen($event[$i]) > 50) {
                $event_errors[] = "Event has to be under 50 letters long";
            } else if (empty($event[$i])) {
                $event_errors[] = "Event cannot be empty";
            } else {
                $event_errors[] = "";
            }
        }
       // if the last field is not empty, validate
        if(!empty($event[$lastIndex])){
            if (strlen($event[$lastIndex]) > 50) {
                $event_errors[] = "Event has to be under 50 letters long";
            } else {
                $event_errors[] = "";
            }
        }else{
            $event_errors[] = "";
        }
        
        return $event_errors;
    }
    
    function isEmpty($array){
        $size = count($array);
        for($i = 0; $i<$size ; $i++){
            if(!empty($array[$i]))
                return false;
        }
        return true;
    }
    
    function validationForDate($date, $lastIndex){
        for($i = 0; $i < $lastIndex; $i++) {
            if (strlen($date[$i]) > 20) {
                $date_errors[] = "Date has to be under 20 letters long";
            } else if (empty($date[$i])) {
                $date_errors[] = "Date cannot be empty";
            } else {
                $date_errors[] = "";
            }
        }
        // if the last field is not empty, validate
        if(!empty($date[$lastIndex])){
            if (strlen($date[$lastIndex]) > 50) {
                $date_errors[] = "Event has to be under 50 letters long";
            } else {
                $date_errors[] = "";
            }
        }else{
            $date_errors[] = "";
        }
        return $date_errors;
    }
    // save events if there is no error
    // return if any data is saved
    function saveHistory($event,$date){
          $ifSaved = false;
          $updateMsg = ""; // saved as update when history is saved and shown on Home page
            $savedHistories = $this->history->all();
            $i = 0;
            foreach ($savedHistories as $saved) {
                if (strcmp($saved->event, $event[$i]) != 0 ||
                        strcmp($saved->date, $date[$i]) != 0) {// if data is changed, save
                    $saved->event = $event[$i];
                    $saved->date = $date[$i];
                    $this->history->update($saved);
                    $ifSaved = true;
                    $updateMsg .= $event[$i] . " is updated. <br/>";
                }
                $i++;
            }
            // if new data is saved
            $maxIndex = count($event)-1;
            if (strlen($event[$maxIndex]) > 0 && strlen($date[$maxIndex]) > 0) {
                $newEvent = $this->history->create();
                $newEvent->event = $event[$maxIndex];
                $newEvent->date = $date[$maxIndex];
                $this->history->add($newEvent);
                $ifSaved = true;
                $updateMsg .= $event[$maxIndex] . " is added. <br/>";
            }
            $result['ifSaved'] = $ifSaved;
            $result['updateMsg'] = $updateMsg;
        return $result;
    }

    function inputPerson($num) { // Extract submitted fields
        $title = $this->input->post('pTitle' . $num);
        $name = $this->input->post('pName' . $num);
        $description = $this->input->post('pDescription' . $num);

        // validation
        if (empty($title)) {
            $this->errors[] = 'Title is required.';
        }
        if (empty($name)) {
            $this->errors[] = 'Name is required.';
        }
        if (empty($description)) {
            $this->errors[] = 'Description is required.';
        }
        if (strlen($title) > 100) {
            $this->errors[] = 'Title has to be under 100 letters';
        }
        if (strlen($name) > 100) {
            $this->errors[] = 'Name has to be under 100 letters';
        }
        if (strlen($description) > 1000) {
            $this->errors[] = 'Comment has to be under 1000 letters';
        }
        // redisplay if any errors
        if (@count($this->errors) <= 0) {
            $saved = $this->profile->get($num);
            if (strcmp($saved->description, $description) != 0 ||
                    strcmp($saved->title, $title) != 0 ||
                    strcmp($saved->name, $name) != 0) { // if data is changed, save
                $saved->description = $description;
                $saved->title = $title;
                $saved->name = $name;
                $this->profile->update($saved);
                $this->errors[] = 'Profile for ' . $title . ' is successfully saved.';
                $this->updates->addUpdate($title . "'s profile", "/team", $description);
            }
        }
        // set error messages if any
        $message = '';
        if (@count($this->errors) > 0) {
            foreach ($this->errors as $booboo)
                $message .= $booboo . "<br>";
        }
        $this->data['p' . $num . '_error'] = $message;
        $this->showPage();
    }

    function showPage() {
        $this->setFields();
        $this->data['pagebody'] = 'admin/team';
        $this->render('Team', "admin");
    }

}

/* End of file Team.php */
/* Location: ./application/controllers/Team.php */