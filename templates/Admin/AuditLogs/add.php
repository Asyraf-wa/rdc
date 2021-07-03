<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuditLog $auditLog
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
				<div class="panel_card2_title"><?= __('Add Audit Log') ?></div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body">
            <?= $this->Form->create($auditLog) ?>
            <fieldset>
				<div class="form-group">
					<?php echo $this->Form->control('transaction', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('type', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('primary_key', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('source', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('parent_source', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('original', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('changed', ['class' => 'form-control','required' => false]); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->control('meta', ['class' => 'form-control','required' => false]); ?>
				</div>
<label>Retention Duration</label>
	<?php 
	$sixMonth = date('Y-m-d', strtotime(date("Y-m-d") . ' 6 Month'));
	$oneYear = date('Y-m-d', strtotime(date("Y-m-d") . ' 1 Year'));
	$threeYear = date('Y-m-d', strtotime(date("Y-m-d") . ' 3 Year'));
	$fiveYear = date('Y-m-d', strtotime(date("Y-m-d") . ' 5 Year'));
	$sevenYear = date('Y-m-d', strtotime(date("Y-m-d") . ' 7 Year'));
	?>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'rm_retention',
				[
					['value' => $sixMonth, 'text' => '6 Month'],
					['value' => $oneYear, 'text' => '1 Year'],
					['value' => $threeYear, 'text' => '3 Year'],
					['value' => $fiveYear, 'text' => '5 Year'],
					['value' => $sevenYear, 'text' => '7 Year'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('rm_retention')) {
				echo $this->Form->error('rm_retention', 'Please select retention duration');
			} ?>
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
