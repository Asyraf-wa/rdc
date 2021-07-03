<?php
	echo $this->Html->css('select2/css/select2.css');
	echo $this->Html->script('select2/js/select2.full.min.js');
	echo $this->Html->script('ckeditor/ckeditor');
	$c_name = $this->request->getParam('controller');
?>

<?php 
//read session data
$session = $this->request->getSession();
//echo $session->read('slug'); ?>
<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="far fa-file-pdf"></i> PDF'), ['action' => 'pdf', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
  </div>
</div>	
</div>

<p id="casestudy" class="panel_card2_title text-center"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jul 24, 2021 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="casestudy"
  document.getElementById("casestudy").innerHTML = days + " <code>Days</code> " + hours + " <code>Hours</code> "
  + minutes + " <code>Minutes</code> " + seconds + " <code>Seconds</code> ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("casestudy").innerHTML = "EXPIRED";
  }
}, 1000);
</script>



<?php //echo $user->id; ?>
<?php 
//fullname
if ($user->fullname == NULL){
	$fullname_count = 0;
}else
	$fullname_count = 1;
//email
if ($user->email == NULL){
	$email_count = 0;
}else
	$email_count = 1;
//age
if ($user->age == NULL){
	$age_count = 0;
}else
	$age_count = 1;
//gender
if ($user->gender == NULL){
	$gender_count = 0;
}else
	$gender_count = 1;
//highest_qualification
if ($user->highest_qualification == NULL){
	$highest_qualification_count = 0;
}else
	$highest_qualification_count = 1;
//current_working_post
if ($user->current_working_post == NULL){
	$current_working_post_count = 0;
}else
	$current_working_post_count = 1;
//dev_experience
if ($user->dev_experience == NULL){
	$dev_experience_count = 0;
}else
	$dev_experience_count = 1;
//dev_sector
if ($user->dev_sector == NULL){
	$dev_sector_count = 0;
}else
	$dev_sector_count = 1;
//primary_language
if ($user->primary_language == NULL){
	$primary_language_count = 0;
}else
	$primary_language_count = 1;
?>

<?php //echo $email_count; ?>

<?php //echo $current_working_post_count; ?>

<?php
	$counter = ($fullname_count + $email_count + $age_count + $gender_count + $highest_qualification_count + $current_working_post_count + $dev_experience_count + $dev_sector_count + $primary_language_count) / 9 * 100;
	//echo $counter;
?>





<div class="row">
	<div class="col-md-6">
		<div class="card2">
			<div class="header bg-blue">
				<div class="panel_card2_title">Instruction</div>
				<div class="panel_card2_subtitle_wht"><?= $organization_name; ?></div>
			</div>
			<div class="body">
<i class="far fa-comment-alt"></i> <?php echo $this->Html->link('Click here', ['controller' => 'Pages', 'action' => 'home', '_full' => true], ['target' => '_blank']); ?> to read the case study instruction.
			</div>
		</div>
	
	
	
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Section A: Demographic</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">
			
<div class="panel_card2_title text-center"><?php echo $this->Number->precision($counter, 2); ?>% Completed</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $counter; ?>%;">
  </div>
</div>

<hr>

            <?= $this->Form->create($user) ?>
            <fieldset>
			
				<div class="form-group">
					<?php echo $this->Form->control('fullname', ['class' => 'form-control','required' => false]); ?>
				</div>
				

				
<div class="row">
	<div class="col-md-6">
				<div class="form-group">
					<?php echo $this->Form->control('email', ['class' => 'form-control','required' => false, 'disabled'=> 'disabled']); ?>
				</div>
	</div>
	<div class="col-md-6">
				<div class="form-group">
					<?php echo $this->Form->control('current_working_post', ['class' => 'form-control','required' => false]); ?>
				</div>
	</div>
</div>


<div class="row">
	<div class="col-md-4">
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
	</div>
	<div class="col-md-8">
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
	</div>
</div>



<label>Highest qualification</label>
	<div class="radio-toolbar">
		<?php echo $this->Form->radio(
				'highest_qualification',
				[
					['value' => 'High School', 'text' => 'High School'],
					['value' => 'Diploma', 'text' => 'Diploma'],
					['value' => 'Bachelor Degree', 'text' => 'Bachelor Degree'],
					['value' => 'Master Degree', 'text' => 'Master Degree'],
					['value' => 'PhD', 'text' => 'PhD'],
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
	<div class="col-md-6">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Section B: Re-CRUD Evaluation</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">

<?php //echo $total_question; ?>
<?php //echo $total_sus; ?>



				<table class="table table-hover table-bordered">
					<tr class="bg-primary text-center">
						<td width="5%">#</td>
						<td width="40%">Evaluation &amp; Response</td>
						<td>Completed</td>
						<td width="15%">Menu</td>
					</tr>
<!--CASE STUDY START-->
					<tr>
						<td class="text-center">1</td>
						<td>Case study evaluation</td>
						<td class="text-center">
						<?php if ($total_question == 1): ?>
							<?php if (!empty($user->questions)) : ?>
							<?php foreach ($user->questions as $questions) : ?>
<?php 
//sf1
if ($questions->sf1_s == NULL){
	$sf1_s_count = 0;
}else
	$sf1_s_count = 1;

if ($questions->sf1_l == NULL){
	$sf1_l_count = 0;
}else
	$sf1_l_count = 1;
//sf2
if ($questions->sf2_s == NULL){
	$sf2_s_count = 0;
}else
	$sf2_s_count = 1;

if ($questions->sf2_l == NULL){
	$sf2_l_count = 0;
}else
	$sf2_l_count = 1;
//sf3
if ($questions->sf3_s == NULL){
	$sf3_s_count = 0;
}else
	$sf3_s_count = 1;

if ($questions->sf3_l == NULL){
	$sf3_l_count = 0;
}else
	$sf3_l_count = 1;
//sf4
if ($questions->sf4_s == NULL){
	$sf4_s_count = 0;
}else
	$sf4_s_count = 1;

if ($questions->sf4_l == NULL){
	$sf4_l_count = 0;
}else
	$sf4_l_count = 1;
//sf5
if ($questions->sf5_s == NULL){
	$sf5_s_count = 0;
}else
	$sf5_s_count = 1;

if ($questions->sf5_l == NULL){
	$sf5_l_count = 0;
}else
	$sf5_l_count = 1;
//sf6
if ($questions->sf6_s == NULL){
	$sf6_s_count = 0;
}else
	$sf6_s_count = 1;

if ($questions->sf6_l == NULL){
	$sf6_l_count = 0;
}else
	$sf6_l_count = 1;
//sf7
if ($questions->sf7_s == NULL){
	$sf7_s_count = 0;
}else
	$sf7_s_count = 1;

if ($questions->sf7_l == NULL){
	$sf7_l_count = 0;
}else
	$sf7_l_count = 1;
//sf8
if ($questions->sf8_s == NULL){
	$sf8_s_count = 0;
}else
	$sf8_s_count = 1;

if ($questions->sf8_l == NULL){
	$sf8_l_count = 0;
}else
	$sf8_l_count = 1;
//sf9
if ($questions->sf9_s == NULL){
	$sf9_s_count = 0;
}else
	$sf9_s_count = 1;

if ($questions->sf9_l == NULL){
	$sf9_l_count = 0;
}else
	$sf9_l_count = 1;
//sf10
if ($questions->sf10_s == NULL){
	$sf10_s_count = 0;
}else
	$sf10_s_count = 1;

if ($questions->sf10_l == NULL){
	$sf10_l_count = 0;
}else
	$sf10_l_count = 1;
//sf11
if ($questions->sf11_s == NULL){
	$sf11_s_count = 0;
}else
	$sf11_s_count = 1;

if ($questions->sf11_l == NULL){
	$sf11_l_count = 0;
}else
	$sf11_l_count = 1;
//sf12
if ($questions->sf12_s == NULL){
	$sf12_s_count = 0;
}else
	$sf12_s_count = 1;

if ($questions->sf12_l == NULL){
	$sf12_l_count = 0;
}else
	$sf12_l_count = 1;

$count_answered_questions = ($sf1_s_count + $sf1_l_count + $sf2_s_count + $sf2_l_count + $sf3_s_count + $sf3_l_count + $sf4_s_count + $sf4_l_count + $sf5_s_count + $sf5_l_count + $sf6_s_count + $sf6_l_count + $sf7_s_count + $sf7_l_count + $sf8_s_count + $sf8_l_count + $sf9_s_count + $sf9_l_count + $sf10_s_count + $sf10_l_count + $sf11_s_count + $sf11_l_count + $sf12_s_count + $sf12_l_count)*100/24;

//echo $count_answered_questions;
echo $this->Number->precision($count_answered_questions, 0);
?>%

<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $count_answered_questions; ?>%;">
  </div>
</div>
							<?php endforeach; ?>
							<?php endif; ?>
						<?php endif; ?>
						<?php if ($total_question == 0): ?>
							0%
						<?php endif; ?>
						</td>
						<td class="text-center">
						<?php if ($total_question == 0): ?>
							<?php echo $this->Html->link(__('<i class="far fa-edit"></i> Respond'), ['controller' => 'questions', 'action' => 'add'], ['class' => 'btn btn-outline-primary btn-xs btn-flat', 'escape' => false]); ?>
						<?php endif; ?>
						<?php if ($total_question == 1): ?>
							<?php if (!empty($user->questions)) : ?>
							<?php foreach ($user->questions as $questions) : ?>
<?php //echo h($questions->id) ?>
<?php //echo h($questions->user_id) ?>
								<?= $this->Html->link(__('<i class="far fa-edit"></i> Respond'), ['controller' => 'Questions', 'action' => 'edit', $questions->id], ['class' => 'btn btn-outline-primary btn-xs', 'escape' => false]) ?>
							<?php endforeach; ?>
							<?php endif; ?>
						<?php endif; ?>
						</td>
					</tr>
<!--CASE STUDY END-->
<!--SUS START-->
					<tr>
						<td class="text-center">2</td>
						<td>Re-CRUD Usability</td>
						<td class="text-center">
						<?php if ($total_sus == 1): ?>
							<?php if (!empty($user->sus)) : ?>
							<?php foreach ($user->sus as $sus) : ?>
<?php 
//q1
if ($sus->q1 == NULL){
	$q1_count = 0;
}else
	$q1_count = 1;
//q2
if ($sus->q2 == NULL){
	$q2_count = 0;
}else
	$q2_count = 1;
//q3
if ($sus->q3 == NULL){
	$q3_count = 0;
}else
	$q3_count = 1;
//q4
if ($sus->q4 == NULL){
	$q4_count = 0;
}else
	$q4_count = 1;
//q5
if ($sus->q5 == NULL){
	$q5_count = 0;
}else
	$q5_count = 1;
//q6
if ($sus->q6 == NULL){
	$q6_count = 0;
}else
	$q6_count = 1;
//q7
if ($sus->q7 == NULL){
	$q7_count = 0;
}else
	$q7_count = 1;
//q8
if ($sus->q8 == NULL){
	$q8_count = 0;
}else
	$q8_count = 1;
//q9
if ($sus->q9 == NULL){
	$q9_count = 0;
}else
	$q9_count = 1;
//q10
if ($sus->q10 == NULL){
	$q10_count = 0;
}else
	$q10_count = 1;

$count_answered_sus = ($q1_count + $q2_count + $q3_count + $q4_count + $q5_count + $q6_count + $q7_count + $q8_count + $q9_count + $q10_count)*100/10;

echo $this->Number->precision($count_answered_sus, 0);
?>%

<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: <?= $count_answered_sus; ?>%;">
  </div>
</div>
<?php //echo $count_answered_sus; ?>

							<?php endforeach; ?>
							<?php endif; ?>
						<?php endif; ?>
						<?php if ($total_sus == 0): ?>
							0%
						<?php endif; ?>
						</td>
						<td class="text-center">
						<?php if ($total_sus == 0): ?>
							<?php echo $this->Html->link(__('<i class="far fa-edit"></i> Respond'), ['controller' => 'Sus', 'action' => 'add'], ['class' => 'btn btn-outline-primary btn-sm btn-xs', 'escape' => false]); ?>
						<?php endif; ?>
						<?php if ($total_sus == 1): ?>
							<?php if (!empty($user->sus)) : ?>
							<?php foreach ($user->sus as $sus) : ?>
								<?= $this->Html->link(__('<i class="far fa-edit"></i> Respond'), ['controller' => 'Sus', 'action' => 'edit', $sus->id], ['class' => 'btn btn-outline-primary btn-xs', 'escape' => false]) ?>
							<?php endforeach; ?>
							<?php endif; ?>
						<?php endif; ?>
						</td>
					</tr>
<!--SUS END-->
				</table>	

			</div>
		</div>
	</div>
</div>