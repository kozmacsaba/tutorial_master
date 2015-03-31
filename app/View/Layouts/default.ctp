<?php
/**
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

$cakeDescription = __d('cake_dev', 'Tutorial Masters');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
                echo $this->Html->css('bootstrap.min');
                echo $this->Html->css('style');
                echo $this->Html->css('plugin/dataTables/jquery.dataTables');
                echo $this->Html->css('plugin/highlight/default');
                
                echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
        
</head>
<body>
    <div class="container">
        <div class="col-md-12">
            <div id="header">
                <div class="logo">
                    Tutorial Masters
                </div>
                <div class="col-md-6">
                    <ul class="menu">
                        <li><?php echo $this->Html->link('Leirasok', array('controller' => 'tutorials', 'action' => 'tutorial_list'))?></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <?php if ($this->Session->read('Auth.User')): ?>
                        <div class="pull-right">
                            Udvozlunk az oldalon <?php echo $this->Html->link(($this->Session->read('Auth.User.username')), array('controller' => 'users', 'action' => 'edit', ($this->Session->read('Auth.User.id'))), array('class' => 'username')) ?>.
                            <?php echo $this->Html->link('Kijelentkezes', array('controller' => 'users', 'action' => 'logout'), array('class' => 'logut')); ?>
                        </div>
                    <?php  else: ?>
                        <?php echo $this->Html->link('Bejelentkezes', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-default pull-right')) ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div id="content">
                <div class="col-md-3">
                    <?php if (AuthComponent::user('id')){ ?>
                        <?php if (AuthComponent::user('role') == 1){ ?>
                            <div id="admin_menu_bg">
                                <h3>Admin menu</h3>
                                <ul class="admin_menu">
                                    <li><?php echo $this->Html->link('Felhasznalok', array('controller' => 'users', 'action' => 'user_list')) ?></li>
                                    <li><?php echo $this->Html->link('Tutorialok', array('controller' => 'tutorials', 'action' => 'admin_tutorial_list')) ?></li>
                                    <li><?php echo $this->Html->link('Tesztek', array('controller' => '', 'action' => '')) ?></li>
                                </ul>
                            </div>
                        <?php } ?>
                    <?php } ?>
                    <div id="main_menu">
                        <h3>Main menu</h3>
                        <ul class="subsection_menu">
                        <?php if(AuthComponent::user('id')){ ?>
                            <li><?php echo $this->Html->link('Tutorial letrehozas', array('controller' => 'tutorials', 'action' => 'tutorial_created')) ?></li>
                            <li><?php echo $this->Html->link('Sajat tutorialok', array('controller' => 'tutorials', 'action' => 'user_tutorial_list')) ?></li>
                            <li><?php echo $this->Html->link('Tesztek keszitese', array('controller' => '', 'action' => '')) ?></li>
                            <li><?php echo $this->Html->link('Sajat teszteim', array('controller' => '', 'action' => '')) ?></li>
                        <?php }else{ ?> 
                            <li><?php echo $this->Html->link('Kuldjel te is leirasat', array('controller' => '', 'action' => '')) ?></li>    
                        <?php } ?>
                        </ul>    
                    </div>    
                </div>
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
	
    <?php
    echo $this->Html->script('jquery-1.11.2.min');
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('main');
    echo $this->Html->script('plugin/dataTables/jquery.dataTables.min');
    echo $this->Html->script('plugin/dataTables/jquery.dataTables.columnFilter');
    echo $this->Html->script('plugin/openmanagerdemo/openmanagerdemo/jscripts/tiny_mce/tiny_mce');
    echo $this->Html->script('plugin/highlight/highlight.pack');
    echo $this->Html->script('dataTableList');
    ?>
    
    <script type="text/javascript">
        $(document).ready(function(){
            
                $('.reset_password').val("");
            
        })
    </script>
    
    <script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "openmanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks,|,openmanager",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		
		//Open Manager Options
		file_browser_callback: "openmanager",
		open_manager_upload_path: '../../../../uploads/',

		
		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
    </script>
    <script type="text/javascript">
        if (document.location.protocol == 'file:') {
                alert("The examples might not work properly on the local file system due to security settings in your browser. Please use a real webserver.");
        }
    </script>
    <script>
        $(document).ready(function() {
            $('pre').each(function(i, block) {
                hljs.highlightBlock(block);
            });
        });
    </script>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
