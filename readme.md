
#Maintenance mode for Yii framework.

##Install
Copy extension to your folder path/to/extensions.
Add to config/main.php:

    'preload' => array('log', 'maintenanceMode'),
    ...
    'components' => array(
            'maintenanceMode' => array(
                'class' => 'application.extensions.MaintenanceMode.MaintenanceMode',
            ),
            ...
    ),

##Options

    'maintenanceMode' => array(
        'class' => 'application.extensions.MaintenanceMode.MaintenanceMode',
        'enabledMode' => true,
        'message' => 'Hello!',
        // or
        //'capUrl' => 'site/contact',
        // allowed users
        'users' => array('admin', ),
        // allowed roles
        'roles' => array('Administrator', ),
        // allowed urls
        'urls' => array('/site/login', '/login', ),        
    ),

