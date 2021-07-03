<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php
	echo $this->Html->css('select2/css/select2.css');
	echo $this->Html->script('select2/js/select2.full.min.js');
	echo $this->Html->script('ckeditor/ckeditor');
	$c_name = $this->request->getParam('controller');
?>

<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">

			<?= $this->Html->link(__('<i class="far fa-trash-alt"></i> Dispose'), ['action' => 'transferDisposed', $user->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#disposed' . $user->id, 'escape' => false]) ?>
			
			<?= $this->Html->link(__('<i class="fas fa-list"></i> List'), ['action' => 'index'], ['class' => 'dropdown-item', 'escape' => false]) ?>
  </div>
</div>
</div>

<div class="row">
	<div class="col-md-4">	
		<div class="card2">
		  <div class="header">
				<div class="panel_card2_title">Term and Conditions</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body">
			You need to comply the followings terms:
		<ul>
			<li>All information is true &amp; valid</li>
			<li>All registered information is belong to the system.</li>
		</ul>
		  </div>
		</div>
		
	</div>
	<div class="col-md-8">
		<div class="card2">
		  <div class="header">
				<div class="panel_card2_title"><?= __('Edit User') ?></div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body">
            <?= $this->Form->create($user) ?>
            <fieldset>
				<div class="form-group">
					<?php echo $this->Form->control('username', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('password', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('email', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('fullname', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('age', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('gender', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('highest_qualification', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('current_working_post', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('dev_experience', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('dev_sector', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('primary_language', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('status', ['class' => 'form-control','required' => false]); ?>
				</div>
            </fieldset>
		  </div>
				<div class="card-footer pull-right">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-primary btn-flat']) ?>
				  <?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary btn-flat']) ?>
				  <?= $this->Form->end() ?>
                </div>
		</div>
	</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
  $(".input select").select2();
});
</script>
<!--Disposed Modal-->
<div class="modal fade" id="disposed<?= $user->id; ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-danger">
		<div class="modal-header">
			<h4 class="modal-title">Disposition Request</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<ul class="">
				<li>You're requesting to dispose the record id: <strong><?= $user->id; ?></strong> from <strong><?= $c_name; ?></strong> repository.</li>
				<li>Please note that this operation is not reversible</li>
				<li>The record will be disposed and recorded into the disposal list</li>
				<li>This disposition is authorized by <strong><?= $auth_username; ?> (<?= $auth_email; ?>)</strong> on <?= date('F d, Y'); ?></li>
			</ul>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-light btn-flat" data-dismiss="modal">No</button>
			<?= $this->Form->postLink(__('Yes'), ['action' => 'transferDisposed', $user->id], ['class' => 'btn btn-outline-light btn-flat']); ?>
		</div>
		</div>
	</div>
</div>
