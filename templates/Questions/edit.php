<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
?>
<?php
	echo $this->Html->css('select2/css/select2.css');
	echo $this->Html->script('select2/js/select2.full.min.js');
	echo $this->Html->css('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css');
	echo $this->Html->script('https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js');
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

<div class="card2">
	<div class="header">
		<div class="panel_card2_title">Legend</div>
		<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
	<div class="body">
<div class="row">
	<div class="col-md-9">
<table class="table table-hover table-bordered">
	<tr>
		<th>Scale point</th>
		<th>Definition of scale point</th>
		<th>Score</th>
	</tr>
	<tr>
		<td>Make things worse</td>
		<td>Cause Confusion. The way the feature is implemented makes it difficult to use and/or encouraged incorrect use of the feature.</td>
		<td class="bg-danger text-center">-1</td>
	</tr>
	<tr>
		<td>No support</td>
		<td>Fails to recognise it. The feature is not supported nor referred to in the user manual.</td>
		<td class="bg-warning text-center">0</td>
	</tr>
	<tr>
		<td>Partly support</td>
		<td>The feature is supported indirectly, for example by the use of other tool features in non-standard combinations.</td>
		<td class="bg-primary text-center">0.5</td>
	</tr>
	<tr>
		<td>Full support</td>
		<td>The feature appears explicitly in the feature list of the tools and user manual. All aspects of the feature are covered.</td>
		<td class="bg-success text-center">1</td>
	</tr>
</table>
	</div>
	<div class="col-md-3">
<table class="table table-hover table-bordered">
	<tr>
		<th>Level of importance</th>
		<th>Acronym</th>
	</tr>
	<tr>
		<td>Mandatory</td>
		<td class="bg-success text-center">M</td>
	</tr>
	<tr>
		<td>Highly desirable</td>
		<td class="bg-primary text-center">HD</td>
	</tr>
	<tr>
		<td>Desirable</td>
		<td class="bg-warning text-center">D</td>
	</tr>
	<tr>
		<td>Nice to have</td>
		<td class="bg-danger text-center">N</td>
	</tr>
</table>
	</div>
</div>
	</div>
</div>
		
		
		
		<div class="card2">
		  <div class="header">
				<div class="panel_card2_title"><?= __('Add Question') ?></div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body table-responsive">
            <?= $this->Form->create($question) ?>
            <fieldset>
			
<table id="main_index" class="table table-hover table-bordered">	
	<tr>
		<th></th>
		<th>Features Description</th>
		<th>Scoring scale</th>
		<th>Feature level of importance</th>
	</tr>
<!--SF1 Start-->
	<tr>
		<td>SF-1</td>
		<td width="40%"><b>Code Automation</b><br>The automation of code generation for persistent storage</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf1_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf1_s')) {
				echo $this->Form->error('sf1_s', 'Please select score for SF-1');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf1_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf1_l')) {
				echo $this->Form->error('sf1_l', 'Please select level of importance for SF-1');
			} ?>
	</div>
		</td>
	</tr>
<!--SF1 End-->

<!--SF2 Start-->
	<tr>
		<td>SF-2</td>
		<td><b>Authentication and Authorization</b><br>Provides a role-based access control mechanism web application to offer protection from unauthorized access. </td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf2_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf2_s')) {
				echo $this->Form->error('sf2_s', 'Please select score for SF-2');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf2_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf2_l')) {
				echo $this->Form->error('sf2_l', 'Please select level of importance for SF-2');
			} ?>
	</div>
		</td>
	</tr>
<!--SF2 End-->

<!--SF3 Start-->
	<tr>
		<td>SF-3</td>
		<td><b>Inventory</b><br>a descriptive listing of each record series or system, together with an indication of the location, access and other pertinent data</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf3_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf3_s')) {
				echo $this->Form->error('sf3_s', 'Please select score for SF-3');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf3_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf3_l')) {
				echo $this->Form->error('sf3_l', 'Please select level of importance for SF-3');
			} ?>
	</div>
		</td>
	</tr>
<!--SF3 End-->

<!--SF4 Start-->
	<tr>
		<td>SF-4</td>
		<td><b>Search</b><br>Ability to locate and retrieve data/record based on specific metadata, keyword or phrases</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf4_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf4_s')) {
				echo $this->Form->error('sf4_s', 'Please select score for SF-4');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf4_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf4_l')) {
				echo $this->Form->error('sf4_l', 'Please select level of importance for SF-4');
			} ?>
	</div>
		</td>
	</tr>
<!--SF4 End-->

<!--SF5 Start-->
	<tr>
		<td>SF-5</td>
		<td><b>Audit Trail</b><br>provides log tracking for any changes to the electronic records to ensure that validity and integrity</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf5_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf5_s')) {
				echo $this->Form->error('sf5_s', 'Please select score for SF-5');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf5_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf5_l')) {
				echo $this->Form->error('sf5_l', 'Please select level of importance for SF-5');
			} ?>
	</div>
		</td>
	</tr>
<!--SF5 End-->

<!--SF6 Start-->
	<tr>
		<td>SF-6</td>
		<td><b>Transfer and sharing</b><br>ability to transfer or share the record (internal to external or external to internal) in a single data or bulk data</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf6_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf6_s')) {
				echo $this->Form->error('sf6_s', 'Please select score for SF-6');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf6_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf6_l')) {
				echo $this->Form->error('sf6_l', 'Please select level of importance for SF-6');
			} ?>
	</div>
		</td>
	</tr>
<!--SF6 End-->

<!--SF7 Start-->
	<tr>
		<td>SF-7</td>
		<td><b>Reporting</b><br>provides a summary related to the current status of records such as total records, active, inactive, the total required appraisal attention and others</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf7_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf7_s')) {
				echo $this->Form->error('sf7_s', 'Please select score for SF-7');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf7_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf7_l')) {
				echo $this->Form->error('sf7_l', 'Please select level of importance for SF-7');
			} ?>
	</div>
		</td>
	</tr>
<!--SF7 End-->

<!--SF8 Start-->
	<tr>
		<td>SF-8</td>
		<td><b>Retention</b><br>list how long each record series must be kept (the retention period), when the retention period starts (the cut-off), and the proper way to dispose of the record once retention is met (the disposition method)</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf8_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf8_s')) {
				echo $this->Form->error('sf8_s', 'Please select score for SF-8');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf8_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf8_l')) {
				echo $this->Form->error('sf8_l', 'Please select level of importance for SF-8');
			} ?>
	</div>
		</td>
	</tr>
<!--SF8 End-->

<!--SF9 Start-->
	<tr>
		<td>SF-9</td>
		<td><b>Appraisal</b><br>the process of determining the archival value and ultimate disposition of records. Appraisal decisions are informed by several factors including the historical, legal, operational and financial value of the records</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf9_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf9_s')) {
				echo $this->Form->error('sf9_s', 'Please select score for SF-9');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf9_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf9_l')) {
				echo $this->Form->error('sf9_l', 'Please select level of importance for SF-9');
			} ?>
	</div>
		</td>
	</tr>
<!--SF9 End-->

<!--SF10 Start-->
	<tr>
		<td>SF-10</td>
		<td><b>Archiving</b><br>the records will be permanently stored, inactive but accessible for future references  </td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf10_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf10_s')) {
				echo $this->Form->error('sf10_s', 'Please select score for SF-10');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf10_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf10_l')) {
				echo $this->Form->error('sf10_l', 'Please select level of importance for SF-10');
			} ?>
	</div>
		</td>
	</tr>
<!--SF10 End-->

<!--SF11 Start-->
	<tr>
		<td>SF-11</td>
		<td><b>Disposition</b><br>the process of destruction of records</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf11_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf11_s')) {
				echo $this->Form->error('sf11_s', 'Please select score for SF-11');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf11_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf11_l')) {
				echo $this->Form->error('sf11_l', 'Please select level of importance for SF-11');
			} ?>
	</div>
		</td>
	</tr>
<!--SF11 End-->

<!--SF12 Start-->
	<tr>
		<td>SF-12</td>
		<td><b>Others</b><br>the UI and others supporting component that supports the web application design and data presentation is working</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf12_s',
				[
					['value' => '-1', 'text' => 'Worst'],
					['value' => '0', 'text' => 'No'],
					['value' => '0.5', 'text' => 'Partial'],
					['value' => '1', 'text' => 'Full'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf12_s')) {
				echo $this->Form->error('sf12_s', 'Please select score for SF-12');
			} ?>
	</div>
		</td>
		<td>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'sf12_l',
				[
					['value' => 'N', 'text' => 'Nice To Have'],
					['value' => 'D', 'text' => 'Desirable'],
					['value' => 'HD', 'text' => 'Highly Desirable'],
					['value' => 'M', 'text' => 'Mandatory'],
				],
				['class' => 'form-control','required' => false]
			);
			if ($this->Form->isFieldError('sf12_l')) {
				echo $this->Form->error('sf12_l', 'Please select level of importance for SF-12');
			} ?>
	</div>
		</td>
	</tr>
<!--SF12 End-->
</table>	

				<div class="form-group">
					<?php echo $this->Form->control('comment', ['class' => 'form-control','required' => false, 'id' => 'summernote']); ?>
				</div>	

            </fieldset>
		  </div>
				<div class="card-footer pull-right">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-primary btn-flat']) ?>
				  <?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary btn-flat']) ?>
				  <?= $this->Form->end() ?>
                </div>
		</div>
		
<script>
$(document).ready(function() {
	$('#summernote').summernote({
		placeholder: 'Insert your email content here',
        //tabsize: 10,
        height: 300
		
	});
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  $(".input select").select2();
});
</script>
