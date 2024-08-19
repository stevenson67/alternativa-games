<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> - <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="header">
        <div class="header-content">
            <a href="<?php echo get_home_url(); ?>" class="logo">
                <div class="logo-image">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="Logo">
                </div>
            </a>
            <nav class="nav-menu">
                <a href="#" aria-current="page">Новости<div class="background"></div></a>
                <a href="#">Скины<div class="background"></div></a>
                <a href="#">Медиа<div class="background"></div></a>
            </nav>
            <div class="second-menu">
                <a target="_blank" rel="noopener" href="#">Киберспорт</a>
                <a target="_blank" rel="noopener" href="#">Вики</a>
                <a target="_blank" rel="noopener" href="#">Форум</a>
            </div>
            <div class="header-news-wrapper">
                <a class="header-news" href="#" style="opacity: 0; pointer-events: none;">
                    <div class="icon" style="background-image: url(https://tankionline.com/ru/wp-content/uploads/2023/03/videoblognew_7070.png)"></div>
                    <div class="info">
                        <div class="title">Видеоблог №510</div>
                        <div class="counter">1/8</div>
                    </div>
                    <div class="progress"></div>
                </a>
            </div>
        </div>
    </header>