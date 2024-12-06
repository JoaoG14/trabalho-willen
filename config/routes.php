<?php 

$commonRoutes = array(
    '/'                             => 'SiteController/home',
    'dashboard'                     => 'PanelController/home',
    'dashboard/login'               => 'PanelController/login',
    'logout'                        => 'PanelController/logout',
    'dashboard/contatos'            => 'PanelController/contacts',
    'dashboard/pessoas'             => 'PanelController/users',
    'dashboard/pessoa-adicionar'    => 'PanelController/addUser',
    'dashboard/pessoa-editar'       => 'PanelController/editUser',
    'pedido'                        => 'SiteController/pedido',
    'menu'                          => 'SiteController/menu'
);

$commonPost = array(
    'submitform'        => 'SiteCheckController/submitform',
    'validateuser'      => 'AdminCheckController/validateuser',
    'userlogin'         => 'AdminCheckController/userlogin',
    'removeContact'     => 'ContactsController/removeContact',
    'getContact'        => 'ContactsController/getContact',
    'removePerson'      => 'UsersController/removePerson',
    'submituser'        => 'UsersController/submituser',
    'validateemail'     => 'UsersCheckController/validateemail',
    'validadecpfuser'   => 'UsersCheckController/validadecpfuser',
);

$commonRoutes = array_merge($commonRoutes, $commonPost);

return $commonRoutes;
