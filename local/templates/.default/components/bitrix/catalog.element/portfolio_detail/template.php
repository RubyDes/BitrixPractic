<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */

//Отладка, чтобы увидеть текст Услуги
// echo '<pre style="text-align:left; background:#f0f0f0; padding:10px; border:1px solid red;">';
// echo "Коды свойств: ";
// print_r(array_keys($arResult["PROУPERTIES"]));
// echo '</pre>'
?>

<section class="portfolio-details section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="portfolio-details-slider">
                    <?if(!empty($arResult["DETAIL_PICTURE"]["SRC"])):?>
                        <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" class="img-fluid">
                    <?elseif(!empty($arResult["PREVIEW_PICTURE"]["SRC"])):?>
                        <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" class="img-fluid">
                    <?else:?>
                        <img src="<?=DEFAULT_TEMPLATE_PATH?>/assets/img/portfolio/portfolio_1.jpg" alt="<?=$arResult["NAME"]?>" class="img-fluid">
                    <?endif;?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3><?=GetMessage("EX_PROJECT")?></h3>
                    <ul>
                        <li><strong><?=GetMessage("EX_SERVICES")?>:</strong> 
                            <?=$arResult["PROPERTIES"]["SERVICES"]["VALUE"]?></li>
                        <li><strong><?=GetMessage("EX_INDUSTRY")?>:</strong> 
                            <?=$arResult["PROPERTIES"]["BUSINESS_SECTOR"]["VALUE"]?></li>
                        <li><strong><?=GetMessage("EX_COMPANY")?>:</strong> 
                            <?=$arResult["PROPERTIES"]["CLIENT_NAME"]["VALUE"]?></li>
                    </ul>
                </div>
                <div class="portfolio-description">
                    <h2><?=$arResult["NAME"]?></h2>
                    <?=$arResult["DETAIL_TEXT"]?>
                </div>
                <div>
                    <a href="<?=$arResult["SECTION"]["SECTION_PAGE_URL"]?>">
                        <b><?=GetMessage("EX_BACK_TO_LIST")?></b>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>