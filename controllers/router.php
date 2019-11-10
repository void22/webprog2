<?php
    // __autoload is deprecated
    spl_autoload_register(function($className)
    {
        $file = SERVER_ROOT . 'models/' . strtolower($className) . '.php';
        if(file_exists($file)) {
            include_once($file);
        }
        else {
            die("File '$file' containing class '$className' not found.");
        }
    });

    session_start();

    if (!isset($_SESSION['wp2uid'])) {
        $_SESSION['wp2uid'] = 0;
    }
        
    if (!isset($_SESSION['wp2firstname'])) {
        $_SESSION['wp2firstname'] = "";
    }

    if (!isset($_SESSION['wp2lastname'])) {
        $_SESSION['wp2lastname'] = "";
    }

    if (!isset($_SESSION['wp2ulevel'])) {
        $_SESSION['wp2ulevel'] = "1__";
    }

    include(SERVER_ROOT . 'includes/database.inc.php');
    include(SERVER_ROOT . 'includes/menu.inc.php');

    $page = "home";
    $subpage = "";
    $vars = array();

    $request = $_SERVER['QUERY_STRING'];

    if ($request != "") {
        $params = explode('/', $request);
        $page = array_shift($params);

        if (array_key_exists($page, Menu::$menu) && count($params) > 0) {
            $subpage = array_shift($params);
            if (!(array_key_exists($subpage, Menu::$menu) && Menu::$menu[$subpage][1] == $page)) {
                $vars[] = $subpage;
                $subpage = "";
            }
        }

        $vars += $_POST;
        
        foreach ($params as $p) {
            $vars[] = $p;
        }

        // Need for REST calls
        if (isset($_GET['id'])) {
            $vars['id'] = $_GET['id'];
        }
    }

    $controllerfile = $page . ($subpage != "" ? "_" . $subpage : "");
    $target = SERVER_ROOT . 'controllers/' . $controllerfile . '.php';

    if (!file_exists($target)) {
        $controllerfile = "error404";
        $target = SERVER_ROOT . 'controllers/error404.php';
    }

    include_once($target);
    $class = ucfirst($controllerfile) . 'Controller';
    if(class_exists($class)) {
        $controller = new $class;
    }
    else {
        die('class does not exists!');
    }

    $controller->main($vars);
?>