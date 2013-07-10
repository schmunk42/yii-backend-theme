<?php
Yii::import('p3pages.modules.*');

$page = P3Page::getActivePage();
if ($page !== null) {
    $translation = $page->getTranslationModel();
} else {
    $translation = null;
}

$this->widget(
    'TbMenu',
    array(
         'type'  => 'list',
         'items' => array(
             array('label' => Yii::t('app', 'Application')),
             array(
                 'label'   => Yii::t('app', 'Dashboard'),
                 'icon'    => 'list-alt',
                 'url'     => array('/p3admin/default/index'),
                 'visible' => Yii::app()->user->checkAccess('Editor')
             ),
             array(
                 'label'   => Yii::t('app', 'Settings'),
                 'icon'    => 'cog',
                 'url'     => array('/p3admin/default/settings'),
                 'visible' => Yii::app()->user->checkAccess('Admin')
             ),
             '---',
             array('label' => Yii::t('app', 'Pages')),
             array(
                 'label'   => Yii::t('app', 'Translation'),
                 'icon'    => 'pencil',
                 'url'     => array(
                     '/p3pages/p3PageTranslation/create',
                     'returnUrl'         => getenv('REQUEST_URI'),
                     'P3PageTranslation' => array(
                         'p3_page_id' => ($page) ? $page->id : null,
                         'language'   => Yii::app()->language
                     )
                 ),
                 'visible' => Yii::app()->user->checkAccess(
                     'P3pages.P3PageTranslation.*'
                 ) && $page && !$translation
             ),
             array(
                 'label'   => Yii::t('app', 'Translation'),
                 'icon'    => 'pencil',
                 'url'     => array(
                     '/p3pages/p3PageTranslation/update',
                     'returnUrl' => getenv('REQUEST_URI'),
                     'id'        => ($translation) ? $translation->id : null
                 ),
                 'visible' => Yii::app()->user->checkAccess(
                     'P3pages.P3PageTranslation.*'
                 ) && $page && $translation
             ),
             array(
                 'label'   => Yii::t('app', 'Template'),
                 'icon'    => 'wrench',
                 'url'     => array(
                     '/p3pages/p3Page/update',
                     'id'        => ($page) ? $page->id : null,
                     'returnUrl' => getenv('REQUEST_URI')
                 ),
                 'visible' => Yii::app()->user->checkAccess('P3pages.P3PageTranslation.*') && $page
             ),
             array(
                 'label'   => Yii::t('app', 'Append Child Page'),
                 'icon'    => 'plus',
                 'url'     => array(
                     '/p3pages/p3Page/createChild',
                     'returnUrl'  => getenv('REQUEST_URI'),
                     'P3PageMeta' => array(
                         'treeParent_id' => ($page) ? $page->id : null,
                     )
                 ),
                 'visible' => Yii::app()->user->checkAccess('P3pages.P3Page.*') && $page
             ),
             array(
                 'label'   => Yii::t('app', 'Append Sibling Page'),
                 'icon'    => 'plus-sign',
                 'url'     => array(
                     '/p3pages/p3Page/createChild',
                     'returnUrl'  => getenv('REQUEST_URI'),
                     'P3PageMeta' => array(
                         'treeParent_id' => ($page && $page->getParent()) ? $page->getParent()->id :
                             null
                     )
                 ),
                 'visible' => Yii::app()->user->checkAccess('P3pages.P3Page.*') && $page
             ),
             array(
                 'label'   => Yii::t('app', 'Sitemap'),
                 'icon'    => 'list',
                 'url'     => array('/p3pages/default/index'),
                 'visible' => Yii::app()->user->checkAccess('P3pages.Default.*')
             ),

             array('label' => Yii::t('app', 'Media')),
             array(
                 'label'   => Yii::t('app', 'Upload'),
                 'icon'    => 'circle-arrow-up',
                 'url'     => array('/p3media/import/upload'),
                 'visible' => Yii::app()->user->checkAccess('P3media.Import.*')
             ),
             array(
                 'label'   => Yii::t('app', 'Browse'),
                 'icon'    => 'th',
                 'url'     => array('/p3media/default/index'),
                 'visible' => Yii::app()->user->checkAccess('P3media.Default.*')
             ),
             array('label' => Yii::t('app', 'Widgets')),
             array(
                 'label'   => Yii::t('app', 'Manage'),
                 'icon'    => 'list-alt',
                 'url'     => array('/p3widgets/default/index'),
                 'visible' => Yii::app()->user->checkAccess('P3widgets.Default.*')
             ),
             '---',
             array('label' => Yii::t('app', 'Users')),
             array(
                 'label'   => Yii::t('app', 'Manage'),
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