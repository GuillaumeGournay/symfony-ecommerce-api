<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/category' => [[['_route' => 'categorys', '_controller' => 'App\\Controller\\CategoryController::index'], null, ['GET' => 0], null, true, false, null]],
        '/product' => [[['_route' => 'products', '_controller' => 'App\\Controller\\ProductController::index'], null, ['GET' => 0], null, true, false, null]],
        '/tag' => [[['_route' => 'tags', '_controller' => 'App\\Controller\\TagController::index'], null, ['GET' => 0], null, true, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/category/(?'
                    .'|([^/]++)(*:190)'
                    .'|add(*:201)'
                    .'|([^/]++)(*:217)'
                    .'|edit/([^/]++)(*:238)'
                .')'
                .'|/product/(?'
                    .'|([^/]++)(*:267)'
                    .'|add(*:278)'
                    .'|([^/]++)(*:294)'
                    .'|edit/([^/]++)(*:315)'
                .')'
                .'|/tag/(?'
                    .'|([^/]++)(*:340)'
                    .'|add(*:351)'
                    .'|([^/]++)(*:367)'
                    .'|edit/([^/]++)(*:388)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        190 => [[['_route' => 'category_detail', '_controller' => 'App\\Controller\\CategoryController::detail'], ['id'], ['GET' => 0], null, false, true, null]],
        201 => [[['_route' => 'category', '_controller' => 'App\\Controller\\CategoryController::add'], [], ['POST' => 0], null, false, false, null]],
        217 => [[['_route' => 'category_delete', '_controller' => 'App\\Controller\\CategoryController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        238 => [[['_route' => 'category_edit', '_controller' => 'App\\Controller\\CategoryController::edit'], ['id'], ['PUT' => 0], null, false, true, null]],
        267 => [[['_route' => 'detail_product', '_controller' => 'App\\Controller\\ProductController::detail'], ['id'], ['GET' => 0], null, false, true, null]],
        278 => [[['_route' => 'add_product', '_controller' => 'App\\Controller\\ProductController::add'], [], ['POST' => 0], null, false, false, null]],
        294 => [[['_route' => 'delete_product', '_controller' => 'App\\Controller\\ProductController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        315 => [[['_route' => 'edit_product', '_controller' => 'App\\Controller\\ProductController::edit'], ['id'], ['PUT' => 0], null, false, true, null]],
        340 => [[['_route' => 'tag_detail', '_controller' => 'App\\Controller\\TagController::detail'], ['id'], ['GET' => 0], null, false, true, null]],
        351 => [[['_route' => 'tag', '_controller' => 'App\\Controller\\TagController::add'], [], ['POST' => 0], null, false, false, null]],
        367 => [[['_route' => 'tag_delete', '_controller' => 'App\\Controller\\TagController::delete'], ['id'], ['DELETE' => 0], null, false, true, null]],
        388 => [
            [['_route' => 'tag_edit', '_controller' => 'App\\Controller\\TagController::edit'], ['id'], ['PUT' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
