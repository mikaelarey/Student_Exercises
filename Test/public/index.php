<?php

    // Query string from the URL
    $url = $_SERVER["QUERY_STRING"];

    // List ng routes/pages
    $routes = array(
        'contacts',
        'products'
    );

    // Kapag empty ung query string or equal sa home i-render ung home.php
    if ($url == '' || strtolower($url) == 'home') {

        require_once '../pages/home.php';
    }
    else {

        // Route match default sa false
        $route_match = false;

        // Loop sa routes/pages array
        foreach ($routes as $route) {

            // compare ung URL query string sa bawat route/pages list
            if (strtolower($url) == strtolower($route)) {

                // pag match ung url sa list ng page render ung page
                require_once '../pages/' . strtolower($route) . '.php';

                // set ung route match sa true
                $route_match = true;

                // stop ung loop pag nahanap ung match n page
                break;
            }
        }

        // kapag hindi nag match sa list ng pages/routes i-render un 404 page
        if (!$route_match)
            require_once '../pages/404.php';
    }

?>