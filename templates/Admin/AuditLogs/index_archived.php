<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AuditLog[]|\Cake\Collection\CollectionInterface $auditLogs
 */
?>
<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
			<?= $this->Html->link(__('<i class="fas fa-plus"></i> New Audit Log'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
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
				<div class="panel_card2_title">Audit Logs Archived</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
		<div class="body">
			<div class="col-md-12 table-responsive">
				<table id="main_index" class="table table-hover">
					<thead>
				<tr>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('transaction') ?></th>
					<th><?= $this->Paginator->sort('type') ?></th>
					<th><?= $this->Paginator->sort('primary_key') ?></th>
					<th><?= $this->Paginator->sort('source') ?></th>
					<th><?= $this->Paginator->sort('parent_source') ?></th>
					<th><?= $this->Paginator->sort('created') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
					</thead>
            <tbody>
                <?php foreach ($auditLogs as $auditLog): ?>
                <tr>
                    <td><?= $this->Number->format($auditLog->id) ?></td>
                    <td><?= h($auditLog->transaction) ?></td>
                    <td><?= h($auditLog->type) ?></td>
                    <td><?= $this->Number->format($auditLog->primary_key) ?></td>
                    <td><?= h($auditLog->source) ?></td>
                    <td><?= h($auditLog->parent_source) ?></td>
                    <td><?= h($auditLog->created) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('<i class="far fa-folder-open"></i> View'), ['action' => 'view', $auditLog->id], ['class' => 'btn btn-outline-success btn-xs', 'escape' => false]) ?>
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
<?php echo $this->Paginator->limitControl([10 => 'Show 10 entries',25 => 'Show 25 entries', 50 => 'Show 50 entries', 100 => 'Show 100 entries'], $auditLog->perPage,['class' => 'form-control form-control-sm','label' => false]); ?>
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