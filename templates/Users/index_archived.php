<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
			<?= $this->Html->link(__('<i class="fas fa-plus"></i> New User'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="far fa-chart-bar"></i> Report'), ['action' => 'report'], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="far fa-clipboard"></i> Retention List'), ['action' => 'retention_list'], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="fas fa-fire-alt"></i> Disposed'), ['action' => 'indexDisposed'], ['class' => 'dropdown-item', 'escape' => false, 'title' => 'Disposed List']) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="fas fa-list"></i> List'), ['action' => 'index'], ['class' => 'dropdown-item', 'escape' => false]) ?>
  </div>
</div>
</div>
<div class="card2">
	<div class="header">
				<div class="panel_card2_title">Users Archived</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
		<div class="body">
			<div class="col-md-12 table-responsive">
				<table id="main_index" class="table table-hover">
					<thead>
				<tr>
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
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
					</thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
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
                    <td><?= h($user->rm_retention) ?></td>
                    <td><?= h($user->rm_act_on) ?></td>
                    <td><?= h($user->rm_act_by) ?></td>
                    <td><?= h($user->created) ?></td>
                    <td><?= h($user->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('<i class="far fa-folder-open"></i> View'), ['action' => 'view', $user->id], ['class' => 'btn btn-outline-success btn-xs', 'escape' => false]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
				</table>
			</div>
<?php if ($count_find_result != NULL): ?>
<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-xs-3">
<?php echo $this->Paginator->limitControl([10 => 'Show 10 entries',25 => 'Show 25 entries', 50 => 'Show 50 entries', 100 => 'Show 100 entries'], $user->perPage,['class' => 'form-control form-control-sm','label' => false]); ?>
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