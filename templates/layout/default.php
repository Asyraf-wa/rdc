<?php
use Cake\Routing\Router;

?>
<?php
$cakeDescription = $system_abbr; //: Leading the CRUD Innovation
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex,nofollow">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
	<?= $this->Html->css('adminlte.css') ?>
	<?= $this->Html->css('font-awesome/all.css') ?>
	<?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'); ?>
	<?= $this->Html->script('qr-code-styling-1-5-0.min.js'); ?>
	<?= $this->Html->css('dark-mode.css') ?>
	
	<?= $this->Html->css('ticker.css') ?>
	<?= $this->Html->script('ticker.js', ['block' => 'scriptBottom']); ?>
	<?php //echo $this->Html->script('jquery/jquery.min.js', ['block' => 'scriptBottom']); ?>
	<?= $this->Html->script('bootstrap/js/bootstrap.bundle.min.js', ['block' => 'scriptBottom']); ?>
	<?= $this->Html->script('adminlte.min.js', ['block' => 'scriptBottom']); ?>
	<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">	

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php echo $this->element('navbar/navbar_public'); ?>
		<?php echo $this->element('sidebar/sidebar_public'); ?>
		<div class="content-wrapper">
			<div class="header_details">
				<div class="row">
					<div class="col-md-8">
						<div class="header_details_intro"><?php //echo $system_name; ?></div>
						<div class="header_details_intro_sub">
						</div>
					</div>
					<div class="col-md-4">
						<div class="header_details_intro2 float-right">
          <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="darkSwitch">
            <label class="custom-control-label" for="darkSwitch"></label>Dark Mode
          </div>
		  
		  <?= $this->Html->script('dark-mode-switch.min.js'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="content">
				<div class="container-fluid">
				<?= $this->Flash->render() ?>
				<?= $this->fetch('content') ?>
				</div>
			</div>
		</div>
  <footer class="main-footer">
    <strong>Copyright &copy; 2021. <?= $system_name; ?>: Leading the CRUD Innovation</strong> by <a href="http://codethepixel.com">Asyraf_wa</a>.
    All rights reserved. 
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> <?= $version; ?>
    </div>
  </footer>
			<aside class="control-sidebar control-sidebar-dark">
				<!-- Control sidebar content goes here -->
			</aside>
	</div>
<?= $this->fetch('scriptBottom') ?>
</body>
</html>
