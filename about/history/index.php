<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("История компании");
$APPLICATION->SetPageProperty("page_text_under_title", "Наш путь к успеху — это история инноваций, роста и достижений.");
?>

<section class="content-page section">
    <div class="container">
        <div class="row gy-5">

            <div class="col-lg-4">
                <div class="service-box">
                    <div class="services-list">
                        <a href="/about/history/"><i class="bi bi-bookshelf"></i><span>История</span></a>
                        <a href="/about/team/"><i class="bi bi-people"></i><span>Команда</span></a>
                        <a href="/about/join/"><i class="bi bi-arrow-right-circle"></i><span>Присоединиться</span></a>
                        <a href="/about/test/"><i class="bi bi-arrow-right-circle"></i><span>Тест</span></a>
                    </div>
                </div>

                <div class="service-box">
                    <h4>Материалы</h4>
                    <div class="download-catalog">
                        <a href="#"><i class="bi bi-filetype-pdf"></i><span>Скачать PDF</span></a>
                        <a href="#"><i class="bi bi-file-earmark-word"></i><span>Скачать DOC</span></a>
                    </div>
                </div>

                <div class="help-box d-flex flex-column justify-content-center align-items-center">
                    <i class="bi bi-headset help-icon"></i>
                    <h4>Вопросы?</h4>
                    <p><i class="bi bi-telephone"></i> +7 000 000 00 00</p>
                    <p><i class="bi bi-envelope"></i> contact@company.ru</p>
                </div>
            </div>

            <div class="col-lg-8 ps-lg-5">

                <div class="page-content-title">
                    <div class="position-relative">
                        <h1><?$APPLICATION->ShowTitle(false);?></h1>
                        <p><?$APPLICATION->ShowProperty("page_text_under_title");?></p>

                        <?$APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            ".default",
                            Array(
                                "START_FROM" => "0",
                                "PATH" => "",
                                "SITE_ID" => SITE_ID
                            )
                        );?>

                    </div>
                </div>

                <img src="<?=DEFAULT_TEMPLATE_PATH?>/assets/img/content/history_1.jpg" alt="" class="img-fluid services-img">
                <h2>Наше начало</h2>
                <p>История нашей компании началась...</p>
                <img src="<?=DEFAULT_TEMPLATE_PATH?>/assets/img/content/history_2.jpg" alt="" class="img-fluid services-img">
                <h2>Ключевые этапы развития</h2>
                <ul>
                    <li>Основание компании</li>
                    <li>Расширение команды</li>
                    <li>Внедрение инноваций</li>
                </ul>

            </div>

        </div>
    </div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>