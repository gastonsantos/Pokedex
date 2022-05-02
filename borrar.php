<?php
include_once("./data/PokemonDAO.php");
include_once("./utils/Navigation.php");

$dao = new PokemonDAO();

$id = $_POST["idBaja"];

if (isIdValid($id)) {
    $dao->delete($id);

    Navigation::redirectTo("index.php");
}

function isIdValid($id) {
    return isset($id) && is_numeric($id);
}


