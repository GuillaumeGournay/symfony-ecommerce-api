<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
    'categorys' => [[], ['_controller' => 'App\\Controller\\CategoryController::index'], [], [['text', '/category/']], [], []],
    'category_detail' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/category']], [], []],
    'category' => [[], ['_controller' => 'App\\Controller\\CategoryController::add'], [], [['text', '/category/add']], [], []],
    'category_delete' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/category']], [], []],
    'category_edit' => [['id'], ['_controller' => 'App\\Controller\\CategoryController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/category/edit']], [], []],
    'products' => [[], ['_controller' => 'App\\Controller\\ProductController::index'], [], [['text', '/product/']], [], []],
    'detail_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], []],
    'add_product' => [[], ['_controller' => 'App\\Controller\\ProductController::add'], [], [['text', '/product/add']], [], []],
    'delete_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product']], [], []],
    'edit_product' => [['id'], ['_controller' => 'App\\Controller\\ProductController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/product/edit']], [], []],
    'tags' => [[], ['_controller' => 'App\\Controller\\TagController::index'], [], [['text', '/tag/']], [], []],
    'tag_detail' => [['id'], ['_controller' => 'App\\Controller\\TagController::detail'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/tag']], [], []],
    'tag' => [[], ['_controller' => 'App\\Controller\\TagController::add'], [], [['text', '/tag/add']], [], []],
    'tag_delete' => [['id'], ['_controller' => 'App\\Controller\\TagController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/tag']], [], []],
    'tag_edit' => [['id'], ['_controller' => 'App\\Controller\\TagController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/tag/edit']], [], []],
];
