<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
 $c_name = $this->request->getParam('controller');
?>
<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
			<?= $this->Html->link(__('<i class="fas fa-plus"></i> New User'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="fas fa-list"></i> List'), ['action' => 'index'], ['class' => 'dropdown-item', 'escape' => false]) ?>
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
				<div class="panel_card2_title">List of Users</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
		<div class="body">
<div class="row">
	<div class="col-md-6">
		<?php echo $this->Form->create(null, ['valueSources' => 'query']); ?>
		<div class="form-group">
			<?php echo $this->Form->control('id', ['class' => 'form-control','required' => false, 'placeholder' => 'Record ID']); ?>
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		<?php echo $this->Form->control('status', [
				'class' => 'form-control',
				'required' => false,
				'options' => [
					'0' => 'Inactive',
					'1' => 'Active', 
					'2' => 'Archived',
					'3' => 'Disposed',
					], 
				'empty' => 'Select Status']); ?>
		</div>
	</div>
</div>	
<div class="pull-right">
<?php if (!empty($_isSearch)) {
	echo ' ';
	echo $this->Html->link(__('Reset'), ['action' => 'search', '?' => array_intersect_key($this->request->getQuery(), array_flip(['sort', 'direction']))], ['class' => 'btn btn-outline-primary btn-flat']);
}
?> &nbsp;
<?php echo $this->Form->button(__('Search'), ['class' => 'btn btn-outline-primary btn-flat']); ?>
<?php echo $this->Form->end(); ?>	
</div>
<br>

<?= $this->Form->create(null,['url'=>['action'=>'change']]) ?>
			<div class="col-md-12 table-responsive">
				<table id="main_index" class="table table-hover">
					<thead>
				<tr>
					<th><?= $this->Form->checkbox('check[]',['onchange'=>'checkAll(this)', 'name'=>'chk[]']) ?></th>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('username') ?></th>
					<th><?= $this->Paginator->sort('password') ?></th>
					<th><?= $this->Paginator->sort('email') ?></th>
					<th><?= $this->Paginator->sort('fullname') ?></th>
					<th><?= $this->Paginator->sort('age') ?></th>
					<th><?= $this->Paginator->sort('gender') ?></th>
					<th><?= $this->Paginator->sort('highest_qualification') ?></th>
					<th><?= $this->Paginator->sort('current_working_post') ?></th>
					<th><?= $this->Paginator->sort('dev_experience') ?></th>
					<th><?= $this->Paginator->sort('dev_sector') ?></th>
					<th><?= $this->Paginator->sort('primary_language') ?></th>
					<th><?= $this->Paginator->sort('status') ?></th>
					<th><?= $this->Paginator->sort('slug') ?></th>
					<th><?= $this->Paginator->sort('hits') ?></th>
					<th><?= $this->Paginator->sort('rm_retention') ?></th>
					<th><?= $this->Paginator->sort('rm_act_on') ?></th>
					<th><?= $this->Paginator->sort('rm_act_by') ?></th>
					<th><?= $this->Paginator->sort('created') ?></th>
					<th><?= $this->Paginator->sort('modified') ?></th>
					<th class="actions" style="text-align: center;"><?= __('Actions') ?></th>
				</tr>
					</thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
					<td><?php echo $this->Form->checkbox('check[]',['value'=>$user->id]) ?></td>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>					
                    <td><?= h($user->password) ?></td>					
                    <td><?= h($user->email) ?></td>					
                    <td><?= h($user->fullname) ?></td>					
                    <td><?= h($user->age) ?></td>					
                    <td><?= h($user->gender) ?></td>					
                    <td><?= h($user->highest_qualification) ?></td>					
                    <td><?= h($user->current_working_post) ?></td>					
                    <td><?= h($user->dev_experience) ?></td>					
                    <td><?= h($user->dev_sector) ?></td>					
                    <td><?= h($user->primary_language) ?></td>					
                    <td><?= $this->Number->format($user->status) ?></td>
                    <td><?= h($user->slug) ?></td>					
                    <td><?= $this->Number->format($user->hits) ?></td>
                    <td><?= date('d M Y', strtotime($user->rm_retention)); ?></td>
                    <td><?= date('d M Y', strtotime($user->rm_act_on)); ?></td>
                    <td><?= h($user->rm_act_by) ?></td>					
                    <td><?= date('d M Y (h:i A)', strtotime($user->created)); ?></td>
                    <td><?= date('d M Y (h:i A)', strtotime($user->modified)); ?></td>
                    <td class="actions" align="center">	
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="far fa-folder-open"></i> View'), ['action' => 'view', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="far fa-edit"></i> Edit'), ['action' => 'edit', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-trash-alt"></i> Dispose'), ['action' => 'transferDisposed', $user->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#disposed' . $user->id, 'escape' => false]) ?>
  </div>
</div>
                    </td>
                </tr>
<div class="modal fade" id="disposed<?php echo $user->id; ?>">
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
			</ul>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-light btn-flat" data-dismiss="modal">No</button>
			<?= $this->Form->postLink(__('Yes'), ['action' => 'transferDisposed', $user->id], ['class' => 'btn btn-outline-light btn-flat']); ?>
		</div>
		</div>
	</div>
</div>
                <?php endforeach; ?>
            </tbody>
				</table>
			</div>
<?php if ($count_search_result != NULL): ?>

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
<?php echo $this->Paginator->limitControl([10 => 'Show 10 entries',25 => 'Show 25 entries', 50 => 'Show 50 entries', 100 => 'Show 100 entries'], $user->perPage,['class' => 'form-control form-control-sm','label' => false]); ?>
			</div>
		</div>
	</div>
	<div class="col-md-5 pull-right">
<span class="badge bg-primary">Total records: <?php echo $count_search_result; ?></span>
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

<script type="text/javascript">
$(document).ready(function() {
  $(".input select").select2();
});
</script>