<!DOCTYPE html>
<html>
<head>
<?= $this->Html->css('pdf.css', ['fullBase' => true]) ?>
<?= $this->Html->css('font-awesome/all.css', ['fullBase' => true]) ?>
<style>
.text-red {
    color: #dc3545;
}
.boxed {
    text-align: center;
    border: 1px solid silver;
    vertical-align: top;
}
.bg-success, .bg-success > a {
    color: #ffffff !important;
}
.bg-success {
    background-color: #28a745 !important;
}
.bg-primary, .bg-primary > a {
    color: #ffffff !important;
}
.bg-primary {
    background-color: #007bff !important;
}
.bg-warning, .bg-warning > a {
    color: #1F2D3D !important;
}
.bg-warning {
    background-color: #ffc107 !important;
}
.bg-danger, .bg-danger > a {
    color: #ffffff !important;
}
.bg-danger {
    background-color: #dc3545 !important;
}
table {
  border-collapse: collapse;
}
tr.border-bottom td {
        border-bottom: 1pt solid #ff000d;
      }
</style>
</head>
<body>
<div class="header">
<?= $this->Html->image('reCRUD_banner.jpg', ['fullBase' => true, 'width'=>'100%']); ?>
</div>

<div class="content">

<div class="title">Section A: Demographic</div>
<br>
<table>
	<tr>
		<td>Name</td>
		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td><?= h($user->fullname) ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td><?= h($user->email) ?></td>
	</tr>
	<tr>
		<td>Gender</td>
		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td><?= h($user->gender) ?></td>
	</tr>
	<tr>
		<td>Current working post</td>
		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td><?= h($user->current_working_post) ?></td>
	</tr>
	<tr>
		<td>Highest academic qualification</td>
		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td><?= h($user->highest_qualification) ?></td>
	</tr>
	<tr>
		<td>Development experiences</td>
		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td><?= h($user->dev_experience) ?></td>
	</tr>
	<tr>
		<td>Development sector</td>
		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td><?= h($user->dev_sector) ?></td>
	</tr>
	<tr>
		<td>Primary programming language used</td>
		<td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
		<td><?= h($user->primary_language) ?></td>
	</tr>
</table>
<br>
<hr>
<div class="title">Section B(I): Case Study</div>
<br>
<?php if (!empty($user->questions)) : ?>
	<?php foreach ($user->questions as $questions) : ?>
		<?php //echo $questions->user_id; ?>		
<table width="100%">
	<tr>
		<th width="5%"></th>
		<th>Features Description</th>
		<th width="7%">Score</th>
		<th width="7%">LOI</th>
	</tr>
<!--SF1 Start-->
	<tr valign="top">
		<td>SF1</td>
		<td><b>Code Automation</b><br>The automation of code generation for persistent storage</td>
		<td>
			<?php if ($questions->sf1_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf1_s) . '</div>';
			}elseif  ($questions->sf1_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf1_s) . '</div>';
			}elseif  ($questions->sf1_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf1_s) . '</div>';
			}elseif  ($questions->sf1_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf1_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf1_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf1_l) . '</div>';
			}elseif  ($questions->sf1_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf1_l) . '</div>';
			}elseif  ($questions->sf1_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf1_l) . '</div>';
			}elseif  ($questions->sf1_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf1_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF1 End-->

<!--SF2 Start-->
	<tr valign="top">
		<td>SF2</td>
		<td><b>Authentication and Authorization</b><br>Provides a role-based access control mechanism to offer protection from unauthorized access</td>
		<td>
			<?php if ($questions->sf2_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf2_s) . '</div>';
			}elseif  ($questions->sf2_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf2_s) . '</div>';
			}elseif  ($questions->sf2_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf2_s) . '</div>';
			}elseif  ($questions->sf2_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf2_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf2_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf2_l) . '</div>';
			}elseif  ($questions->sf2_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf2_l) . '</div>';
			}elseif  ($questions->sf2_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf2_l) . '</div>';
			}elseif  ($questions->sf2_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf2_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF2 End-->
<!--SF3 Start-->
	<tr valign="top">
		<td>SF3</td>
		<td><b>Inventory</b><br>a descriptive listing of each record series or system, together with an indication of the location, access and other pertinent data</td>
		<td>
			<?php if ($questions->sf3_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf3_s) . '</div>';
			}elseif  ($questions->sf3_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf3_s) . '</div>';
			}elseif  ($questions->sf3_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf3_s) . '</div>';
			}elseif  ($questions->sf3_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf3_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf3_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf3_l) . '</div>';
			}elseif  ($questions->sf3_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf3_l) . '</div>';
			}elseif  ($questions->sf3_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf3_l) . '</div>';
			}elseif  ($questions->sf3_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf3_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF3 End-->
<!--SF4 Start-->
	<tr valign="top">
		<td>SF4</td>
		<td><b>Search</b><br>Ability to locate and retrieve data/record based on specific metadata, keyword or phrases</td>
		<td>
			<?php if ($questions->sf4_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf4_s) . '</div>';
			}elseif  ($questions->sf4_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf4_s) . '</div>';
			}elseif  ($questions->sf4_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf4_s) . '</div>';
			}elseif  ($questions->sf4_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf4_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf4_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf4_l) . '</div>';
			}elseif  ($questions->sf4_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf4_l) . '</div>';
			}elseif  ($questions->sf4_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf4_l) . '</div>';
			}elseif  ($questions->sf4_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf4_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF4 End-->
<!--SF5 Start-->
	<tr valign="top">
		<td>SF5</td>
		<td><b>Audit Trail</b><br>provides log tracking for any changes to the electronic records to ensure that validity and integrity</td>
		<td>
			<?php if ($questions->sf5_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf5_s) . '</div>';
			}elseif  ($questions->sf5_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf5_s) . '</div>';
			}elseif  ($questions->sf5_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf5_s) . '</div>';
			}elseif  ($questions->sf5_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf5_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf5_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf5_l) . '</div>';
			}elseif  ($questions->sf5_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf5_l) . '</div>';
			}elseif  ($questions->sf5_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf5_l) . '</div>';
			}elseif  ($questions->sf5_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf5_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF5 End-->
<!--SF6 Start-->
	<tr valign="top">
		<td>SF6</td>
		<td><b>Transfer and sharing</b><br>ability to transfer/share (internal to external or external to internal) in a single or bulk data</td>
		<td>
			<?php if ($questions->sf6_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf6_s) . '</div>';
			}elseif  ($questions->sf6_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf6_s) . '</div>';
			}elseif  ($questions->sf6_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf6_s) . '</div>';
			}elseif  ($questions->sf6_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf6_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf6_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf6_l) . '</div>';
			}elseif  ($questions->sf6_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf6_l) . '</div>';
			}elseif  ($questions->sf6_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf6_l) . '</div>';
			}elseif  ($questions->sf6_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf6_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF6 End-->
<!--SF7 Start-->
	<tr valign="top">
		<td>SF7</td>
		<td><b>Reporting</b><br>provides a summary related to the current status of records such as total records, active, inactive, the total required appraisal attention and others</td>
		<td>
			<?php if ($questions->sf7_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf7_s) . '</div>';
			}elseif  ($questions->sf7_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf7_s) . '</div>';
			}elseif  ($questions->sf7_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf7_s) . '</div>';
			}elseif  ($questions->sf7_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf7_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf7_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf7_l) . '</div>';
			}elseif  ($questions->sf7_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf7_l) . '</div>';
			}elseif  ($questions->sf7_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf7_l) . '</div>';
			}elseif  ($questions->sf7_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf7_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF7 End-->
<!--SF8 Start-->
	<tr valign="top">
		<td>SF8</td>
		<td><b>Retention</b><br>list how long each record series must be kept (the retention period), when the retention period starts (the cut-off), and the action taken to the record once retention is met</td>
		<td>
			<?php if ($questions->sf8_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf8_s) . '</div>';
			}elseif  ($questions->sf8_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf8_s) . '</div>';
			}elseif  ($questions->sf8_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf8_s) . '</div>';
			}elseif  ($questions->sf8_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf8_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf8_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf8_l) . '</div>';
			}elseif  ($questions->sf8_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf8_l) . '</div>';
			}elseif  ($questions->sf8_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf8_l) . '</div>';
			}elseif  ($questions->sf8_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf8_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF8 End-->
<!--SF9 Start-->
	<tr valign="top">
		<td>SF9</td>
		<td><b>Appraisal</b><br>the process of determining the archival value and ultimate disposition of records. Appraisal decisions are informed by several factors eg: historical, legal, operational and financial value</td>
		<td>
			<?php if ($questions->sf9_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf9_s) . '</div>';
			}elseif  ($questions->sf9_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf9_s) . '</div>';
			}elseif  ($questions->sf9_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf9_s) . '</div>';
			}elseif  ($questions->sf9_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf9_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf9_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf9_l) . '</div>';
			}elseif  ($questions->sf9_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf9_l) . '</div>';
			}elseif  ($questions->sf9_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf9_l) . '</div>';
			}elseif  ($questions->sf9_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf9_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF9 End-->
<!--SF10 Start-->
	<tr valign="top">
		<td>SF10</td>
		<td><b>Archiving</b><br>the records will be permanently stored, inactive but accessible for future references </td>
		<td>
			<?php if ($questions->sf10_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf10_s) . '</div>';
			}elseif  ($questions->sf10_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf10_s) . '</div>';
			}elseif  ($questions->sf10_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf10_s) . '</div>';
			}elseif  ($questions->sf10_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf10_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf10_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf10_l) . '</div>';
			}elseif  ($questions->sf10_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf10_l) . '</div>';
			}elseif  ($questions->sf10_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf10_l) . '</div>';
			}elseif  ($questions->sf10_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf10_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF10 End-->
<!--SF11 Start-->
	<tr valign="top">
		<td>SF11</td>
		<td><b>Disposition</b><br>the process of destruction of records</td>
		<td>
			<?php if ($questions->sf11_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf11_s) . '</div>';
			}elseif  ($questions->sf11_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf11_s) . '</div>';
			}elseif  ($questions->sf11_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf11_s) . '</div>';
			}elseif  ($questions->sf11_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf11_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf11_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf11_l) . '</div>';
			}elseif  ($questions->sf11_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf11_l) . '</div>';
			}elseif  ($questions->sf11_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf11_l) . '</div>';
			}elseif  ($questions->sf11_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf11_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF11 End-->
<!--SF12 Start-->
	<tr valign="top">
		<td>SF12</td>
		<td><b>Others</b><br>the UI and others supporting component that supports the web application design and data presentation is working</td>
		<td>
			<?php if ($questions->sf12_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($questions->sf12_s) . '</div>';
			}elseif  ($questions->sf12_s == '0'){
				echo '<div class="boxed bg-warning">' . h($questions->sf12_s) . '</div>';
			}elseif  ($questions->sf12_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($questions->sf12_s) . '</div>';
			}elseif  ($questions->sf12_s == '1'){
				echo '<div class="boxed bg-success">' . h($questions->sf12_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($questions->sf12_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($questions->sf12_l) . '</div>';
			}elseif  ($questions->sf12_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($questions->sf12_l) . '</div>';
			}elseif  ($questions->sf12_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($questions->sf12_l) . '</div>';
			}elseif  ($questions->sf12_l == 'M'){
				echo '<div class="boxed bg-success">' . h($questions->sf12_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF12 End-->
</table>	
	<?php endforeach; ?>
<?php endif; ?>
<br>
<div class="title">Section B(II): Usability Evaluation</div>
<br>
<?php if (!empty($user->sus)) : ?>
	<?php foreach ($user->sus as $sus) : ?>
<table border="0" width="100%">
	<tr>
		<td width="5%">1.</td>
		<td>It allows me to accomplish my tasks</td>
		<td width="30%">
		<?php if ($sus->q1 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q1 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q1 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q1 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q1 == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	<tr>
		<td>2.</td>
		<td>I think I would not need a system with more features for my tasks</td>
		<td>
		<?php if ($sus->q2 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q2 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q2 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q2 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q2 == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	<tr>
		<td>3.</td>
		<td>I would not need to supplement Re-CRUD with an additional components</td>
		<td>
		<?php if ($sus->q3 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q3 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q3 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q3 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q3 == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	<tr>
		<td>4.</td>
		<td>I found the system unnecessarily complex</td>
		<td>
		<?php if ($sus->q4 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q4 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q4 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q4 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q4 == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	<tr>
		<td>5.</td>
		<td>This system’s capabilities would meet myrequirements</td>
		<td>
		<?php if ($sus->q5 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q5 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q5 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q5 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q5 == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	<tr>
		<td>6.</td>
		<td>It saves me time when I use it</td>
		<td>
		<?php if ($sus->q6 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q6 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q6 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q6 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q6 == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	<tr>
		<td>7.</td>
		<td>I found the various functions in this system were well integrated</td>
		<td>
		<?php if ($sus->q7 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q7 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q7 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q7 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	<tr>
		<td>8.</td>
		<td>I tend to reduce a lot of mistakes with this system</td>
		<td>
		<?php if ($sus->q8 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q8 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q8 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q8 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q8 == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	<tr>
		<td>9.</td>
		<td>I don’t make many errors with this system</td>
		<td>
		<?php if ($sus->q9 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q9 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q9 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q9 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q9 == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	<tr>
		<td>10.</td>
		<td>I don’t have to spend a lot of time correcting things with this system</td>
		<td>
		<?php if ($sus->q10 == 1){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q10 == 2){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q10 == 3){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q10 == 4){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="far fa-circle"></i>';
		}elseif ($sus->q10 == 5){
			echo '<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>&nbsp;<i class="fas fa-circle text-red"></i>';
		}else
			echo 'Error';
		?>
		</td>
	</tr>
	
</table>
<?php endforeach; ?>
	<?php endif; ?>
</div>
<div class="footer">
<div class="footerQR">
<img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo $this->request->getUri(); ?> &amp;size=60x60&amp;color=000&amp;bgcolor=fff" alt="" title="" />
</div>
<?= $this->Html->image('reCRUD_footer.jpg', ['fullBase' => true, 'width'=>'100%']); ?>
</div>
</body>
</html>