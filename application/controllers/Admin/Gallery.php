<?php

/**
 * Gallery page
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application {

    public function index() {
        $this->data["error"] = "";
        $this->setFirstPage();
        $this->data['pagebody'] = 'admin/gallery';
        $this->render('Gallery', "admin");
    }

    // show latest 9 pictures from images database
    function setFirstPage() {
        $this->data['page'] = 1;
        $this->data['num_page'] = floor($this->images->size() / 9) + 1;
        $this->setArrows("All", 1);
        $this->setAlbumLinks(); //set links for dropdown list
        $this->data['album'] = "All Pictures";
        // get latest 9 pictures
        $pix = $this->images->getRecentImg(9);
        $this->setImages($pix);
    }

    // this function is called when URL is like gallery/(:any)/(:num) or gallery/(:any)/
    // shows images by albums(dates)
    public function album($album, $page = 1) {
        $this->data['page'] = $page;
        if (strcmp($album, "All") == 0) {
            $this->data['num_page'] = floor($this->images->size() / 9) + 1;
            $this->data['album'] = "All Pictures";
        } else {
            $this->data['num_page'] = floor($this->images->getAlbumSize($album) / 9) + 1;
            $this->data['album'] = date_format(DateTime::createFromFormat("Ymd", $album), 'F d, Y'); //set album name
        }
        $this->setArrows($album, $page);
        $this->setAlbumLinks(); //set links for dropdown list
        $pix = $this->images->getGroupByAlbum($page, 9, $album);
        $this->setImages($pix);
        $this->data['pagebody'] = 'admin/gallery';
        $this->data['error'] = "";
        $this->render('Gallery', "admin");
    }

    //set images in a table
    function setImages($pix) {
        $size = count($pix);
        for ($num = 1, $index = 0; $num <= 3; $num++) {
            $row = "";
            // set 3 image in a cell for row
            for ($count = 0; $count < 3; $count++) {
                if ($index < $size) {
                    $row .= $this->parser->parse('components/_admin_imagecell_3', (array) $pix[$index], true);
                }
                $index++;
            }
            $name = 'img_row' . $num;
            // set img_row$num 
            $this->data[$name] = $row;
        }
    }

    // set links for dropdown list to select albums
    function setAlbumLinks() {
        $albums = $this->images->getAllAlbums();
        $album_links = "";
        foreach ($albums as $album) {
            $dateString = date_format(DateTime::createFromFormat("Ymd", $album->album), 'F d, Y');
            $album_links.= '<li><a href="/admin/gallery/' . $album->album . '">' . $dateString . '</a></li>';
        }
        $this->data['album_link'] = $album_links;
    }

    // set arrows to go to a page which shows next images or previous images
    function setArrows($album, $page) {
        if ($page != 1)
        // show button to go previous images page
            $this->data['left_arrow'] = "<a href='/admin/gallery/" . $album . "/" . ($page - 1) . "'><img src='/assets/images/arrowleft.png' ></a>";
        else
            $this->data['left_arrow'] = "";

        if ($this->data['num_page'] != $page)
        // show button to go next images page
            $this->data['right_arrow'] = "<a href='/admin/gallery/" . $album . "/" . ($page + 1) . "'><img src='/assets/images/arrowright.png' ></a>";
        else
            $this->data['right_arrow'] = "";
    }

    public function confirm() {
        $this->data['error'] = "";
        if (empty($_REQUEST)) {
            $this->setFirstPage();
        } else {
            $date = $this->input->post('date');
            if (empty($date)) {
                $this->data['error'] = "Date is required.<br/>";
            } else {
                $date = str_replace('-', '', $date);
                $successPic = $this->saveImages($date);
                if ($successPic > 0) {
                    $this->data['error'] = $successPic . ' pictures successfully uploaded';
                } else {
                    
                }
            }
        }
        $this->setFirstPage();
        $this->data['pagebody'] = 'admin/gallery';
        $this->render('Gallery', "admin");
    }

    function saveImages($date) {
        $valid_formats = array("jpg", "png", "gif", "jpeg");
        $max_file_size = 1024 * 1024; //1 Mb
        $path = APPPATH . "../assets/images/gallery/" . $date . "/"; // Upload directory
        $count = 0; // Number of successfully uploaded file

        foreach ($_FILES['files']['name'] as $f => $name) {
            if ($_FILES['files']['error'][$f] == 4) {
                continue; // Skip file if any error found
            }
            if ($_FILES['files']['error'][$f] == 0) {
                if ($_FILES['files']['size'][$f] > $max_file_size) {
                    $this->errors[] = "$name is too large!.";
                    continue; // Skip large files
                } else if (!in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats)) {
                    $this->errors[] = "$name is not a valid format";
                    continue; // Skip invalid file formats
                } else { // No error found! Move uploaded files 
                    $pathorg = $path . "original/";
                    if (!file_exists($path)) {
                        mkdir($path, 0777, true); // make directory for the day
                        mkdir($pathorg, 0777, true); // make directory to save the original file
                    }
                    $imagename = time() . $_FILES["files"]["name"][$f]; //set image name
                    // upload image into directory /assets/images/gallery/{date}/original
                    if (move_uploaded_file($_FILES["files"]["tmp_name"][$f], $pathorg . $imagename)) {
                        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $imagename);
                        $ext = pathinfo($imagename, PATHINFO_EXTENSION);
                        $thumbName = $withoutExt . "_" . "thumb." . $ext; // create thumbnail's name
                        // upload thumbnail
                        if ($this->generateTumb($imagename, $ext, $path, $thumbName)) {
                            // update database
                            $newImg = $this->images->create();
                            $newImg->name = $imagename;
                            $newImg->thumb_path = $thumbName;
                            $newImg->path = $imagename;
                            $newImg->album = $date;
                            $this->images->add($newImg);
                            $count++;
                        } else {
                            $this->errors[] .="Createing thumbnail failed";
                        }
                    } else {
                        $this->errors[] .="Image uploading failed";
                    }
                }
            }
        }
        return $count;
    }

    function generateTumb($imgname, $ext, $thumbpath, $thumbName) {
        $file_path = $thumbpath . "original/" . $imgname; // where the original file is

        if ($ext == "gif") {
            $original = imagecreatefromgif($file_path);
        } else if ($ext == "jpeg" || $ext == "jpg") {
            $original = imagecreatefromjpeg($file_path);
        } else if ($ext == "png") {
            $original = imagecreatefrompng($file_path);
        }

        // get original height and width of the image
        $originalW = imagesx($original);
        $originalH = imagesy($original);
        // calculate thumbnail's height and width
        $newH = 247;
        $newW = round($originalW / $originalH * 247);

        $thumbnail = imageCreateTrueColor($newW, $newH);

        imagecopyresampled($thumbnail, $original, 0, 0, 0, 0, $newW, $newH, imagesx($original), imagesy($original));
        //set directory to save
        $f = $thumbpath . $thumbName;
        $ret = false;
        if ($ext == "gif") {
            $ret = imagegif($thumbnail, $f, 100);
        } else if ($ext == "jpeg" || $ext == "jpg") {
            $ret = imagejpeg($thumbnail, $f, 100);
        } else if ($ext == "png") {
            $ret = imagepng($thumbnail, $f, 100);
        }

        return $ret;
    }

    public function delete($album, $imgName) {
        $img = $this->images->getImg($album, $imgName);
        $path = APPPATH . "../assets/images/gallery/" . $album . "/"; // path for the album
        $pathOrg = $path . "original/" . $imgName; // path for original image
        $pathThumb = $path . $img->thumb_path;
        if (unlink($pathOrg)) {
            if (unlink($pathThumb)) {
                $this->images->delete($img->id);
                if ($this->is_dir_empty($path . "original/")) { // if the original folder is empty
                        rmdir($path . "original/"); //delete original directory
                    if($this->is_dir_empty($path)){
                        if(rmdir($path)){
                            redirect("/admin/gallery/");
                        }
                    }
                }else{
                    redirect("/admin/gallery/" . $album);
                }
            } else {
                var_dump("couldn't delete the thub image");
            }
        } else {
            var_dump("couldn't delete the original image");
        }
    }

    function is_dir_empty($dir) {
        if (!is_readable($dir))
            return NULL;
        $handle = opendir($dir);
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                return FALSE;
            }
        }
        return TRUE;
    }

}

/* End of file Gallery.php */
/* Location: ./application/controllers/Gallery.php */