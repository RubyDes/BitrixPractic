<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="portfolio-details section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="portfolio-details-slider">
                    <?if($arResult["DETAIL_PICTURE"]["SRC"]):?>
                        <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" class="img-fluid">
                    <?elseif($arResult["PREVIEW_PICTURE"]["SRC"]):?>
                        <img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" alt="<?=$arResult["NAME"]?>" class="img-fluid">
                    <?else:?>
                        <img src="<?=DEFAULT_TEMPLATE_PATH?>/assets/img/portfolio/portfolio_1.jpg" alt="<?=$arResult["NAME"]?>" class="img-fluid">
                    <?endif;?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3>Проект</h3>
                    <ul>
                        <li><strong>Услуги:</strong> <?=$arResult["PROPERTIES"]["SERVICES"]["VALUE"]?></li>
                        <li><strong>Отрасль:</strong> <?=$arResult["PROPERTIES"]["INDUSTRY"]["VALUE"]?></li>
                        <li><strong>Компания:</strong> <?=$arResult["PROPERTIES"]["COMPANY"]["VALUE"]?></li>
                    </ul>
                </div>
                <div class="portfolio-description">
                    <h2><?=$arResult["NAME"]?></h2>
                    <?=$arResult["DETAIL_TEXT"]?>
                </div>
                <div>
                    <a href="/portfolio/?SECTION_ID=<?=$arResult["SECTION"]["ID"]?>"><b>В список</b></a>
                </div>
            </div>
        </div>
    </div>
</section>