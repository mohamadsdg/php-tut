<?php
//print_r($_GET);
sleep(1);

$searchKey = $_GET['phone2'];
//echo $searchKey;
$contact = array(
    "Loghman - 09999999999",
    "Ali - 066645554",
    "Ahmad - 0666666666",
    "Mohammad - 05555555555",
    "Jafar - 0333333333",
    "Sara - 011111111111",
    "Zeinab - 012121212",
    "Komeil - 0144556677",
    "Seheil - 09876543555",
    "Hassan - 0144556677",
    "Hossein - 034567688",
);

if (strlen($searchKey) > 0) {

    foreach ($contact as $eachContact) {
        if (strpos($eachContact, $searchKey) !== false) {
            $eachContact = str_replace($searchKey, '<b>' . $searchKey . '</b>', $eachContact);
            echo $eachContact . '<br>';

        }
    };

}


