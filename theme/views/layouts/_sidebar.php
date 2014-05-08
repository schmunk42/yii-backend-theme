<div id="backend-sidebar">
    <?php
    Yii::import('p3pages.modules.*');

    $page = P3Page::getActivePage();
    if ($page !== null) {
        $translation = $page->getTranslationModel();
    } else {
        $translation = null;
    }

    #echo CHtml::image('https://github.com/phundament/app/wiki/images/logo_phundament3.png');

    $this->widget(
        'TbMenu',
        array(
             'type'  => 'list',
             'items' => array(
                 array(
                     'label' => Yii::t('app', 'Home'),
                     'icon'  => 'home',
                     'url'   => Yii::app()->homeUrl,
                 ),
                 array('label' => Yii::t('app', 'Application')),
                 array(
                     'label'   => Yii::t('app', 'Dashboard'),
                     'icon'    => 'list-alt',
                     'url'     => array('/p3admin/default/index'),
                     'visible' => Yii::app()->user->checkAccess('Editor')
                 ),
                 array(
                     'label'   => Yii::t('app', 'Overview'),
                     'icon'    => 'cog',
                     'url'     => array('/p3admin/default/overview'),
                     'visible' => Yii::app()->user->checkAccess('Admin')
                 ),
                 '---',
                 array('label' => Yii::t('app', 'Pages')),
                 array(
                     'label'   => Yii::t('app', 'Sitemap'),
                     'icon'    => 'list',
                     'url'     => array('/p3pages/default/index'),
                     'visible' => Yii::app()->user->checkAccess('P3pages.Default.*')
                 ),
                 array('label' => Yii::t('app', 'Media')),
                 array(
                     'label'   => Yii::t('app', 'Browser'),
                     'icon'    => 'th',
                     'url'     => array('/p3media/default/browser'),
                     'visible' => Yii::app()->user->checkAccess('P3media.Default.*')
                 ),
                 array(
                     'label'   => Yii::t('app', 'Upload'),
                     'icon'    => 'upload',
                     'url'     => array('/p3media/import/upload'),
                     'visible' => Yii::app()->user->checkAccess('P3media.Import.*')
                 ),
                 array(
                     'label'   => Yii::t('app', 'Local File Scan'),
                     'icon'    => 'circle-arrow-up',
                     'url'     => array('/p3media/import/scan'),
                     'visible' => Yii::app()->user->checkAccess('P3media.Import.Scan')
                 ),
                 array('label' => Yii::t('app', 'Widgets')),
                 array(
                     'label'   => Yii::t('app', 'Registry'),
                     'icon'    => 'list-alt',
                     'url'     => array('/p3widgets/default/index'),
                     'visible' => Yii::app()->user->checkAccess('P3widgets.Default.*')
                 ),
                 array('label' => Yii::t('app', 'Translations')),
                 array(
                     'label'   => Yii::t('app', 'Dictionaries'),
                     'icon'    => 'globe',
                     'url'     => array('/translate/edit/admin'),
                     'visible' => Yii::app()->user->checkAccess('Translate.*')
                 ),
                 array(
                     'label'   => Yii::t('app', 'Translate Missing'),
                     'icon'    => 'flag',
                     'url'     => array('/translate/edit/missing'),
                     'visible' => Yii::app()->user->checkAccess('Translate.*')
                 ),
                 '---',
                 array('label' => Yii::t('app', 'Users')),
                 array(
                     'label'   => Yii::t('app', 'Accounts'),
                     'icon'    => 'user',
                     'url'     => array('/user/admin/admin'),
                     'visible' => Yii::app()->user->checkAccess('Admin')
                 ),
                 array('label' => Yii::t('app', 'Rights')),
                 array(
                     'label'   => Yii::t('app', 'Assignments'),
                     'icon'    => 'briefcase',
                     'url'     => array('/rights/assignment/view'),
                     'visible' => Yii::app()->user->checkAccess('Admin')
                 ),
                 array(
                     'label'   => Yii::t('app', 'Permissions'),
                     'icon'    => 'certificate',
                     'url'     => array('/rights/authItem/permissions'),
                     'visible' => Yii::app()->user->checkAccess('Admin')
                 ),
                 array(
                     'label'   => Yii::t('app', 'Roles'),
                     'icon'    => 'star',
                     'url'     => array('/rights/authItem/roles'),
                     'visible' => Yii::app()->user->checkAccess('Admin')
                 ),
             ),
        )
    );
    ?>
</div>
