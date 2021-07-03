<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Question[]|\Cake\Collection\CollectionInterface $questions
 */
?>
<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
			<?= $this->Html->link(__('<i class="fas fa-plus"></i> New Question'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="far fa-chart-bar"></i> Report'), ['action' => 'report'], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="far fa-clipboard"></i> Retention List'), ['action' => 'retention_list'], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-folder"></i> Archived'), ['action' => 'indexArchived'], ['class' => 'dropdown-item', 'escape' => false, 'target' => 'blank', 'title' => 'Archived List']) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="fas fa-list"></i> List'), ['action' => 'index'], ['class' => 'dropdown-item', 'escape' => false]) ?>
  </div>
</div>
</div>
<div class="card2">
	<div class="header">
				<div class="panel_card2_title">Questions Disposed List</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
		<div class="body">
			<div class="col-md-12 table-responsive">
				<table id="main_index" class="table table-hover text-nowrap">
					<thead>
				<tr>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('user_id') ?></th>
					<th><?= $this->Paginator->sort('sf1_s') ?></th>
					<th><?= $this->Paginator->sort('sf1_l') ?></th>
					<th><?= $this->Paginator->sort('sf2_s') ?></th>
					<th><?= $this->Paginator->sort('sf2_l') ?></th>
					<th><?= $this->Paginator->sort('sf3_s') ?></th>
					<th><?= $this->Paginator->sort('sf3_l') ?></th>
					<th><?= $this->Paginator->sort('sf4_s') ?></th>
					<th><?= $this->Paginator->sort('sf4_l') ?></th>
					<th><?= $this->Paginator->sort('sf5_s') ?></th>
					<th><?= $this->Paginator->sort('sf5_l') ?></th>
					<th><?= $this->Paginator->sort('sf6_s') ?></th>
					<th><?= $this->Paginator->sort('sf6_l') ?></th>
					<th><?= $this->Paginator->sort('sf7_s') ?></th>
					<th><?= $this->Paginator->sort('sf7_l') ?></th>
					<th><?= $this->Paginator->sort('sf8_s') ?></th>
					<th><?= $this->Paginator->sort('sf8_l') ?></th>
					<th><?= $this->Paginator->sort('sf9_s') ?></th>
					<th><?= $this->Paginator->sort('sf9_l') ?></th>
					<th><?= $this->Paginator->sort('sf10_s') ?></th>
					<th><?= $this->Paginator->sort('sf10_l') ?></th>
					<th><?= $this->Paginator->sort('sf11_s') ?></th>
					<th><?= $this->Paginator->sort('sf11_l') ?></th>
					<th><?= $this->Paginator->sort('sf12_s') ?></th>
					<th><?= $this->Paginator->sort('sf12_l') ?></th>
					<th><?= $this->Paginator->sort('status') ?></th>
					<th><?= $this->Paginator->sort('created') ?></th>
					<th><?= $this->Paginator->sort('modified') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
					</thead>
            <tbody>
                <?php foreach ($questions as $question): ?>
                <tr>
                    <td><?= $this->Number->format($question->id) ?></td>
                    <td><?= $question->has('user') ? $this->Html->link($question->user->id, ['controller' => 'Users', 'action' => 'view', $question->user->id]) : '' ?></td>
                    <td><?= h($question->sf1_s) ?></td>
                    <td><?= h($question->sf1_l) ?></td>
                    <td><?= h($question->sf2_s) ?></td>
                    <td><?= h($question->sf2_l) ?></td>
                    <td><?= h($question->sf3_s) ?></td>
                    <td><?= h($question->sf3_l) ?></td>
                    <td><?= h($question->sf4_s) ?></td>
                    <td><?= h($question->sf4_l) ?></td>
                    <td><?= h($question->sf5_s) ?></td>
                    <td><?= h($question->sf5_l) ?></td>
                    <td><?= h($question->sf6_s) ?></td>
                    <td><?= h($question->sf6_l) ?></td>
                    <td><?= h($question->sf7_s) ?></td>
                    <td><?= h($question->sf7_l) ?></td>
                    <td><?= h($question->sf8_s) ?></td>
                    <td><?= h($question->sf8_l) ?></td>
                    <td><?= h($question->sf9_s) ?></td>
                    <td><?= h($question->sf9_l) ?></td>
                    <td><?= h($question->sf10_s) ?></td>
                    <td><?= h($question->sf10_l) ?></td>
                    <td><?= h($question->sf11_s) ?></td>
                    <td><?= h($question->sf11_l) ?></td>
                    <td><?= h($question->sf12_s) ?></td>
                    <td><?= h($question->sf12_l) ?></td>
                    <td><?= h($question->status) ?></td>
                    <td><?= h($question->created) ?></td>
                    <td><?= h($question->modified) ?></td>
                    <td class="actions">
						<?= $this->Form->postLink(__('<i class="far fa-trash-alt"></i> Delete'), ['action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id), 'class' => 'btn btn-outline-danger btn-xs', 'escape' => false]) ?>
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
<?php echo $this->Paginator->limitControl([10 => 'Show 10 entries',25 => 'Show 25 entries', 50 => 'Show 50 entries', 100 => 'Show 100 entries'], $question->perPage,['class' => 'form-control form-control-sm','label' => false]); ?>
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