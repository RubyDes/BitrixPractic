<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(empty($arResult)) return "";

$strReturn = '<ol class="breadcrumb">';
$itemSize = count($arResult);

for($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsEx($arResult[$index]["TITLE"]);
    $link = $arResult[$index]["LINK"];
    $separator = ($index > 0) ? '&nbsp;/&nbsp;' : '';
    if($index == $itemSize - 1) {
        $strReturn .= '<li>' . $separator . '<span style="color: #ffffff;">' . $title . '</span></li>';
    } 
    elseif(!empty($link)) {
        $strReturn .= '<li>' . $separator . '<a href="' . $link . '" title="' . $title . '">' . $title . '</a></li>';
    } 
    else {
        $strReturn .= '<li>' . $separator . $title . '</li>';
    }
}

$strReturn .= '</ol>';
return $strReturn;
