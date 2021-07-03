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
				<div class="panel_card2_title"><?= __('Add User') ?></div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body">
            <?= $this->Form->create($user) ?>
            <fieldset>
			
				<div class="form-group">
					<?php echo $this->Form->control('fullname', ['class' => 'form-control','required' => false]); ?>
				</div>
				
				<div class="form-group">
					<?php echo $this->Form->control('email', ['class' => 'form-control','required' => false]); ?>
				</div>
				
<div class="row">
	<div class="col-md-6">
				<div class="form-group">
					<?php echo $this->Form->control('username', ['class' => 'form-control','required' => false]); ?>
				</div>	
	</div>
	<div class="col-md-6">
				<div class="form-group">
					<?php echo $this->Form->control('password', ['class' => 'form-control','required' => false]); ?>
				</div>
	</div>
</div>

				<div class="form-group">
					<?php echo $this->Form->control('current_working_post', ['class' => 'form-control','required' => false]); ?>
				</div>

<label>Gender</label>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'gender',
				[
					['value' => 'Male', 'text' => 'Male'],
					['value' => 'Female', 'text' => 'Female'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('gender')) {
				echo $this->Form->error('gender', 'Please select gender');
			} ?>
	</div>

<label>Age</label>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'age',
				[
					['value' => '21-25', 'text' => '21-25'],
					['value' => '26-30', 'text' => '26-30'],
					['value' => '31-35', 'text' => '31-35'],
					['value' => '36-40', 'text' => '36-40'],
					['value' => '41-45', 'text' => '41-45'],
					['value' => '46-50', 'text' => '46-50'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('age')) {
				echo $this->Form->error('age', 'Please select age range');
			} ?>
	</div>

<label>Highest qualification</label>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'highest_qualification',
				[
					['value' => 'PhD', 'text' => 'PhD'],
					['value' => 'Master Degree', 'text' => 'Master Degree'],
					['value' => 'Bachelor Degree', 'text' => 'Bachelor Degree'],
					['value' => 'Diploma', 'text' => 'Diploma'],
					['value' => 'High School', 'text' => 'High School'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('highest_qualification')) {
				echo $this->Form->error('highest_qualification', 'Please select your highest qualification');
			} ?>
	</div>


				
<label>Software development experiences</label>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'dev_experience',
				[
					['value' => '< 3 years', 'text' => '< 3 years'],
					['value' => '3 - 6 years', 'text' => '3 - 6 years'],
					['value' => '> 6 years', 'text' => '> 6 years'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('dev_experience')) {
				echo $this->Form->error('dev_experience', 'Please select your software development experiences');
			} ?>
	</div>		

<label>Software application major sector</label>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'dev_sector',
				[
					['value' => 'Web', 'text' => 'Web'],
					['value' => 'Mobile', 'text' => 'Mobile'],
					['value' => 'Desktop', 'text' => 'Desktop'],
					['value' => 'Cloud', 'text' => 'Cloud'],
					['value' => 'IoT', 'text' => 'IoT'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('dev_sector')) {
				echo $this->Form->error('dev_sector', 'Please select your major development sector');
			} ?>
	</div>
	

<label>Primary programming language you used</label>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'primary_language',
				[
					['value' => 'PHP', 'text' => 'PHP'],
					['value' => 'Java', 'text' => 'Java'],
					['value' => 'Python', 'text' => 'Python'],
					['value' => 'C', 'text' => 'C'],
					['value' => 'C++', 'text' => 'C++'],
					['value' => 'Other', 'text' => 'Other'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('primary_language')) {
				echo $this->Form->error('primary_language', 'Please select your major development sector');
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
