<?php
function RandomChuoi($dai)
{
    $mang = array("a", "A", "b", "B", "c", "d", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
    $r = "";
    for ($i = 1; $i <= $dai; $i++) {
        $ran = rand(0, count($mang) - 1);
        $r = $r . $mang[$ran];
    }
    return $r;
}

function UploadFile($fileInput, $path, $type, $size, $btnSubmit)
{
    $target_dir = $path;
    $target_file = $target_dir . RandomChuoi(10) . "-" . basename($_FILES["$fileInput"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // check phai la file hinh
    if ($type == 1 && isset($_POST[$btnSubmit])) {
        $check = getimagesize($_FILES["$fileInput"]["tmp_name"]);
        if ($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // check file size
    if ($_FILES["$fileInput"]["size"] > $size * 1 * 1024 * 1024) {
        //echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // check file type
    if ($imageFileType != "jpg" &&
        $imageFileType != "png" &&
        $imageFileType != "jpeg" &&
        $imageFileType != "gif" &&
        $type == 1
    ) {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // final
    if ($uploadOk == 0) {
        $kq = new KQUpload(false, "");
    } else {
        if (move_uploaded_file($_FILES["$fileInput"]["tmp_name"], $target_file)) {
            $kq = new KQUpload(true, $target_file);
        } else {
            $kq = new KQUpload(false, "");
        }
    }


    return json_encode($kq);
}




class KQUpload
{
    public $kq;
    public $file;

    function __construct($k, $f)
    {
        $this->kq = $k;
        $this->file = $f;
    }
}