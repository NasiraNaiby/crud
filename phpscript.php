<?php
$pattern = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžæÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/";
if (preg_match($pattern, $_REQUEST['name']) === 1){
    $data = $_REQUEST['name'];
} else {
    echo "Invalid name.";
}

$pattern = "/^0[1-9]([-. ]?[0-9]{2}){4}$/";
if (preg_match($pattern, $_REQUEST['number']) === 1){
    $data .= ",  " . $_REQUEST['number'];
} else {
    echo "Invalid number.";
}

$pattern = "/^[a-z0-9.-]+@[a-z0-9.-]{2,}\.[a-z]{2,4}$/";
if (preg_match($pattern, $_REQUEST['email']) === 1){
    $data .= ",  " . $_REQUEST['email'];
} else {
    echo "Invalid email.";
}

$pattern = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžæÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/";
if (preg_match($pattern, $_REQUEST['message']) === 1){
    $data .= ",  " . $_REQUEST['message'] . "\n";
} else {
    echo "Invalid message.";
}

file_put_contents('contactdata.txt', $data, FILE_APPEND);
header('Location: accueil.php');
?>
