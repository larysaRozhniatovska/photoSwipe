<?php
/**
 * Check if at least one file was uploaded & delete file
 * @param array $files
 * @return array
 */
function isNoFileError(array &$files): array
{
    $errors = [];
    foreach($files as $key => $file) {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = $file['name'] . '  ' . UPLOAD_ERROR_MESSAGES[$file['error']];
            unset($files[$key]);
        }
    }
    return $errors;
}
/**
 * Control number of uploaded files
 * @param array $files
 * @return bool
 */
function isFileLimitUpload(array $files): bool
{
    return count($files) > MAX_FILES;
}
/**
 * Check if the file is of an allowed type mime & delete file
 * @param array $files
 * @return array error
 */
function checkTypePhoto(array &$files): array
{
    $errors = [];
    foreach($files as $key => $file) {
        if (!in_array($file['type'], PHOTO_AVAILABLE_TYPES)) {
            $errors[] = $file['name'] . ' ' . $file['type'] .'  ' . ERROR_MESSAGES[2];
            unset($files[$key]);
        }
    }
    return $errors;
}
/**
 * Check size of the file
 * @param array $files
 * @param int $maxFileSize
 * @return array
 */
function checkSizePhoto(array &$files, int $maxFileSize): array
{
    $errors = [];
    foreach($files as $key => $file) {
        if ($file['size'] > $maxFileSize){
            $errors[] = $file['name'] . ' ' . $file['size'] . '  ' . ERROR_MESSAGES[3];
            unset($files[$key]);
        }
    }
    return $errors;
}
/**
 * check all photos values
 * @param array $photos
 * @return array
 */
function validatePhoto(array &$photos): array
{
    $errors = [
        'limitFile' => null,
        'errorUpload' => null,
        'errorType' => null,
        'errorSize' => null,
        'errorCopy' => null,
    ];
    if(isFileLimitUpload($photos)){
        $errors['limitFile'] = ERROR_MESSAGES[1];
        return  $errors;
    }
    $countFiles = count($photos);
    $temp = isNoFileError($photos);

    if(!empty($temp)) {
        $errors['errorUpload'] = $temp;
        if ($countFiles === count($errors)) {
            return $errors;
        }
    }
    if (empty($photos)){
        return $errors;
    }
    $temp = checkTypePhoto($photos);
    if(!empty($temp)) {
        $errors['errorType'] = $temp;
    }
    if (empty($photos)){
        return $errors;
    }
    $temp = checkSizePhoto($photos, PHOTO_MAX_SIZE);
    if(!empty($temp)) {
        $errors['errorSize'] = $temp;
    }
    return $errors;
}