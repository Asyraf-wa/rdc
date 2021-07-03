<style>
.boxed {
    height:70px;
    width:70px;
    text-align:center;
    border:1px solid silver;
    display: table-cell;
    vertical-align:middle;
}
</style>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question $question
 */
 $c_name = $this->request->getParam('controller');
?>

<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="far fa-edit"></i> Edit'), ['action' => 'edit', $question->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-file-pdf"></i> PDF'), ['action' => 'pdf', $question->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="fas fa-history"></i> Audit Trail'), ['prefix' => 'Admin', 'controller' => 'audit_logs', 'action' => 'index', '?' => ['pk' => $question->id, 'source' => strtolower($c_name)]], ['class' => 'dropdown-item', 'escape' => false, 'target' => 'blank', 'title' => 'Full Audit trail Report']) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Form->create ?>
			<?php if ($question->status == 1) {
				echo $this->Form->postLink(__('<i class="far fa-star"></i> Set as inactive'), ['action' => 'recordInactive', $question->id, $question->status], ['block' => true, 'confirm' => __('Are you sure you want to inactive # {0}?', $question->id), 'class' => 'dropdown-item', 'escape' => false, 'title'=>'Inactive Record']);
			}else
				echo $this->Form->postLink(__('<i class="fas fa-star"></i> Set as active'), ['action' => 'recordActive', $question->id, $question->status], ['block' => true, 'confirm' => __('Are you sure you want to active # {0}?', $question->id), 'class' => 'dropdown-item', 'escape' => false, 'title'=>'Active Record']);
			?>
			<?= $this->Html->link(__('<i class="fas fa-archive"></i> Archived'), ['action' => 'transferArchived', $question->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#archived' . $question->id, 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="far fa-trash-alt"></i> Dispose'), ['action' => 'transferDisposed', $question->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#disposed' . $question->id, 'escape' => false]) ?>
		<?= $this->Form->end() ?>
		<?= $this->fetch('postLink'); ?>
		<div class="dropdown-divider"></div>
			<?= $this->Html->link(__('<i class="fas fa-list"></i> List'), ['action' => 'index'], ['class' => 'dropdown-item', 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="fas fa-plus"></i> New'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
	
  </div>
</div>	


</div>

<div class="row">
	<div class="col-md-8">
	
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Response</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body table-responsive">
<table class="table table-hover table-bordered">
	<tr>
		<th width="10px"></th>
		<th>Features Description</th>
		<th width="100px">Score</th>
		<th width="100px">LOI</th>
	</tr>
<!--SF1 Start-->
	<tr>
		<td>SF1</td>
		<td><b>Code Automation</b><br>The automation of code generation for persistent storage</td>
		<td>
			<?php if ($question->sf1_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf1_s) . '</div>';
			}elseif  ($question->sf1_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf1_s) . '</div>';
			}elseif  ($question->sf1_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf1_s) . '</div>';
			}elseif  ($question->sf1_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf1_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf1_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf1_l) . '</div>';
			}elseif  ($question->sf1_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf1_l) . '</div>';
			}elseif  ($question->sf1_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf1_l) . '</div>';
			}elseif  ($question->sf1_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf1_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF1 End-->

<!--SF2 Start-->
	<tr>
		<td>SF2</td>
		<td><b>Authentication and Authorization</b><br>Provides a role-based access control mechanism web application to offer protection from unauthorized access</td>
		<td>
			<?php if ($question->sf2_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf2_s) . '</div>';
			}elseif  ($question->sf2_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf2_s) . '</div>';
			}elseif  ($question->sf2_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf2_s) . '</div>';
			}elseif  ($question->sf2_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf2_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf2_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf2_l) . '</div>';
			}elseif  ($question->sf2_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf2_l) . '</div>';
			}elseif  ($question->sf2_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf2_l) . '</div>';
			}elseif  ($question->sf2_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf2_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF2 End-->
<!--SF3 Start-->
	<tr>
		<td>SF3</td>
		<td><b>Inventory</b><br>a descriptive listing of each record series or system, together with an indication of the location, access and other pertinent data</td>
		<td>
			<?php if ($question->sf3_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf3_s) . '</div>';
			}elseif  ($question->sf3_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf3_s) . '</div>';
			}elseif  ($question->sf3_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf3_s) . '</div>';
			}elseif  ($question->sf3_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf3_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf3_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf3_l) . '</div>';
			}elseif  ($question->sf3_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf3_l) . '</div>';
			}elseif  ($question->sf3_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf3_l) . '</div>';
			}elseif  ($question->sf3_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf3_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF3 End-->
<!--SF4 Start-->
	<tr>
		<td>SF4</td>
		<td><b>Search</b><br>Ability to locate and retrieve data/record based on specific metadata, keyword or phrases</td>
		<td>
			<?php if ($question->sf4_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf4_s) . '</div>';
			}elseif  ($question->sf4_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf4_s) . '</div>';
			}elseif  ($question->sf4_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf4_s) . '</div>';
			}elseif  ($question->sf4_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf4_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf4_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf4_l) . '</div>';
			}elseif  ($question->sf4_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf4_l) . '</div>';
			}elseif  ($question->sf4_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf4_l) . '</div>';
			}elseif  ($question->sf4_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf4_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF4 End-->
<!--SF5 Start-->
	<tr>
		<td>SF5</td>
		<td><b>Audit Trail</b><br>provides log tracking for any changes to the electronic records to ensure that validity and integrity</td>
		<td>
			<?php if ($question->sf5_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf5_s) . '</div>';
			}elseif  ($question->sf5_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf5_s) . '</div>';
			}elseif  ($question->sf5_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf5_s) . '</div>';
			}elseif  ($question->sf5_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf5_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf5_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf5_l) . '</div>';
			}elseif  ($question->sf5_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf5_l) . '</div>';
			}elseif  ($question->sf5_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf5_l) . '</div>';
			}elseif  ($question->sf5_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf5_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF5 End-->
<!--SF6 Start-->
	<tr>
		<td>SF6</td>
		<td><b>Transfer and sharing</b><br>ability to transfer or share the record (internal to external or external to internal) in a single data or bulk data</td>
		<td>
			<?php if ($question->sf6_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf6_s) . '</div>';
			}elseif  ($question->sf6_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf6_s) . '</div>';
			}elseif  ($question->sf6_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf6_s) . '</div>';
			}elseif  ($question->sf6_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf6_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf6_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf6_l) . '</div>';
			}elseif  ($question->sf6_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf6_l) . '</div>';
			}elseif  ($question->sf6_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf6_l) . '</div>';
			}elseif  ($question->sf6_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf6_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF6 End-->
<!--SF7 Start-->
	<tr>
		<td>SF7</td>
		<td><b>Reporting</b><br>provides a summary related to the current status of records such as total records, active, inactive, the total required appraisal attention and others</td>
		<td>
			<?php if ($question->sf7_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf7_s) . '</div>';
			}elseif  ($question->sf7_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf7_s) . '</div>';
			}elseif  ($question->sf7_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf7_s) . '</div>';
			}elseif  ($question->sf7_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf7_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf7_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf7_l) . '</div>';
			}elseif  ($question->sf7_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf7_l) . '</div>';
			}elseif  ($question->sf7_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf7_l) . '</div>';
			}elseif  ($question->sf7_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf7_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF7 End-->
<!--SF8 Start-->
	<tr>
		<td>SF8</td>
		<td><b>Retention</b><br>list how long each record series must be kept (the retention period), when the retention period starts (the cut-off), and the proper way to dispose of the record once retention is met (the disposition method)</td>
		<td>
			<?php if ($question->sf8_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf8_s) . '</div>';
			}elseif  ($question->sf8_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf8_s) . '</div>';
			}elseif  ($question->sf8_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf8_s) . '</div>';
			}elseif  ($question->sf8_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf8_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf8_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf8_l) . '</div>';
			}elseif  ($question->sf8_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf8_l) . '</div>';
			}elseif  ($question->sf8_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf8_l) . '</div>';
			}elseif  ($question->sf8_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf8_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF8 End-->
<!--SF9 Start-->
	<tr>
		<td>SF9</td>
		<td><b>Appraisal</b><br>the process of determining the archival value and ultimate disposition of records. Appraisal decisions are informed by several factors including the historical, legal, operational and financial value of the records</td>
		<td>
			<?php if ($question->sf9_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf9_s) . '</div>';
			}elseif  ($question->sf9_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf9_s) . '</div>';
			}elseif  ($question->sf9_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf9_s) . '</div>';
			}elseif  ($question->sf9_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf9_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf9_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf9_l) . '</div>';
			}elseif  ($question->sf9_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf9_l) . '</div>';
			}elseif  ($question->sf9_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf9_l) . '</div>';
			}elseif  ($question->sf9_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf9_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF9 End-->
<!--SF10 Start-->
	<tr>
		<td>SF10</td>
		<td><b>Archiving</b><br>the records will be permanently stored, inactive but accessible for future references </td>
		<td>
			<?php if ($question->sf10_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf10_s) . '</div>';
			}elseif  ($question->sf10_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf10_s) . '</div>';
			}elseif  ($question->sf10_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf10_s) . '</div>';
			}elseif  ($question->sf10_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf10_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf10_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf10_l) . '</div>';
			}elseif  ($question->sf10_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf10_l) . '</div>';
			}elseif  ($question->sf10_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf10_l) . '</div>';
			}elseif  ($question->sf10_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf10_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF10 End-->
<!--SF11 Start-->
	<tr>
		<td>SF11</td>
		<td><b>Disposition</b><br>the process of destruction of records</td>
		<td>
			<?php if ($question->sf11_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf11_s) . '</div>';
			}elseif  ($question->sf11_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf11_s) . '</div>';
			}elseif  ($question->sf11_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf11_s) . '</div>';
			}elseif  ($question->sf11_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf11_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf11_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf11_l) . '</div>';
			}elseif  ($question->sf11_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf11_l) . '</div>';
			}elseif  ($question->sf11_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf11_l) . '</div>';
			}elseif  ($question->sf11_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf11_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF11 End-->
<!--SF12 Start-->
	<tr>
		<td>SF12</td>
		<td><b>Others</b><br>the UI and others supporting component that supports the web application design and data presentation is working</td>
		<td>
			<?php if ($question->sf12_s == '-1'){
				echo '<div class="boxed bg-danger">' . h($question->sf12_s) . '</div>';
			}elseif  ($question->sf12_s == '0'){
				echo '<div class="boxed bg-warning">' . h($question->sf12_s) . '</div>';
			}elseif  ($question->sf12_s == '0.5'){
				echo '<div class="boxed bg-primary">' . h($question->sf12_s) . '</div>';
			}elseif  ($question->sf12_s == '1'){
				echo '<div class="boxed bg-success">' . h($question->sf12_s) . '</div>';
			}else
				echo 'error';
			?>
		</td>
		<td>
			<?php if ($question->sf12_l == 'N'){
				echo '<div class="boxed bg-danger">' . h($question->sf12_l) . '</div>';
			}elseif  ($question->sf12_l == 'D'){
				echo '<div class="boxed bg-warning">' . h($question->sf12_l) . '</div>';
			}elseif  ($question->sf12_l == 'HD'){
				echo '<div class="boxed bg-primary">' . h($question->sf12_l) . '</div>';
			}elseif  ($question->sf12_l == 'M'){
				echo '<div class="boxed bg-success">' . h($question->sf12_l) . '</div>';
			}else
				echo 'error';
			?>
		</td>
	</tr>
<!--SF12 End-->
</table>
			</div>
		</div>	
	
	
		<div class="card2">
		  <div class="header">
				<div class="panel_card2_title"><?= __('Questions') ?> Details</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body">
				<div class="questions view content table-responsive">
            <table class="table table-hover">
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $question->has('user') ? $this->Html->link($question->user->id, ['controller' => 'Users', 'action' => 'view', $question->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf1 S') ?></th>
                    <td><?= h($question->sf1_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf1 L') ?></th>
                    <td><?= h($question->sf1_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf2 S') ?></th>
                    <td><?= h($question->sf2_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf2 L') ?></th>
                    <td><?= h($question->sf2_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf3 S') ?></th>
                    <td><?= h($question->sf3_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf3 L') ?></th>
                    <td><?= h($question->sf3_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf4 S') ?></th>
                    <td><?= h($question->sf4_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf4 L') ?></th>
                    <td><?= h($question->sf4_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf5 S') ?></th>
                    <td><?= h($question->sf5_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf5 L') ?></th>
                    <td><?= h($question->sf5_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf6 S') ?></th>
                    <td><?= h($question->sf6_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf6 L') ?></th>
                    <td><?= h($question->sf6_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf7 S') ?></th>
                    <td><?= h($question->sf7_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf7 L') ?></th>
                    <td><?= h($question->sf7_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf8 S') ?></th>
                    <td><?= h($question->sf8_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf8 L') ?></th>
                    <td><?= h($question->sf8_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf9 S') ?></th>
                    <td><?= h($question->sf9_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf9 L') ?></th>
                    <td><?= h($question->sf9_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf10 S') ?></th>
                    <td><?= h($question->sf10_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf10 L') ?></th>
                    <td><?= h($question->sf10_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf11 S') ?></th>
                    <td><?= h($question->sf11_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf11 L') ?></th>
                    <td><?= h($question->sf11_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf12 S') ?></th>
                    <td><?= h($question->sf12_s) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sf12 L') ?></th>
                    <td><?= h($question->sf12_l) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($question->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($question->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= date('d M Y', strtotime($question->created)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= date('d M Y', strtotime($question->modified)); ?></td>
                </tr>
            </table>

        </div>
		  </div>
		</div>
	</div>
	<div class="col-md-4">
	
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Legend</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">
Generic scale point:
<table id="main_index" class="table table-hover">
	<tr>
		<th>Generic scale point</th>
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

<hr>
Level of importance (LOI):
<table id="main_index" class="table table-hover">
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
	
	
		<div class="card2">
		  <div class="header">
				<div class="panel_card2_title">Record Info</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body table-responsive">
<?php
$created = date_create($question->created);
$rm_retention = date_create($question->rm_retention);
$now = new DateTime("now");
?>
<table class="table table-hover">
	<tr>
		<td>Status</td>
		<td>
			<?php if ($question->status == '0'){
					echo '<span class="badge badge-warning">Inactive</span>';
				}elseif ($question->status == '1'){
					echo '<span class="badge badge-success">Active</span>';
				}elseif ($question->status == '2'){
					echo '<span class="badge badge-info">Archived</span>';
				}elseif ($question->status == '3'){
					echo '<span class="badge badge-danger">Disposed</span>';
				}else
					echo '<span class="badge badge-danger">Error</span>';
			?>
		</td>
	</tr>
	<tr>
		<td>Created Date</td>
		<td><?php echo date('F d, Y', strtotime($question->created)); ?></td>
	</tr>
	<tr>
		<td>Days from record registered</td>
		<td>
			<?php
			$interval = date_diff($created, $now);
			echo $interval->format('%y Year %m Month %d Day');
			?> 
			[<?php echo $interval->format('%a days'); ?>]
		</td>
	</tr>
	<tr>
		<td>Retention Date</td>
		<td><?php echo date('F d, Y', strtotime($question->rm_retention)); ?></td>
	</tr>
	<tr>
		<td>Remaining days until retention</td>
		<td>
			<?php 
			$interval = date_diff($now, $rm_retention);
			echo $interval->format('%y Year %m Month %d Day');
			?> 
			[<?php echo $interval->format('%a days'); ?>]
		</td>
	</tr>
</table>
		  </div>
		</div>

		<div class="card2">
		  <div class="header">
				<div class="panel_card2_title">QR: Scan for mobile</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body">
			<div class="row">
			  <div class="col-md-8 justify">
			  Scan the QR-Code to retreive this page directly to your mobile devices. If the page is protected, user need to authenticate to open the page.
			  </div>
			  <div class="col-md-4">
					<div id="qr" align="center"></div>
					<script type="text/javascript">
						const qrCode = new QRCodeStyling({
							width: 100,
							height: 100,
							margin: 0,
							//type: "svg",
							data: "<?php echo $this->request->getUri(); ?>",
							dotsOptions: {
								//color: "#4267b2",
								type: "dots"
							},
							cornersSquareOptions: {
								type: "dots",
								color: "#007bff",
							},
							cornersDotOptions: {
								type: "dots"
							},
							backgroundOptions: {
								//color: "#ffffff",
							},
							imageOptions: {
								crossOrigin: "anonymous",
								margin: 20
							}
						});

						qrCode.append(document.getElementById("qr"));
						//qrCode.download({ name: "qr", extension: "png" });
					</script>
			  </div>
			</div>
	<hr>		
Share on:
<?php echo $this->SocialShare->fa('email', null, ['icon_class' => 'far fa-envelope text-red']); ?>&nbsp;&nbsp;
<?php echo $this->SocialShare->fa('whatsapp', null, ['icon_class' => 'fab fa-whatsapp text-success']); ?>&nbsp;&nbsp;
<?php echo $this->SocialShare->fa('facebook', null, ['icon_class' => 'fab fa-facebook-f']); ?>&nbsp;&nbsp;
<?php echo $this->SocialShare->fa('twitter', null, ['icon_class' => 'fab fa-twitter']); ?>&nbsp;&nbsp;
<?php echo $this->SocialShare->fa('linkedin', null, ['icon_class' => 'fab fa-linkedin-in']); ?>&nbsp;&nbsp;
		  </div>
		</div>
	</div>
</div>


<!--Archived Modal-->
<div class="modal fade" id="archived<?= $question->id; ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-info">
		<div class="modal-header">
			<h4 class="modal-title">Transfer to Archive Request</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<ul class="">
				<li>You're requesting to archived the record id: <strong><?= $question->id; ?></strong> from <strong><?= $c_name; ?></strong> repository.</li>
				<li>Please note that this operation is not reversible</li>
				<li>The record will be archived and removed from the active list</li>
			</ul>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-light btn-flat" data-dismiss="modal">No</button>
			<?= $this->Form->postLink(__('Yes'), ['action' => 'transferArchived', $question->id], ['class' => 'btn btn-outline-light btn-flat']); ?>
		</div>
		</div>
	</div>
</div>
<!--Disposed Modal-->
<div class="modal fade" id="disposed<?= $question->id; ?>">
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
				<li>You're requesting to dispose the record id: <strong><?= $question->id; ?></strong> from <strong><?= $c_name; ?></strong> repository.</li>
				<li>Please note that this operation is not reversible</li>
				<li>The record will be disposed and recorded into the disposal list</li>
			</ul>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-light btn-flat" data-dismiss="modal">No</button>
			<?= $this->Form->postLink(__('Yes'), ['action' => 'transferDisposed', $question->id], ['class' => 'btn btn-outline-light btn-flat']); ?>
		</div>
		</div>
	</div>
</div>