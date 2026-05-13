<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
?>

<section class="portfolio-sections section">
    <div class="container">
        <div class="row gy-4">
            <?foreach($arResult["SECTIONS"] as $arSection):?>
                <?
                $src = "";
                if (!empty($arSection["PICTURE"]["ID"])) {
                    $img = CFile::ResizeImageGet(
                        $arSection["PICTURE"]["ID"],
                        array("width" => 1024, "height" => 1024),
                        BX_RESIZE_IMAGE_PROPORTIONAL,
                        true
                    );
                    $src = $img["src"];
                }
                
                if (empty($src)) {
                    $src = DEFAULT_TEMPLATE_PATH . "/assets/img/services-1.jpg";
                }
                ?>
                <div class="col-lg-6">
                    <div class="service-item position-relative">
                        <div class="img">
                            <img src="<?=$src?>" class="img-fluid" alt="<?=$arSection["NAME"]?>">
                        </div>
                        <div class="details">
                            <a href="<?=$arSection["SECTION_PAGE_URL"]?>">
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
