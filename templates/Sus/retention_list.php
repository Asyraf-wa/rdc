<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sus[]|\Cake\Collection\CollectionInterface $sus
 */
$c_name = $this->request->getParam('controller');
?>
<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
			<?= $this->Html->link(__('<i class="fas fa-plus"></i> New Sus'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="far fa-chart-bar"></i> Report'), ['action' => 'report'], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="far fa-folder"></i> Archived'), ['action' => 'indexArchived'], ['class' => 'dropdown-item', 'escape' => false, 'target' => 'blank', 'title' => 'Archived List']) ?>
		<?= $this->Html->link(__('<i class="fas fa-fire-alt"></i> Disposed'), ['action' => 'indexDisposed'], ['class' => 'dropdown-item', 'escape' => false, 'title' => 'Disposed List']) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="fas fa-list"></i> List'), ['action' => 'index'], ['class' => 'dropdown-item', 'escape' => false]) ?>
  </div>
</div>
</div>
<div class="card2">
	<div class="header">
				<div class="panel_card2_title">Retention List: <?php echo date('F d, Y'); ?></div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
		<div class="body">
			<div class="col-md-12 table-responsive">
				<table id="main_index" class="table table-hover">
					<thead>
				<tr>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('user_id') ?></th>
					<th><?= $this->Paginator->sort('q1') ?></th>
					<th><?= $this->Paginator->sort('q2') ?></th>
					<th><?= $this->Paginator->sort('q3') ?></th>
					<th><?= $this->Paginator->sort('q4') ?></th>
					<th><?= $this->Paginator->sort('q5') ?></th>
					<th><?= $this->Paginator->sort('q6') ?></th>
					<th><?= $this->Paginator->sort('q7') ?></th>
					<th><?= $this->Paginator->sort('q8') ?></th>
					<th><?= $this->Paginator->sort('q9') ?></th>
					<th><?= $this->Paginator->sort('q10') ?></th>
					<th><?= $this->Paginator->sort('status') ?></th>
					<th><?= $this->Paginator->sort('hits') ?></th>
					<th><?= $this->Paginator->sort('rm_retention') ?></th>
					<th><?= $this->Paginator->sort('rm_act_on') ?></th>
					<th><?= $this->Paginator->sort('rm_act_by') ?></th>
					<th><?= $this->Paginator->sort('created') ?></th>
					<th><?= $this->Paginator->sort('modified') ?></th>
					<th class="actions" style="text-align: center;"><?= __('Appraisal Actions') ?></th>
				</tr>
					</thead>
            <tbody>
                <?php foreach ($sus as $sus): ?>
                <tr>
                    <td><?= $this->Number->format($sus->id) ?></td>
                    <td><?= $sus->has('user') ? $this->Html->link($sus->user->id, ['controller' => 'Users', 'action' => 'view', $sus->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($sus->q1) ?></td>
                    <td><?= $this->Number->format($sus->q2) ?></td>
                    <td><?= $this->Number->format($sus->q3) ?></td>
                    <td><?= $this->Number->format($sus->q4) ?></td>
                    <td><?= $this->Number->format($sus->q5) ?></td>
                    <td><?= $this->Number->format($sus->q6) ?></td>
                    <td><?= $this->Number->format($sus->q7) ?></td>
                    <td><?= $this->Number->format($sus->q8) ?></td>
                    <td><?= $this->Number->format($sus->q9) ?></td>
                    <td><?= $this->Number->format($sus->q10) ?></td>
                    <td><?= $this->Number->format($sus->status) ?></td>
                    <td><?= $this->Number->format($sus->hits) ?></td>
                    <td><?= date('d M Y', strtotime($sus->rm_retention)); ?></td>
                    <td><?= date('d M Y', strtotime($sus->rm_act_on)); ?></td>
                    <td><?= h($sus->rm_act_by) ?></td>
                    <td><?= date('d M Y (h:i A)', strtotime($sus->created)); ?></td>
                    <td><?= date('d M Y (h:i A)', strtotime($sus->modified)); ?></td>
                    <td class="actions" align="center">	
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="far fa-folder-open"></i> View'), ['action' => 'view', $sus->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<button type="button" class="dropdown-item" data-toggle="modal" data-target="#appraisal<?= $sus->id; ?>"><i class="far fa-clipboard"></i> Appraisal</button>
  </div>
</div>
                    </td>
                </tr>
<!--modal Appraisal Start-->
<div class="modal fade" id="appraisal<?= $sus->id; ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Appraisal Form</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
<?php
$created = date_create($sus->created);
$rm_retention = date_create($sus->rm_retention);
$now = new DateTime("now");
?>

<div class="row">
	<div class="col-md-4 text-center">
	<i class="fas fa-random fa-10x"></i>
	</div>
	<div class="col-md-8">
<div class="row">
	<div class="col-md-6">
Current status
	</div>
	<div class="col-md-6">
			<?php if ($sus->status == '0'){
					echo '<span class="badge badge-warning">Inactive</span>';
				}elseif ($sus->status == '1'){
					echo '<span class="badge badge-success">Active</span>';
				}elseif ($sus->status == '2'){
					echo '<span class="badge badge-info">Archived</span>';
				}elseif ($sus->status == '3'){
					echo '<span class="badge badge-danger">Disposed</span>';
				}else
					echo '<span class="badge badge-danger">Error</span>';
			?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
	Created on
	</div>
	<div class="col-md-6">
	<?php echo date('F d, Y', strtotime($sus->created)); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
	Days from record registered
	</div>
	<div class="col-md-6">
	<?php $interval = date_diff($created, $now);
			echo $interval->format('%y Year %m Month %d Day');?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
	Retention date
	</div>
	<div class="col-md-6">
	<?php echo date('F d, Y', strtotime($sus->rm_retention)); ?>
	</div>
</div>

<div class="row">
	<div class="col-md-6">
	Remaining days until retention
	</div>
	<div class="col-md-6">
	<?php $interval = date_diff($now, $rm_retention);
		echo $interval->format('%y Year %m Month %d Day'); ?>
	</div>
</div>
	</div>
</div>

<hr>
			<ul class="">
				<li>You're currently appraising the record id: <strong><?= $sus->id; ?></strong> from <strong><?= $c_name; ?></strong> repository.</li>
				<li>Plase select the relevant action for the record.</li>
				<li>Please note that this operation is not reversible.</li>
				<li>This action is authorized by <strong><?= $auth_username; ?> (<?= $auth_email; ?>)</strong> on <?= date('F d, Y'); ?></li>
			</ul>
<div>
	<input type="checkbox" id="terms_and_conditions<?= $sus->id; ?>" value="1" />
	<label for="terms_and_conditions<?= $sus->id; ?>">I agree to the aforementioned Terms and Conditions and authorized this action.</label>
</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-primary btn-flat" data-dismiss="modal">Cancel</button>
			<button type="button" id="submit_button<?= $sus->id; ?>" class="btn btn-outline-info btn-flat" data-toggle="modal" data-target="#archived<?php echo $sus->id; ?>" disabled data-dismiss="modal"><i class="fas fa-archive"></i> Archived</button>
			<button type="button" id="disposed_button<?= $sus->id; ?>" class="btn btn-outline-danger btn-flat" data-toggle="modal" data-target="#disposed<?php echo $sus->id; ?>" disabled data-dismiss="modal"><i class="far fa-trash-alt"></i> Disposed</button>

<script type="text/javascript">
$('#terms_and_conditions<?= $sus->id; ?>').click(function(){
    //If the checkbox is checked.
    if($(this).is(':checked')){
        //Enable the submit button.
        $('#submit_button<?= $sus->id; ?>').attr("disabled", false);
        $('#disposed_button<?= $sus->id; ?>').attr("disabled", false);
    } else{
        //If it is not checked, disable the button.
        $('#submit_button<?= $sus->id; ?>').attr("disabled", true);
        $('#disposed_button<?= $sus->id; ?>').attr("disabled", true);
    }
});
</script>

		</div>
		</div>
	</div>
</div>
<!--modal Appraisal end-->
<!--modal Archived Start-->
<div class="modal fade" id="archived<?php echo $sus->id; ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-info">
		<div class="modal-header">
			<h4 class="modal-title">Transfer to Archive Request Confirmation</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-4">
				<center><i class="fas fa-exclamation-circle fa-10x"></i></center>
				</div>
				<div class="col-md-8">
			<ul class="">
				<li>You're requesting to archived the record id: <strong><?= $sus->id; ?></strong> from <strong><?= $c_name; ?></strong> repository.</li>
				<li>Please note that this operation is not reversible</li>
				<li>The record will be archived and removed from the active list</li>
			</ul>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-light btn-flat" data-dismiss="modal">No</button>
			<?= $this->Form->postLink(__('Yes'), ['action' => 'transferArchived', $sus->id], ['class' => 'btn btn-outline-light btn-flat']); ?>
		</div>
		</div>
	</div>
</div>
<!--modal Archived end-->
<!--modal Disposed Start-->
<div class="modal fade" id="disposed<?php echo $sus->id; ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content bg-danger">
		<div class="modal-header">
			<h4 class="modal-title">Disposition Request Confirmation</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-4">
				<center><i class="fas fa-exclamation-circle fa-10x"></i></center>
				</div>
				<div class="col-md-8">
			<ul class="">
				<li>You're requesting to dispose the record id: <strong><?= $sus->id; ?></strong> from <strong><?= $c_name; ?></strong> repository.</li>
				<li>Please note that this operation is not reversible</li>
				<li>The record will be disposed and recorded into the disposal list</li>
			</ul>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-light btn-flat" data-dismiss="modal">No</button>
			<?= $this->Form->postLink(__('Yes'), ['action' => 'transferDisposed', $sus->id], ['class' => 'btn btn-outline-light btn-flat']); ?>
		</div>
		</div>
	</div>
</div>
<!--modal Disposed end-->
                <?php endforeach; ?>
            </tbody>
				</table>
			</div>
<?php if ($count_find_result != NULL): ?>
<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-xs-3">
<?php echo $this->Paginator->limitControl([10 => 'Show 10 entries',25 => 'Show 25 entries', 50 => 'Show 50 entries', 100 => 'Show 100 entries'], $sus->perPage,['class' => 'form-control form-control-sm','label' => false]); ?>
			</div>
		</div>
	</div>
	<div class="col-md-6 pull-right">
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