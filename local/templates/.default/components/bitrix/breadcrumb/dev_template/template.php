<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<nav class="breadcrumbs">
    <ol>
        <?php
        $itemsCount = count($arResult);
        for ($i = 0; $i < $itemsCount; $i++):
            $item = $arResult[$i];
            $isLast = ($i == $itemsCount - 1);
            
            if ($isLast):
        ?>
            <li class="current"><?=$item["TITLE"]?></li>
        <?php
            else:
        ?>
            <li><a href="<?=$item["LINK"]?>"><?=$item["TITLE"]?></a></li>
        <?php
            endif;
        endfor;
        ?>
    </ol>
</nav>