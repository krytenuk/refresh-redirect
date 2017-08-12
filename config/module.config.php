<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'httpRefererContainer' => 'FwsRefreshRedirect\Service\HttpRefererContainerFactory',
        ),
    ),
    'controller_plugins' => array(
        'factories' => array(
            'refreshRedirect' => 'FwsRefreshRedirect\Controller\Plugin\Service\CheckRedirectFactory',
        ),
    ),
);
