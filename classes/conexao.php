<?php

try {
   $db = new PDO("sqlite:banco/bizarra.sqlite");
}   catch (Exception $e) {
    echo "Erro: ";
    echo $e->getMessage();
    exit;
}