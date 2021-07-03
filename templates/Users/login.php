<br><br><br>
<div class="container-fluid h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col col-sm-6 col-md-6 col-lg-4 col-xl-3">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Sign In</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">
<?= $this->Flash->render() ?>
		<?= $this->Form->create() ?>
    <fieldset>
<div class="row">
	<div class="col-md-6">
		<?php echo $this->Form->control('email', ['class' => 'form-control','required' => false,'label' => false,'placeholder' => 'Email']); ?>
	</div>
	<div class="col-md-6">
		<?php echo $this->Form->control('password', ['class' => 'form-control','required' => false,'label' => false,'placeholder' => 'Password']); ?>
	</div>
</div>
<br>

    </fieldset>
	<?= $this->Form->button(__('Submit'),['type' => 'submit', 'class' => 'btn btn-outline-primary btn-flat btn-block']) ?>
    <?= $this->Form->end() ?>
			</div>
		</div>

        </div>
    </div>
</div>