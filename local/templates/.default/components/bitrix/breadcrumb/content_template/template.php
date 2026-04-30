 <?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<nav class="breadcrumbs">
    <ol>
        <?php
        $itemsCount = count($arResult);
        if ($itemsCount > 0):
            for ($i = 0; $i < $itemsCount - 1; $i++):
                $item = $arResult[$i];
                ?>
                <li>
                    <a href="<?=$item["LINK"]?>"><?=$item["TITLE"]?></a>
                </li>
                <?php
            endfor;
        endif;
        ?>
    </ol>
</nav>