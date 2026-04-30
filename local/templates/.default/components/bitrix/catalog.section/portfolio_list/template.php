<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="portfolio section">
    <div class="container">
        <div class="row gy-4">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $img = CFile::ResizeImageGet(
                    $arItem["PREVIEW_PICTURE"]["ID"],
                    array("width" => 370, "height" => 250),
                    BX_RESIZE_IMAGE_PROPORTIONAL,
                    true
                );
                $src = ($img["src"]) ? $img["src"] : DEFAULT_TEMPLATE_PATH . "/assets/img/portfolio/portfolio_1.jpg";
                ?>
                <div class="col-lg-4">
                    <article>
                        <div class="post-img">
                            <img src="<?=$src?>" alt="<?=$arItem["NAME"]?>" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h5 class="title">
                                <a href="/portfolio/?SECTION_ID=<?=$arResult["SECTION"]["ID"]?>&ELEMENT_ID=<?=$arItem["ID"]?>">
                                    <?=$arItem["NAME"]?>
                                </a>
                            </h5>
                            <p class="card-text"><?=$arItem["PREVIEW_TEXT"]?></p>
                        </div>
                    </article>
                </div>
            <?endforeach;?>
        </div>
    </div>
</section>