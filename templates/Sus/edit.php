<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sus $sus
 */
?>
<style>
.verticaltext{
    width:1px;
    word-wrap: break-word;
}
</style>
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
				<div class="panel_card2_title">Re-CRUD System Usability Evaluation</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body justify">
			Instruction:
		<ul>
			<li>Please complete the case study and evaluate the feature first before proceed with Re-CRUD system usability evaluation</li>
			<li>All question is compulsory. The total question is 10. The first 5 questions is related on effectiveness and the rest focused on efficiency</li>
			<li>The rating is based on 5 points Likert scale where it is anchored with <b class="text-red">one (1) as Strongly Disagree</b> and <b class="text-primary">five (5) as Strongly Agree</b> </li>
		</ul>
		  </div>
		</div>
		
	</div>
	<div class="col-md-8">
		<div class="card2">
		  <div class="header">
				<div class="panel_card2_title"><?= __('Re-CRUD System Usability Scale (SUS) ') ?></div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body">
            <?= $this->Form->create($sus) ?>
            <fieldset>
<table class="table table-hover table-bordered">
	<tr class="text-center">
		<th class="bg-gray"></th>
		<th class="bg-gray"><br>#</th>
		<th class="bg-gray"><br>Question</th>
		<td class="bg-gray">
<div class="row">
	<div class="col-md-4 text-center">
1<br>Strongly<br>Disagree
	</div>
	<div class="col-md-4 text-center">
	
	</div>
	<div class="col-md-4 text-center">
5<br>Strongly<br>Agree
	</div>
</div>
		</td>
	</tr>
	<tr>
		<td rowspan="5" class="bg-blue"><p class="verticaltext"><br><br>EFFECTIVENESS</p></td>
		<td class="text-center">1</td>
		<td>It allows me to accomplish my tasks.</td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q1',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q1')) {
						echo $this->Form->error('q1', 'Please select score for Question 1');
					} ?>
			</div>	
		</td>
	</tr>
	<tr>
		<td class="text-center">2</td>
		<td>I think I would not need a system with more features for my tasks.</td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q2',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q2')) {
						echo $this->Form->error('q2', 'Please select score for Question 2');
					} ?>
			</div>	
		</td>
	</tr>
	<tr>
		<td class="text-center">3</td>
		<td>I would not need to supplement Re-CRUD with anadditional one.</td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q3',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q3')) {
						echo $this->Form->error('q3', 'Please select score for Question 3');
					} ?>
			</div>	
		</td>
	</tr>
	<tr>
		<td class="text-center">4</td>
		<td>I found the system unnecessarily complex.</td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q4',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q4')) {
						echo $this->Form->error('q4', 'Please select score for Question 4');
					} ?>
			</div>	
		</td>
	</tr>
	<tr>
		<td class="text-center">5</td>
		<td>This system’s capabilities would meet myrequirements.</td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q5',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q5')) {
						echo $this->Form->error('q5', 'Please select score for Question 5');
					} ?>
			</div>	
		</td>
	</tr>
	<tr>
		<td rowspan="5" class="bg-yellow"><p class="verticaltext"><br><br><br>EFFICIENCY</p></td>
		<td class="text-center">6</td>
		<td>It saves me time when I use it.</td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q6',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q6')) {
						echo $this->Form->error('q6', 'Please select score for Question 6');
					} ?>
			</div>	
		</td>
	</tr>
	<tr>
		<td class="text-center">7</td>
		<td>I found the various functions in this system were well integrated.</td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q7',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q7')) {
						echo $this->Form->error('q7', 'Please select score for Question 7');
					} ?>
			</div>	
		</td>
	</tr>
	<tr>
		<td class="text-center">8</td>
		<td>I tend to reduce a lot of mistakes with this system. </td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q8',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q8')) {
						echo $this->Form->error('q8', 'Please select score for Question 8');
					} ?>
			</div>	
		</td>
	</tr>
	<tr>
		<td class="text-center">9</td>
		<td>I don’t make many errors with this system. </td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q9',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q9')) {
						echo $this->Form->error('q9', 'Please select score for Question 9');
					} ?>
			</div>	
		</td>
	</tr>
	<tr>
		<td class="text-center">10</td>
		<td>I don’t have to spend a lot of time correcting things with this system</td>
		<td class="text-center">
			<div class="radio-toolbar2">
				<?php echo $this->Form->radio(
						'q10',
						[
							['value' => '1', 'text' => '1'],
							['value' => '2', 'text' => '2'],
							['value' => '3', 'text' => '3'],
							['value' => '4', 'text' => '4'],
							['value' => '5', 'text' => '5'],
						],
						['class' => 'form-control','required' => false]
					);
					if ($this->Form->isFieldError('q10')) {
						echo $this->Form->error('q10', 'Please select score for Question 10');
					} ?>
			</div>	
		</td>
	</tr>
</table>


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
