<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

require_once $_SERVER["DOCUMENT_ROOT"] . "/local/templates/.default/include/header.php";

use Bitrix\Main\Application;
$request = Application::getInstance()->getContext()->getRequest();
$currentDir = $request->getRequestedPageDirectory();

$isMainPage = ($currentDir == "/");
?>

<? if (!$isMainPage): ?>
<div class="page-title dark-background" style="text-align: center;">
    <div class="container position-relative">
        <h1><?$APPLICATION->ShowTitle(false);?></h1>
        <p><?$APPLICATION->ShowProperty("page_text_under_title");?></p>
        <div style="display: flex; justify-content: center;">
            <?$APPLICATION->IncludeComponent(
                "bitrix:breadcrumb",
                "dev_template",
                Array(
                    "START_FROM" => "0",
                    "PATH" => "",
                    "SITE_ID" => SITE_ID
                )
            );?>
        </div>
    </div>
</div>
<? endif; ?>
