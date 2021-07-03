<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sus $sus
 */
 $c_name = $this->request->getParam('controller');
?>

<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="far fa-edit"></i> Edit'), ['action' => 'edit', $sus->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-file-pdf"></i> PDF'), ['action' => 'pdf', $sus->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="fas fa-history"></i> Audit Trail'), ['prefix' => 'Admin', 'controller' => 'audit_logs', 'action' => 'index', '?' => ['pk' => $sus->id, 'source' => strtolower($c_name)]], ['class' => 'dropdown-item', 'escape' => false, 'target' => 'blank', 'title' => 'Full Audit trail Report']) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Form->create ?>
			<?php if ($sus->status == 1) {
				echo $this->Form->postLink(__('<i class="far fa-star"></i> Set as inactive'), ['action' => 'recordInactive', $sus->id, $sus->status], ['block' => true, 'confirm' => __('Are you sure you want to inactive # {0}?', $sus->id), 'class' => 'dropdown-item', 'escape' => false, 'title'=>'Inactive Record']);
			}else
				echo $this->Form->postLink(__('<i class="fas fa-star"></i> Set as active'), ['action' => 'recordActive', $sus->id, $sus->status], ['block' => true, 'confirm' => __('Are you sure you want to active # {0}?', $sus->id), 'class' => 'dropdown-item', 'escape' => false, 'title'=>'Active Record']);
			?>
			<?= $this->Html->link(__('<i class="fas fa-archive"></i> Archived'), ['action' => 'transferArchived', $sus->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#archived' . $sus->id, 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="far fa-trash-alt"></i> Dispose'), ['action' => 'transferDisposed', $sus->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#disposed' . $sus->id, 'escape' => false]) ?>
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
				<div class="panel_card2_title"><?= __('Sus') ?> Details</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body">
				<div class="sus view content table-responsive">
            <table class="table table-hover">
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $sus->has('user') ? $this->Html->link($sus->user->id, ['controller' => 'Users', 'action' => 'view', $sus->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Rm Act By') ?></th>
                    <td><?= h($sus->rm_act_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sus->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q1') ?></th>
                    <td><?= $this->Number->format($sus->q1) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q2') ?></th>
                    <td><?= $this->Number->format($sus->q2) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q3') ?></th>
                    <td><?= $this->Number->format($sus->q3) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q4') ?></th>
                    <td><?= $this->Number->format($sus->q4) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q5') ?></th>
                    <td><?= $this->Number->format($sus->q5) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q6') ?></th>
                    <td><?= $this->Number->format($sus->q6) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q7') ?></th>
                    <td><?= $this->Number->format($sus->q7) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q8') ?></th>
                    <td><?= $this->Number->format($sus->q8) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q9') ?></th>
                    <td><?= $this->Number->format($sus->q9) ?></td>
                </tr>
                <tr>
                    <th><?= __('Q10') ?></th>
                    <td><?= $this->Number->format($sus->q10) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($sus->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hits') ?></th>
                    <td><?= $this->Number->format($sus->hits) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rm Retention') ?></th>
                    <td><?= date('d M Y', strtotime($sus->rm_retention)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Rm Act On') ?></th>
                    <td><?= date('d M Y', strtotime($sus->rm_act_on)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= date('d M Y', strtotime($sus->created)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= date('d M Y', strtotime($sus->modified)); ?></td>
                </tr>
            </table>

        </div>
		  </div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card2">
		  <div class="header">
				<div class="panel_card2_title">Record Info</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body table-responsive">
<?php
$created = date_create($sus->created);
$rm_retention = date_create($sus->rm_retention);
$now = new DateTime("now");
?>
<table class="table table-hover">
	<tr>
		<td>Status</td>
		<td>
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
		</td>
	</tr>
	<tr>
		<td>Created Date</td>
		<td><?php echo date('F d, Y', strtotime($sus->created)); ?></td>
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
		<td><?php echo date('F d, Y', strtotime($sus->rm_retention)); ?></td>
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
<div class="modal fade" id="archived<?= $sus->id; ?>">
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
				<li>You're requesting to archived the record id: <strong><?= $sus->id; ?></strong> from <strong><?= $c_name; ?></strong> repository.</li>
				<li>Please note that this operation is not reversible</li>
				<li>The record will be archived and removed from the active list</li>
			</ul>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-light btn-flat" data-dismiss="modal">No</button>
			<?= $this->Form->postLink(__('Yes'), ['action' => 'transferArchived', $sus->id], ['class' => 'btn btn-outline-light btn-flat']); ?>
		</div>
		</div>
	</div>
</div>
<!--Disposed Modal-->
<div class="modal fade" id="disposed<?= $sus->id; ?>">
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
				<li>You're requesting to dispose the record id: <strong><?= $sus->id; ?></strong> from <strong><?= $c_name; ?></strong> repository.</li>
				<li>Please note that this operation is not reversible</li>
				<li>The record will be disposed and recorded into the disposal list</li>
			</ul>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-light btn-flat" data-dismiss="modal">No</button>
			<?= $this->Form->postLink(__('Yes'), ['action' => 'transferDisposed', $sus->id], ['class' => 'btn btn-outline-light btn-flat']); ?>
		</div>
		</div>
	</div>
</div>