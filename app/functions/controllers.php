<?php
/**
 * transferring data to the page and displaying HOME
 * @return void
 */
function home() : void
{
    $dataSource = getPhotos();
    $errors = getErrors();
    render('home'
        , [
            'dataSource' => $dataSource,
            'errors' => $errors
    ]);
}


/**
 * photo reading, validation and saving
 * Redirect to /index.php
 * @return void
 */
function process() : void
{
    $errors = [];
    $photos = [];
    if(empty($_FILES['photo'])){
        $errors[] = 'No POST data for file';
    }else{
        $photoFile = $_FILES['photo'];
        $photos = diverseArray($photoFile);
        $errors = validatePhoto($photos);
    }
    $res = false;
    foreach($errors as $key => $error){
        if (!empty($error)){
            $res = true;
        }
    }
    if (!$res) {
        setPhotos($photos,$errors);
        if (!empty($errors)) {
            setErrors($errors);
        }
    } else {
        setErrors($errors);
    }
    redirect('/index.php');// To index.php
}

