<?php
const TEXT_SITE_NAME = 'PhotoSwipe';

//VIEWS all parameters of views===========================================================
const VIEWS_TEMPLATE_MAIN = 'template_main';
const VIEWS_DIR = 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
const VIEWS_TEMPLATES_DIR = VIEWS_DIR . 'templates' . DIRECTORY_SEPARATOR;
const VIEWS_COMMON_DIR = VIEWS_DIR . 'common' . DIRECTORY_SEPARATOR;
const VIEWS_PAGES_DIR = VIEWS_DIR . 'pages' . DIRECTORY_SEPARATOR;

//css all parameters================================================================
const CSS_DIR = 'css' . DIRECTORY_SEPARATOR;
//js all parameters================================================================
const JS_DIR = 'js' . DIRECTORY_SEPARATOR;

//FUNCTIONS all parameters================================================================
const FUNCTIONS_DIR = APP_DIR . DIRECTORY_SEPARATOR . 'functions' . DIRECTORY_SEPARATOR;
const STORAGE_NAMES_FILE = APP_DIR . 'storage' . DIRECTORY_SEPARATOR . 'names.json';

const MAX_FILES = 5;
const PHOTO_MAX_SIZE = 2 * 1024 * 1024; //2Mb
const PHOTO_AVAILABLE_TYPES = [
    'image/jpeg',
    'image/png',
    'image/bmp',
];
const PHOTO_DIR = 'images';

const UPLOAD_ERROR_MESSAGES = [
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
];

const ERROR_MESSAGES = [
    0 => 'Please choose at least one file for upload',
    1 => 'No more than 5 files allowed to upload',
    2 => ' has incorrect format. Allowed formats: jpg, jpeg, png, bmp',
    3 => ' more than max file size - 2 Mb.'
];

const ERROR_NAME = [
    'limitFile' => 'Limit File:',
    'errorUpload' => 'Error to upload:',
    'errorType' => 'Incorrect format:',
    'errorSize' => 'File size error:',
    'errorCopy' => 'Photo save:',
];
