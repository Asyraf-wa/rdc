<?php 
	$c_name = $this->request->getParam('controller');
	$a_name = $this->request->getParam('action');
?>

 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
	<a href="<?= $this->Url->build('/') ?>" class="brand-link">
		<?= $this->Html->image('recrud_logo_60x60.png', ['alt' => 'reCRUD', 'class' => 'brand-image img-circle elevation-3', 'style' => 'opacity: .8']); ?>
      <span class="brand-text font-weight-light">Re-CRUD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">




      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->	  
	<li class="nav-item <?= $c_name == 'Users' && $a_name == 'dashboard'?'bg-gray':'' ?>">
		<?php echo $this->Html->link('<i class="nav-icon fas fa-tachometer-alt" aria-hidden="true"></i> ' .__('<p>Dashboard</p>'), ['controller' => 'Users', 'action' => 'dashboard', 'prefix' => false], ['class' => 'nav-link', 'escape' => false]); ?>
	</li>
<?php if ($this->Identity->isLoggedIn() == NULL) { ?>
	<li class="nav-item <?= $c_name == 'Users' && $a_name == 'login'?'bg-gray':'' ?>">
		<?php echo $this->Html->link('<i class="nav-icon fas fa-tachometer-alt" aria-hidden="true"></i> ' .__('<p>Login</p>'), ['controller' => 'Users', 'action' => 'login', 'prefix' => false], ['class' => 'nav-link', 'escape' => false]); ?>
	</li>
<?php } ?>
<?php if ($this->Identity->isLoggedIn()) { ?>
    <?php //echo $username = $this->Identity->get('email'); ?>

	<li class="nav-item <?= $c_name == 'Users' && $a_name == 'index'?'bg-gray':'' ?>">
		<?php echo $this->Html->link('<i class="nav-icon fas fa-tachometer-alt" aria-hidden="true"></i> ' .__('<p>Respondent</p>'), ['controller' => 'Users', 'action' => 'index', 'prefix' => false], ['class' => 'nav-link', 'escape' => false]); ?>
	</li>
	<li class="nav-item <?= $c_name == 'Questions'?'bg-gray':'' ?>">
		<?php echo $this->Html->link('<i class="nav-icon far fa-question-circle" aria-hidden="true"></i> ' .__('<p>Survey</p>'), ['controller' => 'questions', 'action' => 'index', 'prefix' => false], ['class' => 'nav-link', 'escape' => false]); ?>
	</li>	
	<li class="nav-item <?= $c_name == 'Sus'?'bg-gray':'' ?>">
		<?php echo $this->Html->link('<i class="nav-icon far fa-question-circle" aria-hidden="true"></i> ' .__('<p>Usability</p>'), ['controller' => 'sus', 'action' => 'index', 'prefix' => false], ['class' => 'nav-link', 'escape' => false]); ?>
	</li>
	
	<li class="nav-item">
		<?php echo $this->Html->link('<i class="nav-icon fas fa-tachometer-alt" aria-hidden="true"></i> ' .__('<p>Logout</p>'), ['controller' => 'Users', 'action' => 'logout', 'prefix' => false], ['class' => 'nav-link', 'escape' => false]); ?>
	</li>
<?php } ?>	
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>