
<div class="row">
	<div class="col-md-4">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Instruction</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">
Insert the selected respondent email. RDC will send the invitation email together with instruction and PIN.
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Invite Respondent</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">
			<?= $this->Form->create($user) ?>
			<fieldset>
				<div class="form-group">
					<?php echo $this->Form->control('email', ['class' => 'form-control','required' => false]); ?>
				</div>
			</fieldset>
			</div>
				<div class="card-footer pull-right">
				  <?= $this->Form->button('Reset', ['type' => 'reset', 'class' => 'btn btn-outline-primary btn-flat']) ?>
				  <?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary btn-flat']) ?>
				  <?= $this->Form->end() ?>
                </div>
		</div>
	</div>
</div>