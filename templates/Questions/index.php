<style>
.boxed {
    height:50px;
    width:50px;
    text-align:center;
    border:1px solid silver;
    display: table-cell;
    vertical-align:middle;
}
</style>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
 $c_name = $this->request->getParam('controller');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha256-TQq84xX6vkwR0Qs1qH5ADkP+MvH0W+9E7TdHJsoIQiM=" crossorigin="anonymous"></script>

<?= $this->Form->create(null,['url'=>['action'=>'change']]) ?>
<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
			<?= $this->Html->link(__('<i class="fas fa-plus"></i> New Question'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="fas fa-search"></i> Search'), ['action' => 'search'], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-chart-bar"></i> Report'), ['action' => 'report'], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="far fa-clipboard"></i> Retention List'), ['action' => 'retention_list'], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-folder"></i> Archived'), ['action' => 'indexArchived'], ['class' => 'dropdown-item', 'escape' => false, 'target' => 'blank', 'title' => 'Archived List']) ?>
		<?= $this->Html->link(__('<i class="fas fa-fire-alt"></i> Disposed'), ['action' => 'indexDisposed'], ['class' => 'dropdown-item', 'escape' => false, 'title' => 'Disposed List']) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="far fa-file-excel"></i> Export as CSV'), ['action' => 'csv'], ['class' => 'dropdown-item', 'escape' => false]) ?>
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
				<div class="panel_card2_title">Response</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
		<div class="body">
			<div class="col-md-12 table-responsive">
				<table id="main_index" class="table table-hover table-bordered">
					<thead>
				<tr>
					<th colspan="2"></th>
					<th colspan="2" class="text-center bg-gray">CRUD</th>
					<th colspan="2" class="text-center bg-gray">RBAC</th>
					<th colspan="18" class="text-center bg-gray">ERM</th>
					<th colspan="2" class="text-center bg-gray">Others</th>
					<th></th>
				</tr>
				<tr>
					<th colspan="2"></th>
					<th colspan="2" class="text-center bg-purple">SF1</th>
					<th colspan="2" class="text-center bg-indigo">SF2</th>
					<th colspan="2" class="text-center bg-purple">SF3</th>
					<th colspan="2" class="text-center bg-indigo">SF4</th>
					<th colspan="2" class="text-center bg-purple">SF5</th>
					<th colspan="2" class="text-center bg-indigo">SF6</th>
					<th colspan="2" class="text-center bg-purple">SF7</th>
					<th colspan="2" class="text-center bg-indigo">SF8</th>
					<th colspan="2" class="text-center bg-purple">SF9</th>
					<th colspan="2" class="text-center bg-indigo">SF10</th>
					<th colspan="2" class="text-center bg-purple">SF11</th>
					<th colspan="2" class="text-center bg-indigo">SF12</th>
					<th></th>
				</tr>
				<tr>
					<th><?= $this->Form->checkbox('check[]',['onchange'=>'checkAll(this)', 'name'=>'chk[]']) ?></th>
					<th><?= $this->Paginator->sort('user_id','Res..') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf1_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf1_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf2_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf2_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf3_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf3_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf4_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf4_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf5_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf5_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf6_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf6_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf7_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf7_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf8_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf8_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf9_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf9_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf10_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf10_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf11_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf11_l','L') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf12_s','S') ?></th>
					<th class="text-center"><?= $this->Paginator->sort('sf12_l','L') ?></th>
					<th style="text-align: center;"></th>
				</tr>
					</thead>
            <tbody>
                <?php foreach ($questions as $question): ?>
                <tr>
					<td><?php echo $this->Form->checkbox('check[]',['value'=>$question->id]) ?></td>
                    <td>R_<?= $question->has('user') ? $this->Html->link($question->user->id, ['controller' => 'Users', 'action' => 'view', $question->user->id]) : '' ?></td>
<!--SF1 Start-->
				<?php if ($question->sf1_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf1_s) . '</td>';
				}elseif  ($question->sf1_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf1_s) . '</td>';
				}elseif  ($question->sf1_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf1_s) . '</td>';
				}elseif  ($question->sf1_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf1_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf1_s) . '</td>';
				?>
				
				<?php if ($question->sf1_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf1_l) . '</td>';
				}elseif  ($question->sf1_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf1_l) . '</td>';
				}elseif  ($question->sf1_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf1_l) . '</td>';
				}elseif  ($question->sf1_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf1_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf1_l) . '</td>';
				?>
<!--SF1 End-->
<!--SF2 Start-->
				<?php if ($question->sf2_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf2_s) . '</td>';
				}elseif  ($question->sf2_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf2_s) . '</td>';
				}elseif  ($question->sf2_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf2_s) . '</td>';
				}elseif  ($question->sf2_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf2_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf2_s) . '</td>';
				?>
				
				<?php if ($question->sf2_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf2_l) . '</td>';
				}elseif  ($question->sf2_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf2_l) . '</td>';
				}elseif  ($question->sf2_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf2_l) . '</td>';
				}elseif  ($question->sf2_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf2_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf2_l) . '</td>';
				?>
<!--SF2 End-->				
<!--SF3 Start-->
				<?php if ($question->sf3_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf3_s) . '</td>';
				}elseif  ($question->sf3_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf3_s) . '</td>';
				}elseif  ($question->sf3_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf3_s) . '</td>';
				}elseif  ($question->sf3_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf3_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf3_s) . '</td>';
				?>
				
				<?php if ($question->sf3_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf3_l) . '</td>';
				}elseif  ($question->sf3_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf3_l) . '</td>';
				}elseif  ($question->sf3_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf3_l) . '</td>';
				}elseif  ($question->sf3_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf3_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf3_l) . '</td>';
				?>
<!--SF3 End-->				
<!--SF4 Start-->
				<?php if ($question->sf4_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf4_s) . '</td>';
				}elseif  ($question->sf4_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf4_s) . '</td>';
				}elseif  ($question->sf4_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf4_s) . '</td>';
				}elseif  ($question->sf4_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf4_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf4_s) . '</td>';
				?>
				
				<?php if ($question->sf4_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf4_l) . '</td>';
				}elseif  ($question->sf4_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf4_l) . '</td>';
				}elseif  ($question->sf4_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf4_l) . '</td>';
				}elseif  ($question->sf4_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf4_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf4_l) . '</td>';
				?>
<!--SF4 End-->				
<!--SF5 Start-->
				<?php if ($question->sf5_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf5_s) . '</td>';
				}elseif  ($question->sf5_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf5_s) . '</td>';
				}elseif  ($question->sf5_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf5_s) . '</td>';
				}elseif  ($question->sf5_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf5_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf5_s) . '</td>';
				?>
				
				<?php if ($question->sf5_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf5_l) . '</td>';
				}elseif  ($question->sf5_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf5_l) . '</td>';
				}elseif  ($question->sf5_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf5_l) . '</td>';
				}elseif  ($question->sf5_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf5_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf5_l) . '</td>';
				?>
<!--SF5 End-->				
<!--SF6 Start-->
				<?php if ($question->sf6_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf6_s) . '</td>';
				}elseif  ($question->sf6_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf6_s) . '</td>';
				}elseif  ($question->sf6_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf6_s) . '</td>';
				}elseif  ($question->sf6_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf6_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf6_s) . '</td>';
				?>
				
				<?php if ($question->sf6_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf6_l) . '</td>';
				}elseif  ($question->sf6_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf6_l) . '</td>';
				}elseif  ($question->sf6_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf6_l) . '</td>';
				}elseif  ($question->sf6_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf6_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf6_l) . '</td>';
				?>
<!--SF6 End-->				
<!--SF7 Start-->
				<?php if ($question->sf7_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf7_s) . '</td>';
				}elseif  ($question->sf7_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf7_s) . '</td>';
				}elseif  ($question->sf7_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf7_s) . '</td>';
				}elseif  ($question->sf7_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf7_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf7_s) . '</td>';
				?>
				
				<?php if ($question->sf7_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf7_l) . '</td>';
				}elseif  ($question->sf7_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf7_l) . '</td>';
				}elseif  ($question->sf7_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf7_l) . '</td>';
				}elseif  ($question->sf7_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf7_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf7_l) . '</td>';
				?>
<!--SF7 End-->				
<!--SF8 Start-->
				<?php if ($question->sf8_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf8_s) . '</td>';
				}elseif  ($question->sf8_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf8_s) . '</td>';
				}elseif  ($question->sf8_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf8_s) . '</td>';
				}elseif  ($question->sf8_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf8_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf8_s) . '</td>';
				?>
				
				<?php if ($question->sf8_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf8_l) . '</td>';
				}elseif  ($question->sf8_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf8_l) . '</td>';
				}elseif  ($question->sf8_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf8_l) . '</td>';
				}elseif  ($question->sf8_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf8_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf8_l) . '</td>';
				?>
<!--SF8 End-->				
<!--SF9 Start-->
				<?php if ($question->sf9_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf9_s) . '</td>';
				}elseif  ($question->sf9_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf9_s) . '</td>';
				}elseif  ($question->sf9_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf9_s) . '</td>';
				}elseif  ($question->sf9_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf9_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf9_s) . '</td>';
				?>
				
				<?php if ($question->sf9_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf9_l) . '</td>';
				}elseif  ($question->sf9_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf9_l) . '</td>';
				}elseif  ($question->sf9_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf9_l) . '</td>';
				}elseif  ($question->sf9_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf9_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf9_l) . '</td>';
				?>
<!--SF9 End-->			
<!--SF10 Start-->
				<?php if ($question->sf10_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf10_s) . '</td>';
				}elseif  ($question->sf10_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf10_s) . '</td>';
				}elseif  ($question->sf10_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf10_s) . '</td>';
				}elseif  ($question->sf10_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf10_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf10_s) . '</td>';
				?>
				
				<?php if ($question->sf10_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf10_l) . '</td>';
				}elseif  ($question->sf10_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf10_l) . '</td>';
				}elseif  ($question->sf10_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf10_l) . '</td>';
				}elseif  ($question->sf10_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf10_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf10_l) . '</td>';
				?>
<!--SF10 End-->				
<!--SF11 Start-->
				<?php if ($question->sf11_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf11_s) . '</td>';
				}elseif  ($question->sf11_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf11_s) . '</td>';
				}elseif  ($question->sf11_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf11_s) . '</td>';
				}elseif  ($question->sf11_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf11_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf11_s) . '</td>';
				?>
				
				<?php if ($question->sf11_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf11_l) . '</td>';
				}elseif  ($question->sf11_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf11_l) . '</td>';
				}elseif  ($question->sf11_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf11_l) . '</td>';
				}elseif  ($question->sf11_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf11_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf11_l) . '</td>';
				?>
<!--SF11 End-->					
<!--SF12 Start-->
				<?php if ($question->sf12_s == '-1'){
					echo '<td class="boxed bg-danger">' . h($question->sf12_s) . '</td>';
				}elseif  ($question->sf12_s == '0'){
					echo '<td class="boxed bg-warning">' . h($question->sf12_s) . '</td>';
				}elseif  ($question->sf12_s == '0.5'){
					echo '<td class="boxed bg-primary">' . h($question->sf12_s) . '</td>';
				}elseif  ($question->sf12_s == '1'){
					echo '<td class="boxed bg-success">' . h($question->sf12_s) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf12_s) . '</td>';
				?>
				
				<?php if ($question->sf12_l == 'N'){
					echo '<td class="boxed bg-danger">' . h($question->sf12_l) . '</td>';
				}elseif  ($question->sf12_l == 'D'){
					echo '<td class="boxed bg-warning">' . h($question->sf12_l) . '</td>';
				}elseif  ($question->sf12_l == 'HD'){
					echo '<td class="boxed bg-primary">' . h($question->sf12_l) . '</td>';
				}elseif  ($question->sf12_l == 'M'){
					echo '<td class="boxed bg-success">' . h($question->sf12_l) . '</td>';
				}else
					echo '<td class="boxed bg-gray">' . h($question->sf12_l) . '</td>';
				?>
<!--SF12 End-->				
                    <td class="actions" align="center">						
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="far fa-folder-open"></i> View'), ['action' => 'view', $question->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="far fa-edit"></i> Edit'), ['action' => 'edit', $question->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-trash-alt"></i> Dispose'), ['action' => 'transferDisposed', $question->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#disposed' . $question->id, 'escape' => false]) ?>
  </div>
</div>
                    </td>
                </tr>
<div class="modal fade" id="disposed<?php echo $question->id; ?>">
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
                <?php endforeach; ?>
            </tbody>
				</table>
			</div>
<?php if ($count_find_result != NULL): ?>

<div class="row">
	<div class="col-md-5">
<fieldset>
	<div class="row">
		<div class="col-xs-3">
			<?php echo $this->Form->control('status', [
				'class' => 'form-control form-control-sm',
				'required' => false,
				'options' => [
					'0' => 'Inactive',
					'1' => 'Active', 
					'2' => 'Archived',
					'3' => 'Disposed',
					], 
				'empty' => 'Select Status',
				'label' => false]); ?>
		</div>
		<div class="col-xs-3">
			&nbsp;
			<?= $this->Form->button(__('Submit'),['class' => 'btn btn-success btn-flat btn-sm']) ?>
		</div>
	</div>
</fieldset>
	</div>
	<div class="col-md-2 text-center">
		<div class="row">
			<div class="col-xs-3">
<?php echo $this->Paginator->limitControl([10 => 'Show 10 entries',25 => 'Show 25 entries', 50 => 'Show 50 entries', 100 => 'Show 100 entries'], $question->perPage,['class' => 'form-control form-control-sm','label' => false]); ?>
			</div>
		</div>
	</div>
	<div class="col-md-5 pull-right">
<span class="badge bg-primary">Total records: <?php echo $count_find_result; ?></span>
	</div>
</div>

<div>
	<ul class="pagination justify-content-end">
		<?= $this->Paginator->first(__('First')) ?>
		<?= $this->Paginator->prev(__('Previous')) ?>
		<?= $this->Paginator->numbers() ?>
		<?= $this->Paginator->next(__('Next')) ?>
		<?= $this->Paginator->last(__('Last')) ?>
	</ul>
	<p class="pagination justify-content-end"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
</div>

<?php endif; ?>
		</div>
</div>

<div class="card2">
	<div class="header">
		<div class="panel_card2_title">Analysis</div>
		<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
	<div class="body table-responsive">
	
<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-info-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Invitation Sent</span>
                <span class="info-box-number">
                  <?php echo $total_respondent; ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Completed Feature Analysis</span>
                <span class="info-box-number">
<?php echo $total; ?>
				</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-spinner"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pending for Response</span>
                <span class="info-box-number">
				<?php 
					$pending_answer = $total_respondent - $total;
					echo $pending_answer;
				?>
				</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="far fa-list-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Log</span>
                <span class="info-box-number">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>	
	
	

<div class="row">
	<div class="col-md-6">

	</div>
	<div class="col-md-6">

	</div>
</div>
<!--SF1 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF1</td>
	<td><b>Code Automation CRUD with integrated ERM features</b><br>The automation of code generation for persistent storage</td>
	<td class="text-center"><?php echo $sf1_s_negative; ?></td>
	<td class="text-center"><?php echo $sf1_s_zero; ?></td>
	<td class="text-center"><?php echo $sf1_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf1_s_one; ?></td>
	<td class="text-center"><?php echo $sf1_l_n; ?></td>
	<td class="text-center"><?php echo $sf1_l_d; ?></td>
	<td class="text-center"><?php echo $sf1_l_hd; ?></td>
	<td class="text-center"><?php echo $sf1_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf1_s_negative_percentage = $sf1_s_negative * 100 / $total;
		echo $this->Number->precision($sf1_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf1_s_zero_percentage = $sf1_s_zero * 100 / $total;;
		echo $this->Number->precision($sf1_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf1_s_pointfive_percentage = $sf1_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf1_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf1_s_one_percentage = $sf1_s_one * 100 / $total;;
		echo $this->Number->precision($sf1_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf1_l_n_percentage = $sf1_l_n * 100 / $total;;
		echo $this->Number->precision($sf1_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf1_l_d_percentage = $sf1_l_d * 100 / $total;;
		echo $this->Number->precision($sf1_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf1_l_hd_percentage = $sf1_l_hd * 100 / $total;;
		echo $this->Number->precision($sf1_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf1_l_m_percentage = $sf1_l_m * 100 / $total;;
		echo $this->Number->precision($sf1_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf1_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf1_s').getContext('2d');
var sf1_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf1_s_negative); ?>, <?= json_encode($sf1_s_zero); ?>, <?= json_encode($sf1_s_pointfive); ?>, <?= json_encode($sf1_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf1_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf1_l').getContext('2d');
var sf1_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf1_l_n); ?>, <?= json_encode($sf1_l_d); ?>, <?= json_encode($sf1_l_hd); ?>, <?= json_encode($sf1_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF1 Table End-->
<!--SF2 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF2</td>
	<td><b>Authentication and Authorization</b><br>Provides a role-based access control mechanism web application to offer protection from unauthorized access</td>
	<td class="text-center"><?php echo $sf2_s_negative; ?></td>
	<td class="text-center"><?php echo $sf2_s_zero; ?></td>
	<td class="text-center"><?php echo $sf2_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf2_s_one; ?></td>
	<td class="text-center"><?php echo $sf2_l_n; ?></td>
	<td class="text-center"><?php echo $sf2_l_d; ?></td>
	<td class="text-center"><?php echo $sf2_l_hd; ?></td>
	<td class="text-center"><?php echo $sf2_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf2_s_negative_percentage = $sf2_s_negative * 100 / $total;
		echo $this->Number->precision($sf2_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf2_s_zero_percentage = $sf2_s_zero * 100 / $total;;
		echo $this->Number->precision($sf2_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf2_s_pointfive_percentage = $sf2_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf2_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf2_s_one_percentage = $sf2_s_one * 100 / $total;;
		echo $this->Number->precision($sf2_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf2_l_n_percentage = $sf2_l_n * 100 / $total;;
		echo $this->Number->precision($sf2_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf2_l_d_percentage = $sf2_l_d * 100 / $total;;
		echo $this->Number->precision($sf2_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf2_l_hd_percentage = $sf2_l_hd * 100 / $total;;
		echo $this->Number->precision($sf2_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf2_l_m_percentage = $sf2_l_m * 100 / $total;;
		echo $this->Number->precision($sf2_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf2_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf2_s').getContext('2d');
var sf2_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf2_s_negative); ?>, <?= json_encode($sf2_s_zero); ?>, <?= json_encode($sf2_s_pointfive); ?>, <?= json_encode($sf2_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf2_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf2_l').getContext('2d');
var sf2_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf2_l_n); ?>, <?= json_encode($sf2_l_d); ?>, <?= json_encode($sf2_l_hd); ?>, <?= json_encode($sf2_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF2 Table End-->
<!--SF3 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF3</td>
	<td><b>Inventory</b><br>a descriptive listing of each record series or system, together with an indication of the location, access and other pertinent data</td>
	<td class="text-center"><?php echo $sf3_s_negative; ?></td>
	<td class="text-center"><?php echo $sf3_s_zero; ?></td>
	<td class="text-center"><?php echo $sf3_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf3_s_one; ?></td>
	<td class="text-center"><?php echo $sf3_l_n; ?></td>
	<td class="text-center"><?php echo $sf3_l_d; ?></td>
	<td class="text-center"><?php echo $sf3_l_hd; ?></td>
	<td class="text-center"><?php echo $sf3_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf3_s_negative_percentage = $sf3_s_negative * 100 / $total;
		echo $this->Number->precision($sf3_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf3_s_zero_percentage = $sf3_s_zero * 100 / $total;;
		echo $this->Number->precision($sf3_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf3_s_pointfive_percentage = $sf3_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf3_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf3_s_one_percentage = $sf3_s_one * 100 / $total;;
		echo $this->Number->precision($sf3_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf3_l_n_percentage = $sf3_l_n * 100 / $total;;
		echo $this->Number->precision($sf3_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf3_l_d_percentage = $sf3_l_d * 100 / $total;;
		echo $this->Number->precision($sf3_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf3_l_hd_percentage = $sf3_l_hd * 100 / $total;;
		echo $this->Number->precision($sf3_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf3_l_m_percentage = $sf3_l_m * 100 / $total;;
		echo $this->Number->precision($sf3_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf3_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf3_s').getContext('2d');
var sf3_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf3_s_negative); ?>, <?= json_encode($sf3_s_zero); ?>, <?= json_encode($sf3_s_pointfive); ?>, <?= json_encode($sf3_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf3_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf3_l').getContext('2d');
var sf3_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf3_l_n); ?>, <?= json_encode($sf3_l_d); ?>, <?= json_encode($sf3_l_hd); ?>, <?= json_encode($sf3_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF3 Table End-->
<!--SF4 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF4</td>
	<td><b>Search</b><br>Ability to locate and retrieve data/record based on specific metadata, keyword or phrases</td>
	<td class="text-center"><?php echo $sf4_s_negative; ?></td>
	<td class="text-center"><?php echo $sf4_s_zero; ?></td>
	<td class="text-center"><?php echo $sf4_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf4_s_one; ?></td>
	<td class="text-center"><?php echo $sf4_l_n; ?></td>
	<td class="text-center"><?php echo $sf4_l_d; ?></td>
	<td class="text-center"><?php echo $sf4_l_hd; ?></td>
	<td class="text-center"><?php echo $sf4_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf4_s_negative_percentage = $sf4_s_negative * 100 / $total;
		echo $this->Number->precision($sf4_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf4_s_zero_percentage = $sf4_s_zero * 100 / $total;;
		echo $this->Number->precision($sf4_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf4_s_pointfive_percentage = $sf4_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf4_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf4_s_one_percentage = $sf4_s_one * 100 / $total;;
		echo $this->Number->precision($sf4_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf4_l_n_percentage = $sf4_l_n * 100 / $total;;
		echo $this->Number->precision($sf4_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf4_l_d_percentage = $sf4_l_d * 100 / $total;;
		echo $this->Number->precision($sf4_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf4_l_hd_percentage = $sf4_l_hd * 100 / $total;;
		echo $this->Number->precision($sf4_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf4_l_m_percentage = $sf4_l_m * 100 / $total;;
		echo $this->Number->precision($sf4_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf4_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf4_s').getContext('2d');
var sf4_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf4_s_negative); ?>, <?= json_encode($sf4_s_zero); ?>, <?= json_encode($sf4_s_pointfive); ?>, <?= json_encode($sf4_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf4_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf4_l').getContext('2d');
var sf4_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf4_l_n); ?>, <?= json_encode($sf4_l_d); ?>, <?= json_encode($sf4_l_hd); ?>, <?= json_encode($sf4_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF4 Table End-->
<!--SF5 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF5</td>
	<td><b>Audit Trail</b><br>provides log tracking for any changes to the electronic records to ensure that validity and integrity</td>
	<td class="text-center"><?php echo $sf5_s_negative; ?></td>
	<td class="text-center"><?php echo $sf5_s_zero; ?></td>
	<td class="text-center"><?php echo $sf5_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf5_s_one; ?></td>
	<td class="text-center"><?php echo $sf5_l_n; ?></td>
	<td class="text-center"><?php echo $sf5_l_d; ?></td>
	<td class="text-center"><?php echo $sf5_l_hd; ?></td>
	<td class="text-center"><?php echo $sf5_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf5_s_negative_percentage = $sf5_s_negative * 100 / $total;
		echo $this->Number->precision($sf5_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf5_s_zero_percentage = $sf5_s_zero * 100 / $total;;
		echo $this->Number->precision($sf5_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf5_s_pointfive_percentage = $sf5_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf5_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf5_s_one_percentage = $sf5_s_one * 100 / $total;;
		echo $this->Number->precision($sf5_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf5_l_n_percentage = $sf5_l_n * 100 / $total;;
		echo $this->Number->precision($sf5_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf5_l_d_percentage = $sf5_l_d * 100 / $total;;
		echo $this->Number->precision($sf5_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf5_l_hd_percentage = $sf5_l_hd * 100 / $total;;
		echo $this->Number->precision($sf5_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf5_l_m_percentage = $sf5_l_m * 100 / $total;;
		echo $this->Number->precision($sf5_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf5_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf5_s').getContext('2d');
var sf5_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf5_s_negative); ?>, <?= json_encode($sf5_s_zero); ?>, <?= json_encode($sf5_s_pointfive); ?>, <?= json_encode($sf5_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf5_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf5_l').getContext('2d');
var sf5_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf5_l_n); ?>, <?= json_encode($sf5_l_d); ?>, <?= json_encode($sf5_l_hd); ?>, <?= json_encode($sf5_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF5 Table End-->
<!--SF6 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF6</td>
	<td><b>Transfer and sharing</b><br>ability to transfer or share the record (internal to external or external to internal) in a single data or bulk data</td>
	<td class="text-center"><?php echo $sf6_s_negative; ?></td>
	<td class="text-center"><?php echo $sf6_s_zero; ?></td>
	<td class="text-center"><?php echo $sf6_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf6_s_one; ?></td>
	<td class="text-center"><?php echo $sf6_l_n; ?></td>
	<td class="text-center"><?php echo $sf6_l_d; ?></td>
	<td class="text-center"><?php echo $sf6_l_hd; ?></td>
	<td class="text-center"><?php echo $sf6_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf6_s_negative_percentage = $sf6_s_negative * 100 / $total;
		echo $this->Number->precision($sf6_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf6_s_zero_percentage = $sf6_s_zero * 100 / $total;;
		echo $this->Number->precision($sf6_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf6_s_pointfive_percentage = $sf6_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf6_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf6_s_one_percentage = $sf6_s_one * 100 / $total;;
		echo $this->Number->precision($sf6_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf6_l_n_percentage = $sf6_l_n * 100 / $total;;
		echo $this->Number->precision($sf6_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf6_l_d_percentage = $sf6_l_d * 100 / $total;;
		echo $this->Number->precision($sf6_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf6_l_hd_percentage = $sf6_l_hd * 100 / $total;;
		echo $this->Number->precision($sf6_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf6_l_m_percentage = $sf6_l_m * 100 / $total;;
		echo $this->Number->precision($sf6_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf6_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf6_s').getContext('2d');
var sf6_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf6_s_negative); ?>, <?= json_encode($sf6_s_zero); ?>, <?= json_encode($sf6_s_pointfive); ?>, <?= json_encode($sf6_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf6_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf6_l').getContext('2d');
var sf6_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf6_l_n); ?>, <?= json_encode($sf6_l_d); ?>, <?= json_encode($sf6_l_hd); ?>, <?= json_encode($sf6_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF6 Table End-->
<!--SF7 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF7</td>
	<td><b>Reporting</b><br>provides a summary related to the current status of records such as total records, active, inactive, the total required appraisal attention and others</td>
	<td class="text-center"><?php echo $sf7_s_negative; ?></td>
	<td class="text-center"><?php echo $sf7_s_zero; ?></td>
	<td class="text-center"><?php echo $sf7_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf7_s_one; ?></td>
	<td class="text-center"><?php echo $sf7_l_n; ?></td>
	<td class="text-center"><?php echo $sf7_l_d; ?></td>
	<td class="text-center"><?php echo $sf7_l_hd; ?></td>
	<td class="text-center"><?php echo $sf7_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf7_s_negative_percentage = $sf7_s_negative * 100 / $total;
		echo $this->Number->precision($sf7_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf7_s_zero_percentage = $sf7_s_zero * 100 / $total;;
		echo $this->Number->precision($sf7_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf7_s_pointfive_percentage = $sf7_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf7_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf7_s_one_percentage = $sf7_s_one * 100 / $total;;
		echo $this->Number->precision($sf7_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf7_l_n_percentage = $sf7_l_n * 100 / $total;;
		echo $this->Number->precision($sf7_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf7_l_d_percentage = $sf7_l_d * 100 / $total;;
		echo $this->Number->precision($sf7_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf7_l_hd_percentage = $sf7_l_hd * 100 / $total;;
		echo $this->Number->precision($sf7_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf7_l_m_percentage = $sf7_l_m * 100 / $total;;
		echo $this->Number->precision($sf7_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf7_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf7_s').getContext('2d');
var sf7_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf7_s_negative); ?>, <?= json_encode($sf7_s_zero); ?>, <?= json_encode($sf7_s_pointfive); ?>, <?= json_encode($sf7_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf7_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf7_l').getContext('2d');
var sf7_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf7_l_n); ?>, <?= json_encode($sf7_l_d); ?>, <?= json_encode($sf7_l_hd); ?>, <?= json_encode($sf7_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF7 Table End-->
<!--SF8 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF8</td>
	<td><b>Retention</b><br>list how long each record series must be kept (the retention period), when the retention period starts (the cut-off), and the proper way to dispose of the record once retention is met (the disposition method)</td>
	<td class="text-center"><?php echo $sf8_s_negative; ?></td>
	<td class="text-center"><?php echo $sf8_s_zero; ?></td>
	<td class="text-center"><?php echo $sf8_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf8_s_one; ?></td>
	<td class="text-center"><?php echo $sf8_l_n; ?></td>
	<td class="text-center"><?php echo $sf8_l_d; ?></td>
	<td class="text-center"><?php echo $sf8_l_hd; ?></td>
	<td class="text-center"><?php echo $sf8_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf8_s_negative_percentage = $sf8_s_negative * 100 / $total;
		echo $this->Number->precision($sf8_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf8_s_zero_percentage = $sf8_s_zero * 100 / $total;;
		echo $this->Number->precision($sf8_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf8_s_pointfive_percentage = $sf8_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf8_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf8_s_one_percentage = $sf8_s_one * 100 / $total;;
		echo $this->Number->precision($sf8_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf8_l_n_percentage = $sf8_l_n * 100 / $total;;
		echo $this->Number->precision($sf8_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf8_l_d_percentage = $sf8_l_d * 100 / $total;;
		echo $this->Number->precision($sf8_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf8_l_hd_percentage = $sf8_l_hd * 100 / $total;;
		echo $this->Number->precision($sf8_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf8_l_m_percentage = $sf8_l_m * 100 / $total;;
		echo $this->Number->precision($sf8_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf8_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf8_s').getContext('2d');
var sf8_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf8_s_negative); ?>, <?= json_encode($sf8_s_zero); ?>, <?= json_encode($sf8_s_pointfive); ?>, <?= json_encode($sf8_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf8_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf8_l').getContext('2d');
var sf8_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf8_l_n); ?>, <?= json_encode($sf8_l_d); ?>, <?= json_encode($sf8_l_hd); ?>, <?= json_encode($sf8_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF8 Table End-->
<!--SF9 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF9</td>
	<td><b>Appraisal</b><br>the process of determining the archival value and ultimate disposition of records. Appraisal decisions are informed by several factors including the historical, legal, operational and financial value of the records</td>
	<td class="text-center"><?php echo $sf9_s_negative; ?></td>
	<td class="text-center"><?php echo $sf9_s_zero; ?></td>
	<td class="text-center"><?php echo $sf9_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf9_s_one; ?></td>
	<td class="text-center"><?php echo $sf9_l_n; ?></td>
	<td class="text-center"><?php echo $sf9_l_d; ?></td>
	<td class="text-center"><?php echo $sf9_l_hd; ?></td>
	<td class="text-center"><?php echo $sf9_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf9_s_negative_percentage = $sf9_s_negative * 100 / $total;
		echo $this->Number->precision($sf9_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf9_s_zero_percentage = $sf9_s_zero * 100 / $total;;
		echo $this->Number->precision($sf9_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf9_s_pointfive_percentage = $sf9_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf9_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf9_s_one_percentage = $sf9_s_one * 100 / $total;;
		echo $this->Number->precision($sf9_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf9_l_n_percentage = $sf9_l_n * 100 / $total;;
		echo $this->Number->precision($sf9_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf9_l_d_percentage = $sf9_l_d * 100 / $total;;
		echo $this->Number->precision($sf9_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf9_l_hd_percentage = $sf9_l_hd * 100 / $total;;
		echo $this->Number->precision($sf9_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf9_l_m_percentage = $sf9_l_m * 100 / $total;;
		echo $this->Number->precision($sf9_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf9_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf9_s').getContext('2d');
var sf9_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf9_s_negative); ?>, <?= json_encode($sf9_s_zero); ?>, <?= json_encode($sf9_s_pointfive); ?>, <?= json_encode($sf9_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf9_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf9_l').getContext('2d');
var sf9_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf9_l_n); ?>, <?= json_encode($sf9_l_d); ?>, <?= json_encode($sf9_l_hd); ?>, <?= json_encode($sf9_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF9 Table End-->
<!--SF10 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF10</td>
	<td><b>Archiving</b><br>the records will be permanently stored, inactive but accessible for future references</td>
	<td class="text-center"><?php echo $sf10_s_negative; ?></td>
	<td class="text-center"><?php echo $sf10_s_zero; ?></td>
	<td class="text-center"><?php echo $sf10_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf10_s_one; ?></td>
	<td class="text-center"><?php echo $sf10_l_n; ?></td>
	<td class="text-center"><?php echo $sf10_l_d; ?></td>
	<td class="text-center"><?php echo $sf10_l_hd; ?></td>
	<td class="text-center"><?php echo $sf10_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf10_s_negative_percentage = $sf10_s_negative * 100 / $total;
		echo $this->Number->precision($sf10_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf10_s_zero_percentage = $sf10_s_zero * 100 / $total;;
		echo $this->Number->precision($sf10_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf10_s_pointfive_percentage = $sf10_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf10_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf10_s_one_percentage = $sf10_s_one * 100 / $total;;
		echo $this->Number->precision($sf10_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf10_l_n_percentage = $sf10_l_n * 100 / $total;;
		echo $this->Number->precision($sf10_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf10_l_d_percentage = $sf10_l_d * 100 / $total;;
		echo $this->Number->precision($sf10_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf10_l_hd_percentage = $sf10_l_hd * 100 / $total;;
		echo $this->Number->precision($sf10_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf10_l_m_percentage = $sf10_l_m * 100 / $total;;
		echo $this->Number->precision($sf10_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf10_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf10_s').getContext('2d');
var sf10_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf10_s_negative); ?>, <?= json_encode($sf10_s_zero); ?>, <?= json_encode($sf10_s_pointfive); ?>, <?= json_encode($sf10_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf10_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf10_l').getContext('2d');
var sf10_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf10_l_n); ?>, <?= json_encode($sf10_l_d); ?>, <?= json_encode($sf10_l_hd); ?>, <?= json_encode($sf10_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF10 Table End-->
<!--SF11 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF11</td>
	<td><b>Disposition</b><br>the process of destruction of records</td>
	<td class="text-center"><?php echo $sf11_s_negative; ?></td>
	<td class="text-center"><?php echo $sf11_s_zero; ?></td>
	<td class="text-center"><?php echo $sf11_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf11_s_one; ?></td>
	<td class="text-center"><?php echo $sf11_l_n; ?></td>
	<td class="text-center"><?php echo $sf11_l_d; ?></td>
	<td class="text-center"><?php echo $sf11_l_hd; ?></td>
	<td class="text-center"><?php echo $sf11_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf11_s_negative_percentage = $sf11_s_negative * 100 / $total;
		echo $this->Number->precision($sf11_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf11_s_zero_percentage = $sf11_s_zero * 100 / $total;;
		echo $this->Number->precision($sf11_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf11_s_pointfive_percentage = $sf11_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf11_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf11_s_one_percentage = $sf11_s_one * 100 / $total;;
		echo $this->Number->precision($sf11_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf11_l_n_percentage = $sf11_l_n * 100 / $total;;
		echo $this->Number->precision($sf11_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf11_l_d_percentage = $sf11_l_d * 100 / $total;;
		echo $this->Number->precision($sf11_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf11_l_hd_percentage = $sf11_l_hd * 100 / $total;;
		echo $this->Number->precision($sf11_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf11_l_m_percentage = $sf11_l_m * 100 / $total;;
		echo $this->Number->precision($sf11_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf11_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf11_s').getContext('2d');
var sf11_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf11_s_negative); ?>, <?= json_encode($sf11_s_zero); ?>, <?= json_encode($sf11_s_pointfive); ?>, <?= json_encode($sf11_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf11_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf11_l').getContext('2d');
var sf11_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf11_l_n); ?>, <?= json_encode($sf11_l_d); ?>, <?= json_encode($sf11_l_hd); ?>, <?= json_encode($sf11_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF11 Table End-->
<!--SF12 Table Start-->
<table class="table table-hover table-bordered">
<tr>
	<th colspan='2' width=""></th>
	<th colspan='4' class="text-center bg-purple">Feature Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center bg-secondary">
	<th>SF#</th>
	<th>Description</th>
	<th width="100px">Make things worse<br>(-1)</th>
	<th width="100px">No support<br>(0)</th>
	<th width="100px">Partly support<br>(0.5)</th>
	<th width="100px">Full support<br>(1)</th>
	<th width="100px">Nice to have<br>(N)</th>
	<th width="100px">Desirable<br>(D)</th>
	<th width="100px">Highly desirable<br>(HD)</th>
	<th width="100px">Mandatory<br>(M)</th>
</tr>
<tr>
	<td class="text-center">SF12</td>
	<td><b>Others</b><br>the UI and others supporting component that supports the web application design and data presentation is working</td>
	<td class="text-center"><?php echo $sf12_s_negative; ?></td>
	<td class="text-center"><?php echo $sf12_s_zero; ?></td>
	<td class="text-center"><?php echo $sf12_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf12_s_one; ?></td>
	<td class="text-center"><?php echo $sf12_l_n; ?></td>
	<td class="text-center"><?php echo $sf12_l_d; ?></td>
	<td class="text-center"><?php echo $sf12_l_hd; ?></td>
	<td class="text-center"><?php echo $sf12_l_m; ?></td>
</tr>
<tr>
	<td class="text-right" colspan="2">Percentage(%)</td>
	<td class="text-center">
		<?php $sf12_s_negative_percentage = $sf12_s_negative * 100 / $total;
		echo $this->Number->precision($sf12_s_negative_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf12_s_zero_percentage = $sf12_s_zero * 100 / $total;;
		echo $this->Number->precision($sf12_s_zero_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf12_s_pointfive_percentage = $sf12_s_pointfive * 100 / $total;;
		echo $this->Number->precision($sf12_s_pointfive_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf12_s_one_percentage = $sf12_s_one * 100 / $total;;
		echo $this->Number->precision($sf12_s_one_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf12_l_n_percentage = $sf12_l_n * 100 / $total;;
		echo $this->Number->precision($sf12_l_n_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf12_l_d_percentage = $sf12_l_d * 100 / $total;;
		echo $this->Number->precision($sf12_l_d_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf12_l_hd_percentage = $sf12_l_hd * 100 / $total;;
		echo $this->Number->precision($sf12_l_hd_percentage, 2); ?></td>
	<td class="text-center">
		<?php $sf12_l_m_percentage = $sf12_l_m * 100 / $total;;
		echo $this->Number->precision($sf12_l_m_percentage, 2); ?></td>
</tr>
<tr>
	<td colspan="2"></td>
	<td colspan="4">
<canvas id="sf12_s" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf12_s').getContext('2d');
var sf12_s = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['-1', '0', '0.5', '1'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf12_s_negative); ?>, <?= json_encode($sf12_s_zero); ?>, <?= json_encode($sf12_s_pointfive); ?>, <?= json_encode($sf12_s_one); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Features Score'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
	<td colspan="4">
<canvas id="sf12_l" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('sf12_l').getContext('2d');
var sf12_l = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['N', 'D', 'HD', 'M'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($sf12_l_n); ?>, <?= json_encode($sf12_l_d); ?>, <?= json_encode($sf12_l_hd); ?>, <?= json_encode($sf12_l_m); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: true,
			text: 'Level of Importance'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
	</td>
</tr>
</table>
<!--SF12 Table End-->

<hr>


<table class="table table-hover table-borderless">
<tr>
	<th colspan='2'></th>
	<th colspan='4' class="text-center bg-purple">Score</th>
	<th colspan='4' class="text-center bg-yellow">Level of importance</th>
</tr>
<tr class="text-center">
	<th>SF#</th>
	<th class="text-center ">Description</th>
	<th>Make things worse<br>(-1)</th>
	<th>No support<br>(0)</th>
	<th>Partly support<br>(0.5)</th>
	<th>Full support<br>(1)</th>
	<th>Nice to have<br>(N)</th>
	<th>Desirable<br>(D)</th>
	<th>Highly desirable<br>(HD)</th>
	<th>Mandatory<br>(M)</th>
</tr>
<!--SF1 Start-->
<tr>
	<td class="text-center">SF1</td>
	<td><b>Code Automation CRUD with integrated ERM features</b><br>The automation of code generation for persistent storage</td>
	<td class="text-center"><?php echo $sf1_s_negative; ?></td>
	<td class="text-center"><?php echo $sf1_s_zero; ?></td>
	<td class="text-center"><?php echo $sf1_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf1_s_one; ?></td>
	<td class="text-center"><?php echo $sf1_l_n; ?></td>
	<td class="text-center"><?php echo $sf1_l_d; ?></td>
	<td class="text-center"><?php echo $sf1_l_hd; ?></td>
	<td class="text-center"><?php echo $sf1_l_m; ?></td>
</tr>
<!--SF1 End-->
<!--SF2 Start-->
<tr>
	<td class="text-center">SF2</td>
	<td><b>Authentication and Authorization</b><br>Provides a role-based access control mechanism web application to offer protection from unauthorized access</td>
	<td class="text-center"><?php echo $sf2_s_negative; ?></td>
	<td class="text-center"><?php echo $sf2_s_zero; ?></td>
	<td class="text-center"><?php echo $sf2_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf2_s_one; ?></td>
	<td class="text-center"><?php echo $sf2_l_n; ?></td>
	<td class="text-center"><?php echo $sf2_l_d; ?></td>
	<td class="text-center"><?php echo $sf2_l_hd; ?></td>
	<td class="text-center"><?php echo $sf2_l_m; ?></td>
</tr>
<!--SF2 End-->
<!--SF3 Start-->
<tr>
	<td class="text-center">SF3</td>
	<td><b>Inventory</b><br>a descriptive listing of each record series or system, together with an indication of the location, access and other pertinent data</td>
	<td class="text-center"><?php echo $sf3_s_negative; ?></td>
	<td class="text-center"><?php echo $sf3_s_zero; ?></td>
	<td class="text-center"><?php echo $sf3_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf3_s_one; ?></td>
	<td class="text-center"><?php echo $sf3_l_n; ?></td>
	<td class="text-center"><?php echo $sf3_l_d; ?></td>
	<td class="text-center"><?php echo $sf3_l_hd; ?></td>
	<td class="text-center"><?php echo $sf3_l_m; ?></td>
</tr>
<!--SF3 End-->
<!--SF4 Start-->
<tr>
	<td class="text-center">SF4</td>
	<td><b>Search</b><br>Ability to locate and retrieve data/record based on specific metadata, keyword or phrases</td>
	<td class="text-center"><?php echo $sf4_s_negative; ?></td>
	<td class="text-center"><?php echo $sf4_s_zero; ?></td>
	<td class="text-center"><?php echo $sf4_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf4_s_one; ?></td>
	<td class="text-center"><?php echo $sf4_l_n; ?></td>
	<td class="text-center"><?php echo $sf4_l_d; ?></td>
	<td class="text-center"><?php echo $sf4_l_hd; ?></td>
	<td class="text-center"><?php echo $sf4_l_m; ?></td>
</tr>
<!--SF4 End-->
<!--SF5 Start-->
<tr>
	<td class="text-center">SF5</td>
	<td><b>Audit Trail</b><br>provides log tracking for any changes to the electronic records to ensure that validity and integrity</td>
	<td class="text-center"><?php echo $sf5_s_negative; ?></td>
	<td class="text-center"><?php echo $sf5_s_zero; ?></td>
	<td class="text-center"><?php echo $sf5_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf5_s_one; ?></td>
	<td class="text-center"><?php echo $sf5_l_n; ?></td>
	<td class="text-center"><?php echo $sf5_l_d; ?></td>
	<td class="text-center"><?php echo $sf5_l_hd; ?></td>
	<td class="text-center"><?php echo $sf5_l_m; ?></td>
</tr>
<!--SF5 End-->
<!--SF6 Start-->
<tr>
	<td class="text-center">SF6</td>
	<td><b>Transfer and sharing</b><br>ability to transfer or share the record (internal to external or external to internal) in a single data or bulk data</td>
	<td class="text-center"><?php echo $sf6_s_negative; ?></td>
	<td class="text-center"><?php echo $sf6_s_zero; ?></td>
	<td class="text-center"><?php echo $sf6_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf6_s_one; ?></td>
	<td class="text-center"><?php echo $sf6_l_n; ?></td>
	<td class="text-center"><?php echo $sf6_l_d; ?></td>
	<td class="text-center"><?php echo $sf6_l_hd; ?></td>
	<td class="text-center"><?php echo $sf6_l_m; ?></td>
</tr>
<!--SF6 End-->
<!--SF7 Start-->
<tr>
	<td class="text-center">SF7</td>
	<td><b>Reporting</b><br>provides a summary related to the current status of records such as total records, active, inactive, the total required appraisal attention and others</td>
	<td class="text-center"><?php echo $sf7_s_negative; ?></td>
	<td class="text-center"><?php echo $sf7_s_zero; ?></td>
	<td class="text-center"><?php echo $sf7_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf7_s_one; ?></td>
	<td class="text-center"><?php echo $sf7_l_n; ?></td>
	<td class="text-center"><?php echo $sf7_l_d; ?></td>
	<td class="text-center"><?php echo $sf7_l_hd; ?></td>
	<td class="text-center"><?php echo $sf7_l_m; ?></td>
</tr>
<!--SF7 End-->
<!--SF8 Start-->
<tr>
	<td class="text-center">SF8</td>
	<td><b>Retention</b><br>list how long each record series must be kept (the retention period), when the retention period starts (the cut-off), and the proper way to dispose of the record once retention is met (the disposition method)</td>
	<td class="text-center"><?php echo $sf8_s_negative; ?></td>
	<td class="text-center"><?php echo $sf8_s_zero; ?></td>
	<td class="text-center"><?php echo $sf8_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf8_s_one; ?></td>
	<td class="text-center"><?php echo $sf8_l_n; ?></td>
	<td class="text-center"><?php echo $sf8_l_d; ?></td>
	<td class="text-center"><?php echo $sf8_l_hd; ?></td>
	<td class="text-center"><?php echo $sf8_l_m; ?></td>
</tr>
<!--SF8 End-->
<!--SF9 Start-->
<tr>
	<td class="text-center">SF9</td>
	<td><b>Appraisal</b><br>the process of determining the archival value and ultimate disposition of records. Appraisal decisions are informed by several factors including the historical, legal, operational and financial value of the records</td>
	<td class="text-center"><?php echo $sf9_s_negative; ?></td>
	<td class="text-center"><?php echo $sf9_s_zero; ?></td>
	<td class="text-center"><?php echo $sf9_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf9_s_one; ?></td>
	<td class="text-center"><?php echo $sf9_l_n; ?></td>
	<td class="text-center"><?php echo $sf9_l_d; ?></td>
	<td class="text-center"><?php echo $sf9_l_hd; ?></td>
	<td class="text-center"><?php echo $sf9_l_m; ?></td>
</tr>
<!--SF9 End-->
<!--SF10 Start-->
<tr>
	<td class="text-center">SF10</td>
	<td><b>Archiving</b><br>the records will be permanently stored, inactive but accessible for future references</td>
	<td class="text-center"><?php echo $sf10_s_negative; ?></td>
	<td class="text-center"><?php echo $sf10_s_zero; ?></td>
	<td class="text-center"><?php echo $sf10_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf10_s_one; ?></td>
	<td class="text-center"><?php echo $sf10_l_n; ?></td>
	<td class="text-center"><?php echo $sf10_l_d; ?></td>
	<td class="text-center"><?php echo $sf10_l_hd; ?></td>
	<td class="text-center"><?php echo $sf10_l_m; ?></td>
</tr>
<!--SF10 End-->
<!--SF11 Start-->
<tr>
	<td class="text-center">SF11</td>
	<td><b>Disposition</b><br>the process of destruction of records</td>
	<td class="text-center"><?php echo $sf11_s_negative; ?></td>
	<td class="text-center"><?php echo $sf11_s_zero; ?></td>
	<td class="text-center"><?php echo $sf11_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf11_s_one; ?></td>
	<td class="text-center"><?php echo $sf11_l_n; ?></td>
	<td class="text-center"><?php echo $sf11_l_d; ?></td>
	<td class="text-center"><?php echo $sf11_l_hd; ?></td>
	<td class="text-center"><?php echo $sf11_l_m; ?></td>
</tr>
<!--SF11 End-->
<!--SF12 Start-->
<tr>
	<td class="text-center">SF12</td>
	<td><b>Others</b><br>the UI and others supporting component that supports the web application design and data presentation is working</td>
	<td class="text-center"><?php echo $sf12_s_negative; ?></td>
	<td class="text-center"><?php echo $sf12_s_zero; ?></td>
	<td class="text-center"><?php echo $sf12_s_pointfive; ?></td>
	<td class="text-center"><?php echo $sf12_s_one; ?></td>
	<td class="text-center"><?php echo $sf12_l_n; ?></td>
	<td class="text-center"><?php echo $sf12_l_d; ?></td>
	<td class="text-center"><?php echo $sf12_l_hd; ?></td>
	<td class="text-center"><?php echo $sf12_l_m; ?></td>
</tr>
<!--SF12 End-->







</table>


	</div>
</div>


<script>
 function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }
</script>