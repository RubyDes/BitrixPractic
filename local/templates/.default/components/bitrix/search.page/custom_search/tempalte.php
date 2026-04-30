<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<section class="search-page section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="get">
                    <div class="search-form">
                        <input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" class="input-search" placeholder="Поиск...">
                        <input type="submit" value="Найти" class="button-search">
                    </div>
                </form>

                <?if($arResult["REQUEST"]["QUERY"]):?>
                    <div class="search-results">
                        <p>Результаты поиска по запросу: <strong><?=$arResult["REQUEST"]["QUERY"]?></strong></p>
                        
                        <?if(!empty($arResult["SEARCH"])):?>
                            <?foreach($arResult["SEARCH"] as $arItem):?>
                                <div class="search-item">
                                    <h4>
                                        <a href="/portfolio/?ELEMENT_ID=<?=$arItem["ITEM_ID"]?>">
                                            <?=$arItem["TITLE_FORMATED"]?>
                                        </a>
                                    </h4>
                                    <p><?=$arItem["BODY_FORMATED"]?></p>
                                    <span class="search-date"><?=$arItem["DATE_CHANGE"]?></span>
                                </div>
                            <?endforeach;?>
                            
                            <?=$arResult["NAV_STRING"]?>
                        <?else:?>
                            <p>Ничего не найдено.</p>
                        <?endif;?>
                    </div>
                <?endif;?>
            </div>
        </div>
    </div>
</section>