<?php
/**
 * Sets errors in the session.
 * @param array $errors An array of errors to be recorded.
 */
function setErrors(array $errors): void
{
    session_start();
    $_SESSION['errors'] = $errors;
}
/**
 * Get errors from the session.
 * @return array An array of errors, if any, otherwise an empty array.
 */
function getErrors(): array
{
    session_start();
    if (isset($_SESSION['errors']) && is_array($_SESSION['errors'])) {
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']); // Remove errors from the session after receiving
        return $errors;
    }
    return [];
}

/**
 * copying a file Photo from temp folder to folder images
 * @param array $photos
 * @param array $errors
 * @return void
 */
function setPhotos(array $photos, array &$errors): void
{
    foreach($photos as  $photo) {
        $extension = pathinfo($photo['name'], PATHINFO_EXTENSION);
        $uniqueName = 'image' . uniqid() . '.' . $extension;
        $fileName =  IMAGES_DIR .  $uniqueName;
        if (!move_uploaded_file($photo['tmp_name'], $fileName)) {
            $errors['errorUpload'][]  = ['Photo was not uploaded: ' . $fileName];
        }
    }
}

/**
 * read a file Photo from folder images &
 * fills the structure for photoswipe
 * @return array
 */
function getPhotos(): array
{
    $dir    = IMAGES_DIR;
    $files = scandir($dir);
    $dataSource = [];
    $counter = 0;
    foreach ($files as $file){
        $name =  IMAGES_DIR . $file;
        if (is_file($name) ){
            $size = getimagesize($name);
            if ($size !== false){
                $dataSource[$counter]['src'] = IMAGES_DIR . $file;
                $dataSource[$counter]['alt'] = 'file ' . $file;
                $dataSource[$counter]['width'] = $size[0];
                $dataSource[$counter]['height'] = $size[1];
                $counter++;
            }
        }
    }
    return $dataSource;
}