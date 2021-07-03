
<div class="row">
	<div class="col-md-4">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Instruction</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body justify">
				<ul>
					<li>Please enter your 4 digit PIN as provided in the invitation email</li>
					<li>This case study evaluation started on: June 11, 2021</li>
					<li>The data collection for the case study will end on: July 24, 2021</li>
				</ul>
				
				
<p id="casestudy" class="panel_card2_title text-center"></p>

<script>
// Set the date we're counting down to
var countDownDate = new Date("Jul 24, 2021 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="casestudy"
  document.getElementById("casestudy").innerHTML = days + " <code>Days</code> " + hours + " <code>Hours</code> "
  + minutes + " <code>Minutes</code> " + seconds + " <code>Seconds</code> ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("casestudy").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
				
				
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Enter PIN</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">
			<?= $this->Form->create($user) ?>
			<fieldset>
				<div class="form-group">
					<?php echo $this->Form->control('pin2', ['class' => 'form-control','required' => false, 'label' => 'PIN']); ?>
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