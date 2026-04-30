<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $USER;

$aMenuLinks = array(
    array(
        "Дашборд",
        "dashboard/",
        array(),
        array("menu_ico" => "bi-grid"),
        ""
    ),
    array(
        "Основные",
        "main/",
        array(),
        array("menu_ico" => "bi-menu-button-wide"),
        ""
    ),
    array(
        "Дополнительные",
        "extra/",
        array(),
        array("menu_ico" => "bi-files"),
        ""
    ),
    array(
        "Профиль",
        "profile/",
        array(),
        array("menu_ico" => "bi-person"),
        ""
    )
);

if(!$USER->IsAuthorized()) {
    $aMenuLinks = array();
}
?>