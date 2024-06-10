<?php
return (function(){
$intGT0 = '[1-9]+\d*';

return [
    [
        'url' => '/^$/',
        'controller' => 'articles/all',
    ],
    [
        'url' => '/^add\/?$/',
        'controller' => 'articles/add'
    ],
    [
        'url' => '/^contacts$/',
        'controller' => 'contacts/contacts'
    ],
    [
        'url' => "/^edit\/($intGT0)\/?$/",
        'controller' => 'articles/edit',
        'params' => ['id' => 1]
    ],
    [
        'url' => "/^delete\/($intGT0)\/?$/",
        'controller' => 'articles/delete',
        'params' => ['id' => 1]
    ],
    [
        'url' => "/^category\/($intGT0)\/?$/",
        'controller' => 'categories/category',
        'params' => ['id' => 1]
    ],
    [
        'url' => "/^article\/($intGT0)\/?$/",
        'controller' => 'articles/article',
        'params' => ['id' => 1]
    ],
    [
        'url' => "/^auth\/login\/?$/",
        'controller' => 'auth/login'
    ]

];
})();

