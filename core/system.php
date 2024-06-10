<?php

/*function checkControllersName (string $cname): bool
{
    return (bool)preg_match('/^[a-z0-9-]+$/', $cname);
}*/

function template(string $path, array $vars = []): string{
    $systemTemplateRendererInfoFullPath = "views/$path.php";
    extract($vars);
    ob_start();
    include ($systemTemplateRendererInfoFullPath);
    return ob_get_clean();
}

function parseUrl(string $url, array $routes): array
{
    $res = [
        'controller' => 'errors/e404',
        'params' => []
    ];

    foreach ($routes as $route){
        $matches = [];

        if (preg_match($route['url'], $url, $matches)){
            $res['controller'] = $route['controller'];

            if (!empty($route['params'])){
                foreach ($route['params'] as $name => $num){
                    $res['params'][$name] = $matches[$num];
                }
            }

            break;
        }
    }

    // find route, parse params

    return $res;
}


