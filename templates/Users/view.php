<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
 $c_name = $this->request->getParam('controller');
?>

<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="far fa-edit"></i> Edit'), ['action' => 'edit', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-file-pdf"></i> PDF'), ['action' => 'pdf', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="fas fa-history"></i> Audit Trail'), ['prefix' => 'Admin', 'controller' => 'audit_logs', 'action' => 'index', '?' => ['pk' => $user->id, 'source' => strtolower($c_name)]], ['class' => 'dropdown-item', 'escape' => false, 'target' => 'blank', 'title' => 'Full Audit trail Report']) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Form->create ?>
			<?php if ($user->status == 1) {
				echo $this->Form->postLink(__('<i class="far fa-star"></i> Set as inactive'), ['action' => 'recordInactive', $user->id, $user->status], ['block' => true, 'confirm' => __('Are you sure you want to inactive # {0}?', $user->id), 'class' => 'dropdown-item', 'escape' => false, 'title'=>'Inactive Record']);
			}else
				echo $this->Form->postLink(__('<i class="fas fa-star"></i> Set as active'), ['action' => 'recordActive', $user->id, $user->status], ['block' => true, 'confirm' => __('Are you sure you want to active # {0}?', $user->id), 'class' => 'dropdown-item', 'escape' => false, 'title'=>'Active Record']);
			?>
			<?= $this->Html->link(__('<i class="fas fa-archive"></i> Archived'), ['action' => 'transferArchived', $user->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#archived' . $user->id, 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="far fa-trash-alt"></i> Dispose'), ['action' => 'transferDisposed', $user->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#disposed' . $user->id, 'escape' => false]) ?>
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
				<div class="panel_card2_title"><?= __('Users') ?> Details</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
		  </div>
		  <div class="body">
				<div class="users view content table-responsive">
            <table class="table table-hover">
                <tr>
                    <th><?= __('Username') ?></th>
                    <td><?= h($user->username) ?></td>
                </tr>
                <tr>
                    <th><?= __('Password') ?></th>
                    <td><?= h($user->password) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Fullname') ?></th>
                    <td><?= h($user->fullname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age') ?></th>
                    <td><?= h($user->age) ?></td>
                </tr>
                <tr>
                    <th><?= __('Gender') ?></th>
                    <td><?= h($user->gender) ?></td>
                </tr>
                <tr>
                    <th><?= __('Highest Qualification') ?></th>
                    <td><?= h($user->highest_qualification) ?></td>
                </tr>
                <tr>
                    <th><?= __('Current Working Post') ?></th>
                    <td><?= h($user->current_working_post) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dev Experience') ?></th>
                    <td><?= h($user->dev_experience) ?></td>
                </tr>
                <tr>
                    <th><?= __('Dev Sector') ?></th>
                    <td><?= h($user->dev_sector) ?></td>
                </tr>
                <tr>
                    <th><?= __('Primary Language') ?></th>
                    <td><?= h($user->primary_language) ?></td>
                </tr>
                <tr>
                    <th><?= __('Slug') ?></th>
                    <td><?= h($user->slug) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rm Act By') ?></th>
                    <td><?= h($user->rm_act_by) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($user->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Hits') ?></th>
                    <td><?= $this->Number->format($user->hits) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rm Retention') ?></th>
                    <td><?= date('d M Y', strtotime($user->rm_retention)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Rm Act On') ?></th>
                    <td><?= date('d M Y', strtotime($user->rm_act_on)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= date('d M Y', strtotime($user->created)); ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= date('d M Y', strtotime($user->modified)); ?></td>
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
$created = date_create($user->created);
$rm_retention = date_create($user->rm_retention);
$now = new DateTime("now");
?>
<table class="table table-hover">
	<tr>
		<td>Status</td>
		<td>
			<?php if ($user->status == '0'){
					echo '<span class="badge badge-warning">Inactive</span>';
				}elseif ($user->status == '1'){
					echo '<span class="badge badge-success">Active</span>';
				}elseif ($user->status == '2'){
					echo '<span class="badge badge-info">Archived</span>';
				}elseif ($user->status == '3'){
					echo '<span class="badge badge-danger">Disposed</span>';
				}else
					echo '<span class="badge badge-danger">Error</span>';
			?>
		</td>
	</tr>
	<tr>
		<td>Created Date</td>
		<td><?php echo date('F d, Y', strtotime($user->created)); ?></td>
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
		<td><?php echo date('F d, Y', strtotime($user->rm_retention)); ?></td>
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

<div class="card2">
  <div class="header">
	<div class="panel_card2_title"><?= __('Related Questions') ?></div>
	<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
  </div>
  <div class="body">
            <div class="related">
                <?php if (!empty($user->questions)) : ?>
                <div class="table-responsive">
                    <table class="table table-hover text-nowrap">
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Crud S') ?></th>
                            <th><?= __('Crud L') ?></th>
                            <th><?= __('Crud1') ?></th>
                            <th><?= __('Crud2') ?></th>
                            <th><?= __('Crud3') ?></th>
                            <th><?= __('Crud4') ?></th>
                            <th><?= __('Rbac S') ?></th>
                            <th><?= __('Rbac L') ?></th>
                            <th><?= __('Rbac1') ?></th>
                            <th><?= __('Rbac2') ?></th>
                            <th><?= __('Rbac3') ?></th>
                            <th><?= __('Rbac4') ?></th>
                            <th><?= __('Rbac5') ?></th>
                            <th><?= __('Rbac6') ?></th>
                            <th><?= __('Inventory S') ?></th>
                            <th><?= __('Inventory L') ?></th>
                            <th><?= __('Inv1') ?></th>
                            <th><?= __('Inv2') ?></th>
                            <th><?= __('Inv3') ?></th>
                            <th><?= __('Inv4') ?></th>
                            <th><?= __('Inv5') ?></th>
                            <th><?= __('Inv6') ?></th>
                            <th><?= __('Search S') ?></th>
                            <th><?= __('Search L') ?></th>
                            <th><?= __('Scrh1') ?></th>
                            <th><?= __('Scrh2') ?></th>
                            <th><?= __('Scrh3') ?></th>
                            <th><?= __('Scrh4') ?></th>
                            <th><?= __('Scrh5') ?></th>
                            <th><?= __('Scrh6') ?></th>
                            <th><?= __('Audit S') ?></th>
                            <th><?= __('Audit L') ?></th>
                            <th><?= __('At1') ?></th>
                            <th><?= __('At2') ?></th>
                            <th><?= __('At3') ?></th>
                            <th><?= __('At4') ?></th>
                            <th><?= __('At5') ?></th>
                            <th><?= __('At6') ?></th>
                            <th><?= __('At7') ?></th>
                            <th><?= __('At8') ?></th>
                            <th><?= __('At9') ?></th>
                            <th><?= __('Transfer S') ?></th>
                            <th><?= __('Transfer L') ?></th>
                            <th><?= __('Ts1') ?></th>
                            <th><?= __('Ts2') ?></th>
                            <th><?= __('Ts3') ?></th>
                            <th><?= __('Ts4') ?></th>
                            <th><?= __('Ts5') ?></th>
                            <th><?= __('Ts6') ?></th>
                            <th><?= __('Ts7') ?></th>
                            <th><?= __('Ts8') ?></th>
                            <th><?= __('Ts9') ?></th>
                            <th><?= __('Ts10') ?></th>
                            <th><?= __('Report S') ?></th>
                            <th><?= __('Report L') ?></th>
                            <th><?= __('Rpt1') ?></th>
                            <th><?= __('Rpt2') ?></th>
                            <th><?= __('Rpt3') ?></th>
                            <th><?= __('Rpt4') ?></th>
                            <th><?= __('Rpt5') ?></th>
                            <th><?= __('Rpt6') ?></th>
                            <th><?= __('Rpt7') ?></th>
                            <th><?= __('Rpt8') ?></th>
                            <th><?= __('Rpt9') ?></th>
                            <th><?= __('Rpt10') ?></th>
                            <th><?= __('Rpt11') ?></th>
                            <th><?= __('Rpt12') ?></th>
                            <th><?= __('Rpt13') ?></th>
                            <th><?= __('Rpt14') ?></th>
                            <th><?= __('Rpt15') ?></th>
                            <th><?= __('Rpt16') ?></th>
                            <th><?= __('Rpt17') ?></th>
                            <th><?= __('Retention S') ?></th>
                            <th><?= __('Retention L') ?></th>
                            <th><?= __('Ret1') ?></th>
                            <th><?= __('Ret2') ?></th>
                            <th><?= __('Ret3') ?></th>
                            <th><?= __('Ret4') ?></th>
                            <th><?= __('Appraisal S') ?></th>
                            <th><?= __('Appraisal L') ?></th>
                            <th><?= __('App1') ?></th>
                            <th><?= __('App2') ?></th>
                            <th><?= __('App3') ?></th>
                            <th><?= __('App4') ?></th>
                            <th><?= __('Archive S') ?></th>
                            <th><?= __('Archive L') ?></th>
                            <th><?= __('Arc1') ?></th>
                            <th><?= __('Arc2') ?></th>
                            <th><?= __('Arc3') ?></th>
                            <th><?= __('Arc4') ?></th>
                            <th><?= __('Arc5') ?></th>
                            <th><?= __('Dispose S') ?></th>
                            <th><?= __('Dispose L') ?></th>
                            <th><?= __('Dis1') ?></th>
                            <th><?= __('Dis2') ?></th>
                            <th><?= __('Dis3') ?></th>
                            <th><?= __('Dis4') ?></th>
                            <th><?= __('Dis5') ?></th>
                            <th><?= __('Other S') ?></th>
                            <th><?= __('Other L') ?></th>
                            <th><?= __('Oth1') ?></th>
                            <th><?= __('Oth2') ?></th>
                            <th><?= __('Oth3') ?></th>
                            <th><?= __('Oth4') ?></th>
                            <th><?= __('Oth5') ?></th>
                            <th><?= __('Oth6') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->questions as $questions) : ?>
                        <tr>
                            <td><?= h($questions->id) ?></td>
                            <td><?= h($questions->user_id) ?></td>
                            <td><?= h($questions->crud_s) ?></td>
                            <td><?= h($questions->crud_l) ?></td>
                            <td><?= h($questions->crud1) ?></td>
                            <td><?= h($questions->crud2) ?></td>
                            <td><?= h($questions->crud3) ?></td>
                            <td><?= h($questions->crud4) ?></td>
                            <td><?= h($questions->rbac_s) ?></td>
                            <td><?= h($questions->rbac_l) ?></td>
                            <td><?= h($questions->rbac1) ?></td>
                            <td><?= h($questions->rbac2) ?></td>
                            <td><?= h($questions->rbac3) ?></td>
                            <td><?= h($questions->rbac4) ?></td>
                            <td><?= h($questions->rbac5) ?></td>
                            <td><?= h($questions->rbac6) ?></td>
                            <td><?= h($questions->inventory_s) ?></td>
                            <td><?= h($questions->inventory_l) ?></td>
                            <td><?= h($questions->inv1) ?></td>
                            <td><?= h($questions->inv2) ?></td>
                            <td><?= h($questions->inv3) ?></td>
                            <td><?= h($questions->inv4) ?></td>
                            <td><?= h($questions->inv5) ?></td>
                            <td><?= h($questions->inv6) ?></td>
                            <td><?= h($questions->search_s) ?></td>
                            <td><?= h($questions->search_l) ?></td>
                            <td><?= h($questions->scrh1) ?></td>
                            <td><?= h($questions->scrh2) ?></td>
                            <td><?= h($questions->scrh3) ?></td>
                            <td><?= h($questions->scrh4) ?></td>
                            <td><?= h($questions->scrh5) ?></td>
                            <td><?= h($questions->scrh6) ?></td>
                            <td><?= h($questions->audit_s) ?></td>
                            <td><?= h($questions->audit_l) ?></td>
                            <td><?= h($questions->at1) ?></td>
                            <td><?= h($questions->at2) ?></td>
                            <td><?= h($questions->at3) ?></td>
                            <td><?= h($questions->at4) ?></td>
                            <td><?= h($questions->at5) ?></td>
                            <td><?= h($questions->at6) ?></td>
                            <td><?= h($questions->at7) ?></td>
                            <td><?= h($questions->at8) ?></td>
                            <td><?= h($questions->at9) ?></td>
                            <td><?= h($questions->transfer_s) ?></td>
                            <td><?= h($questions->transfer_l) ?></td>
                            <td><?= h($questions->ts1) ?></td>
                            <td><?= h($questions->ts2) ?></td>
                            <td><?= h($questions->ts3) ?></td>
                            <td><?= h($questions->ts4) ?></td>
                            <td><?= h($questions->ts5) ?></td>
                            <td><?= h($questions->ts6) ?></td>
                            <td><?= h($questions->ts7) ?></td>
                            <td><?= h($questions->ts8) ?></td>
                            <td><?= h($questions->ts9) ?></td>
                            <td><?= h($questions->ts10) ?></td>
                            <td><?= h($questions->report_s) ?></td>
                            <td><?= h($questions->report_l) ?></td>
                            <td><?= h($questions->rpt1) ?></td>
                            <td><?= h($questions->rpt2) ?></td>
                            <td><?= h($questions->rpt3) ?></td>
                            <td><?= h($questions->rpt4) ?></td>
                            <td><?= h($questions->rpt5) ?></td>
                            <td><?= h($questions->rpt6) ?></td>
                            <td><?= h($questions->rpt7) ?></td>
                            <td><?= h($questions->rpt8) ?></td>
                            <td><?= h($questions->rpt9) ?></td>
                            <td><?= h($questions->rpt10) ?></td>
                            <td><?= h($questions->rpt11) ?></td>
                            <td><?= h($questions->rpt12) ?></td>
                            <td><?= h($questions->rpt13) ?></td>
                            <td><?= h($questions->rpt14) ?></td>
                            <td><?= h($questions->rpt15) ?></td>
                            <td><?= h($questions->rpt16) ?></td>
                            <td><?= h($questions->rpt17) ?></td>
                            <td><?= h($questions->retention_s) ?></td>
                            <td><?= h($questions->retention_l) ?></td>
                            <td><?= h($questions->ret1) ?></td>
                            <td><?= h($questions->ret2) ?></td>
                            <td><?= h($questions->ret3) ?></td>
                            <td><?= h($questions->ret4) ?></td>
                            <td><?= h($questions->appraisal_s) ?></td>
                            <td><?= h($questions->appraisal_l) ?></td>
                            <td><?= h($questions->app1) ?></td>
                            <td><?= h($questions->app2) ?></td>
                            <td><?= h($questions->app3) ?></td>
                            <td><?= h($questions->app4) ?></td>
                            <td><?= h($questions->archive_s) ?></td>
                            <td><?= h($questions->archive_l) ?></td>
                            <td><?= h($questions->arc1) ?></td>
                            <td><?= h($questions->arc2) ?></td>
                            <td><?= h($questions->arc3) ?></td>
                            <td><?= h($questions->arc4) ?></td>
                            <td><?= h($questions->arc5) ?></td>
                            <td><?= h($questions->dispose_s) ?></td>
                            <td><?= h($questions->dispose_l) ?></td>
                            <td><?= h($questions->dis1) ?></td>
                            <td><?= h($questions->dis2) ?></td>
                            <td><?= h($questions->dis3) ?></td>
                            <td><?= h($questions->dis4) ?></td>
                            <td><?= h($questions->dis5) ?></td>
                            <td><?= h($questions->other_s) ?></td>
                            <td><?= h($questions->other_l) ?></td>
                            <td><?= h($questions->oth1) ?></td>
                            <td><?= h($questions->oth2) ?></td>
                            <td><?= h($questions->oth3) ?></td>
                            <td><?= h($questions->oth4) ?></td>
                            <td><?= h($questions->oth5) ?></td>
                            <td><?= h($questions->oth6) ?></td>
                            <td><?= h($questions->status) ?></td>
                            <td><?= h($questions->created) ?></td>
                            <td><?= h($questions->modified) ?></td>
                            <td class="actions">
								<?= $this->Html->link(__('<i class="far fa-folder-open"></i>'), ['controller' => 'Questions', 'action' => 'view', $questions->id], ['class' => 'btn btn-outline-success btn-xs', 'escape' => false]) ?>
								<?= $this->Html->link(__('<i class="far fa-edit"></i>'), ['controller' => 'Questions', 'action' => 'edit', $questions->id], ['class' => 'btn btn-outline-primary btn-xs', 'escape' => false]) ?>
								<?= $this->Form->postLink(__('<i class="far fa-trash-alt"></i>'), ['controller' => 'Questions', 'action' => 'delete', $questions->id], ['class' => 'btn btn-outline-danger btn-xs', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $questions->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
  </div>
</div>

<!--Archived Modal-->
<div class="modal fade" id="archived<?= $user->id; ?>">
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
				<li>You're requesting to archived the record id: <strong><?= $user->id; ?></strong> from <strong><?= $c_name; ?></strong> repository.</li>
				<li>Please note that this operation is not reversible</li>
				<li>The record will be archived and removed from the active list</li>
			</ul>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-outline-light btn-flat" data-dismiss="modal">No</button>
			<?= $this->Form->postLink(__('Yes'), ['action' => 'transferArchived', $user->id], ['class' => 'btn btn-outline-light btn-flat']); ?>
		</div>
		</div>
	</div>
</div>
<!--Disposed Modal-->
<div class="modal fade" id="disposed<?= $user->id; ?>">
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