<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="portfolio-sections section">
    <div class="container">
        <div class="row gy-4">
            <?foreach($arResult["SECTIONS"] as $arSection):?>
                <div class="col-lg-6">
                    <div class="service-item position-relative">
                        <div class="img">
                            <?if($arSection["PICTURE"]["SRC"]):?>
                                <img src="<?=$arSection["PICTURE"]["SRC"]?>" class="img-fluid" alt="<?=$arSection["NAME"]?>">
                            <?else:?>
                                <img src="<?=DEFAULT_TEMPLATE_PATH?>/assets/img/services-1.jpg" class="img-fluid" alt="">
                            <?endif;?>
                        </div>
                        <div class="details">
                            <a href="/portfolio/?SECTION_ID=<?=$arSection["ID"]?>">
                                <?=$arSection["NAME"]?>
                            </a>
                            <p><?=$arSection["DESCRIPTION"]?></p>
                        </div>
                    </div>
                </div>
            <?endforeach;?>
        </div>
    </div>
</section>