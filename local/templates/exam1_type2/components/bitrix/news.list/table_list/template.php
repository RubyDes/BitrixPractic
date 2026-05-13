<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
?>

<div class="pagetitle mb-4">
    <h1>Данные</h1>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-flex py-4 px-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>№</th>
                        <th><?=GetMessage("TABLE_PRODUCT")?></th>
                        <th><?=GetMessage("TABLE_CATEGORY")?></th>
                        <th><?=GetMessage("TABLE_CITY")?></th>
                        <th><?=GetMessage("TABLE_QUANTITY")?></th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach($arResult["ITEMS"] as $arItem):?>
                        <?
                        $product = $arItem["PROPERTIES"]["PRODUCT"]["VALUE"];
                        $category = $arItem["PROPERTIES"]["PRODUCT_CATEGORY"]["VALUE"];
                        $city = $arItem["PROPERTIES"]["CITY"]["VALUE"];
                        $quantity = $arItem["PROPERTIES"]["QUANTITY"]["VALUE"];
                        ?>
                        <tr>
                            <td><?=$arItem["ID"]?></td>
                            <td>
                                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=htmlspecialcharsbx($product)?></a>
                            </td>
                            <td><?=htmlspecialcharsbx($category)?></td>
                            <td><?=htmlspecialcharsbx($city)?></td>
                            <td><?=(int)$quantity?></td>
                        </tr>
                    <?endforeach;?>
                </tbody>
            </table>
        </div>

        <?if($arResult["NAV_STRING"]):?>
            <div class="d-flex py-2 px-4 flex-column">
                <?=$arResult["NAV_STRING"]?>
            </div>
        <?endif;?>
    </div>
</div>