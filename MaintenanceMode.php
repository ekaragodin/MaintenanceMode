<?php
/**
 * Maintenance mode for Yii framework.
 * @author Karagodin Evgeniy (ekaragodin@gmail.com)
 * v 1.0
 */
class MaintenanceMode extends CComponent {

    public $enabledMode = true;
    public $capUrl = 'maintenance/index';
    public $message = "Извините, на сайте ведутся технические работы.";

    public $users = array('admin',);
    public $roles = array('Administrator',);

    public $urls = array();

    public function init() {

        if ($this->enabledMode) {

            $disable = in_array(Yii::app()->user->name, $this->users);
            foreach ($this->roles as $role) {
                $disable = $disable || Yii::app()->user->checkAccess($role);
            }

            $disable = $disable || in_array(Yii::app()->request->getPathInfo(), $this->urls);

            if (!$disable) {
                if ($this->capUrl === 'maintenance/index') {
                    Yii::app()->controllerMap['maintenance'] = 'application.extensions.MaintenanceMode.MaintenanceController';
                }

                Yii::app()->catchAllRequest = array($this->capUrl);
            }
        }

    }

}
