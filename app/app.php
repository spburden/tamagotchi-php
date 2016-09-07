<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tamagotchi.php";

    session_start();

    if (empty($_SESSION['tamagotchiStats'])) {
        $_SESSION['tamagotchiStats'] = "";
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array ('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('tamagotchi-form.html.twig');
    });

    $app->post("/new_tamagotchi", function() use ($app) {
        $tamagotchi = new Tamagotchi($_POST['name']);
        $tamagotchi->save();
        return $app['twig']->render('new_tamagotchi.html.twig', array('yourTamagotchi' => $tamagotchi));
    });

    $app->post("/play", function() use ($app) {
        $tamagotchi = $_SESSION['tamagotchiStats'];
        $tamagotchi->play();
        return $app['twig']->render('new_tamagotchi.html.twig', array('yourTamagotchi' => $tamagotchi));
    });

    $app->post("/feed", function() use ($app) {
        $tamagotchi = $_SESSION['tamagotchiStats'];
        $tamagotchi->feed();
        return $app['twig']->render('new_tamagotchi.html.twig', array('yourTamagotchi' => $tamagotchi));
    });

    $app->post("/sleep", function() use ($app) {
        $tamagotchi = $_SESSION['tamagotchiStats'];
        $tamagotchi->sleep();
        return $app['twig']->render('new_tamagotchi.html.twig', array('yourTamagotchi' => $tamagotchi));
    });



    return $app;
?>
