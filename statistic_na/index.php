<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Статистика");

global $USER;

if (!$USER->IsAuthorized()) {
    $request = \Bitrix\Main\Context::getCurrent()->getRequest();

    if ($request->get("forgot_password") == "yes") {
        $APPLICATION->IncludeComponent(
            "bitrix:system.auth.forgotpasswd",
            "",
            array(
                "AUTH_AUTH_URL" => $APPLICATION->GetCurPage(),
            ),
            false
        );
    } elseif ($request->get("change_password") == "yes") {
        $APPLICATION->IncludeComponent(
            "bitrix:system.auth.changepasswd",
            "",
            array(
                "AUTH_AUTH_URL" => $APPLICATION->GetCurPage(),
            ),
            false
        );
    } else {
        $APPLICATION->IncludeComponent(
            "bitrix:system.auth.authorize",
            "",
            array(
                "NOT_SHOW_LINKS" => "Y"
            ),
            false
        );
    }
} else {
    LocalRedirect("/statistic_na/dashboard/");
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>