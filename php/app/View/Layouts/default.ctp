<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
        echo "<link href='//fonts.googleapis.com/css?family=Raleway:500,400' rel='stylesheet' type='text/css'>";
        echo "<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,400,300,700' rel='stylesheet' type='text/css'>";

		echo $this->Html->css('normalize');
		echo $this->Html->css('foundation.min');
		echo $this->Html->css('becalm');
		echo $this->Html->css('icomoon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<header>
            <div class="main-header clearfix">
                <h1 class="left">becalm</h1>
                <div class="header-settings right">
                    <ul>
                        <li><a href="#" class="button round small blue">Panic!</a></li>
                        <li class="gear"><a href="#" class="button round small blue icon">cog</a></li>
                        <li class="avatar"><a href="#" class="avatar-icon"><img src="" alt="avatar" /></a></li>
                    </ul>
                    
                </div>
            </div>
            <div class="sub-header">
            	<nav>
                      <?php echo $this->Html->link(
            'Login ',
            array('manager' => false, 'controller' => 'users', 'action' => 'login')
        ); 
            echo $this->Html->link(
            'Logout ',
            array('manager' => false, 'controller' => 'users', 'action' => 'logout')
        );
            echo $this->Html->link(
            'Register',
            array('manager' => false, 'controller' => 'users', 'action' => 'add')
        );
        ?>
        <a href="" class="mood" data-icon="B">Link</a>
        <a href="" class="icon icon-camera">Link</a>
          
          		</nav>
            </div>
		</header>
        
        
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>]
	</div>
	
	<footer>
		<div class="main-footer">
			<p>&copy; becalm | disclaimer</p>
		</div>
	</footer>
	<?php
	// Remove this sql_dump to allow DebugKit to handle more advanced SQL display
	// echo $this->element('sql_dump');
	?>
</body>
</html>
