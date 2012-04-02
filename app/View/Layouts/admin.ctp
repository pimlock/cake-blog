<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$pageTitle = __('Blog') . ' - ' . __('Admin Panel');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $pageTitle ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('reset');
        echo $this->Html->css('blog');
        echo $this->Html->css('cake.generic');
        echo $this->Html->css('960');
        echo $this->Html->css('text');

        echo $scripts_for_layout;
    ?>
</head>
<body>
<div id="container" class="container_12">
    <div id="header">
        <h1><?php echo $this->Html->link($pageTitle, '/admin'); ?></h1>
    </div>
    <?php
        $user = AuthComponent::user();
        if ($user) {
            $info = $this->Html->div('logged', __('Logged in as: <strong>%s</strong>', $user['username']));
            $info .= $this->Html->link(__('Log out'), array('controller' => 'users', 'action' => 'logout'));

            echo $this->Html->div('grid_12', $info, array('id' => 'userInfo'));
        }
    ?>
    <div id="content" class="grid_12">
        <?php echo $this->Session->flash(); ?>
        <?php echo $content_for_layout; ?>
    </div>
    <div id="footer">
        <?php
            echo $this->Html->link(
                $this->Html->image('cake.power.gif', array('alt' => 'CakePHP', 'border' => '0')),
                'http://www.cakephp.org/',
                array('target' => '_blank', 'escape' => false)
            );
        ?>
    </div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>