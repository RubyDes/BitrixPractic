<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @var CBitrixComponentTemplate $this */
?>

<section id="blog-posts" class="blog-posts section">
    <div class="container">
        <div class="row gy-4 mb-4">
            <div class="col-lg-12">
                <div class="search-widget widget-item">
                    <form action="" method="get">
                        <input type="text" name="q" value="<?=isset($arResult["REQUEST"]["QUERY"]) ? htmlspecialcharsbx($arResult["REQUEST"]["QUERY"]) : ''?>">
                        <button type="submit" title="<?=GetMessage("SEARCH_BUTTON")?>">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <?if(isset($arResult["SEARCH"]) && !empty($arResult["SEARCH"])):?>
            <div class="row gy-4">
                <?foreach($arResult["SEARCH"] as $arItem):?>
                    <div class="col-lg-4">
                        <article>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="<?=htmlspecialcharsbx($arItem["URL"])?>"><?=$arItem["TITLE_FORMATED"]?></a>
                                </h5>
                                <?if(!empty($arItem["DATE_CHANGE"])):?>
                                    <h6 class="card-subtitle mb-2 text-muted"><?=$arItem["DATE_CHANGE"]?></h6>
                                <?endif;?>
                                <p class="card-text"><?=$arItem["BODY_FORMATED"]?></p>
                            </div>
                        </article>
                    </div>
                <?endforeach;?>
            </div>
            
            <?if(!empty($arResult["NAV_STRING"])):?>
                <div class="row gy-4 mt-4">
                    <div class="col-lg-12">
                        <?=$arResult["NAV_STRING"]?>
                    </div>
                </div>
            <?endif;?>
            
        <?elseif(isset($arResult["REQUEST"]["QUERY"]) && $arResult["REQUEST"]["QUERY"]):?>
            <div class="row gy-4">
                <div class="col-lg-12">
                    <p class="alert alert-warning"><?=GetMessage("SEARCH_NOTHING")?></p>
                </div>
            </div>
        <?endif;?>
    </div>
</section>