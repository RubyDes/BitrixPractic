<?php
define("BX_NO_HEADER", true);
define("BX_SKIP_SESSION_EXPAND", true);
define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS", true);
define("BX_NO_ACCELERATOR_RESET", true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

global $APPLICATION;
$APPLICATION->SetPageProperty("page_css_class", "");
$APPLICATION->SetTitle("Данные");

require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/header.php");

$iblockId = 12;

CModule::IncludeModule("iblock");
$rsElements = CIBlockElement::GetList(
    array("ID" => "ASC"),
    array("IBLOCK_ID" => $iblockId, "ACTIVE" => "Y"),
    false,
    false,
    array("ID", "NAME", "PROPERTY_PRODUCT", "PROPERTY_PRODUCT_CATEGORY", "PROPERTY_CITY", "PROPERTY_QUANTITY")
);
?>

<div class="pagetitle mb-4">
    <h1><?php $APPLICATION->ShowTitle()?></h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex py-4 px-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Товар</th>
                                    <th>Категория</th>
                                    <th>Город</th>
                                    <th>Количество</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $index = 1; ?>
                                <?php while($arElement = $rsElements->GetNext()): ?>
                                <?php
                                $product = !empty($arElement['PROPERTY_PRODUCT_VALUE']) 
                                    ? htmlspecialcharsbx($arElement['PROPERTY_PRODUCT_VALUE']) 
                                    : htmlspecialcharsbx($arElement['NAME']);
                                $category = htmlspecialcharsbx($arElement['PROPERTY_PRODUCT_CATEGORY_VALUE']);
                                $city = htmlspecialcharsbx($arElement['PROPERTY_CITY_VALUE']);
                                $quantity = htmlspecialcharsbx($arElement['PROPERTY_QUANTITY_VALUE']);
                                ?>
                                <tr class="test-row">
                                    <td><?=$index++?></td>
                                    <td><a href="/statistic_na/main/table/<?=$arElement['ID']?>/"><?=$product?></a></td>
                                    <td><?=$category?></td>
                                    <td><?=$city?></td>
                                    <td><?=$quantity?></td>
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex py-2 px-4 flex-column">
                        <!--Pagination here-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/local/templates/exam1_type2/footer.php");
?>