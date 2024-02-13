<?php
$ROOT_URL = "/BOX_PHP/Fromsorfware";
$CONTENT_URL = "$ROOT_URL/Content";
$ADMIN_URL = "$ROOT_URL/Admin";
$SITE_URL = "$ROOT_URL/Site";

$UPLOAD_URL = "$ROOT_URL/Upload";

$IMAGE_DIR = $_SERVER['DOCUMENT_ROOT'] . "$ROOT_URL/Content/Images";

function exist_param($fieldName)
{
    return array_key_exists($fieldName, $_REQUEST);
}
// save file vào thư mục mình muốn
function save_file($fileName, $target_dir)
{
    $file_uploaded = $_FILES[$fileName];
    $file_name = basename($file_uploaded['name']);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded['tmp_name'], $target_path);
    return $file_name;
}

// tạo cookie
function add_cookie($name, $value, $day)
{
    setcookie($name, $value, time() * (864000 * $day), "/");
}

// Xóa cookie
function delete_cookie($name)
{
    add_cookie($name, "", -1);
}

//  đọc giá trị cookie
function get_cookie($name)
{
    return $_COOKIE[$name] ?? '';
}
function check_login()
{
    global $SITE_URL;
    if (isset($_SESSION["user"])) {
        if ($_SESSION["user"]["role"] == 1) {
            return;
        }
        if (strpos($_SERVER["REQUEST_URI"], '/Admin/') == FALSE) {
            return;
        }
        $_SESSION['request_uri'] = $_SERVER["REQUEST_URI"];
        header("location: $SITE_URL/taikhoan/dangnhap.php");
    }
}
// ------------------------- VALIDATE FORM -------------------------------- //
