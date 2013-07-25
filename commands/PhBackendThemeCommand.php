<?php

/**
 * Class file.
 * @author    Tobias Munk <schmunk@usrbin.de>
 * @link      http://www.phundament.com/
 * @copyright Copyright &copy; 2005-2011 diemeisterei GmbH
 * @license   http://www.phundament.com/license/
 */

/**
 * Command to install this theme
 * @author  Tobias Munk <schmunk@usrbin.de>
 * @package p3extensions.commands
 * @since   1.0.0
 */
class PhBackendThemeCommand extends CConsoleCommand
{
    public $themePath = 'application.themes'; // view files
    public $themeName = 'backend2'; // theme name in application

    public function getHelp()
    {
        echo <<<EOS
n/a
EOS;
    }

    /**
     * Copies theme files into `themePath`.`themeName`
     *
     * @param type $args
     */
    public function run($args)
    {
        $srcPath   = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR;
        $themePath = realpath(Yii::getPathOfAlias($this->themePath));
        if (!is_dir($themePath)) {
            echo "\nInvalid 'themePath', aborting.";
            return;
        }
        echo "\nDeploying phundament/backend-theme package contents to theme folder as '{$this->themeName}' ...\n";
        $backendViews = $this->buildFileList(
            $srcPath . 'theme',
            $themePath . DIRECTORY_SEPARATOR . $this->themeName
        );
        $this->copyFiles($backendViews);
    }

}

?>
