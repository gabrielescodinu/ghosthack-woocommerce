<!DOCTYPE html>
<html lang="<?php $lang = get_bloginfo('language'); ?>">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php wp_head(); ?>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.svg">
    <!-- tailwind css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- google icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <!-- meta tags -->
    <meta name="title" content="<?php echo get_the_title() ?>">
    <meta name="description" content="">

    <title> <?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(); ?> </title>
</head>

<body class="bg-gray-950">
    <?php include(get_template_directory() . '/components/navbar.php'); ?>