<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha256-TQq84xX6vkwR0Qs1qH5ADkP+MvH0W+9E7TdHJsoIQiM=" crossorigin="anonymous"></script>

<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="fas fa-list"></i> List'), ['action' => 'index'], ['class' => 'dropdown-item', 'escape' => false]) ?>
					<?= $this->Html->link(__('<i class="fas fa-plus"></i> New User'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
					<?= $this->Html->link(__('<i class="fas fa-list"></i> List'), ['action' => 'index'], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="fas fa-search"></i> Search'), ['action' => 'search'], ['class' => 'dropdown-item', 'escape' => false]) ?>
  </div>
</div>
</div>

<div class="card2">
	<div class="header">
		<div class="panel_card2_title">Users Report</div>
		<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
	<div class="body justify">
<ul>
	<li>This page provide statistic report based on the data stored in the database. The calculation is based on the segment of the data and the chart is representing the actual data that had been collected. </li>
	<li>All statistic report is for references only. </li>
</ul>
	</div>
</div>

	<div class="row">
	  <div class="col-md-3 col-sm-6 col-12">
		<div class="info-box">
		  <span class="info-box-icon bg-white">
<canvas id="status2Chart" width="70" height="64" align="center"></canvas>
<script>
var ctx = document.getElementById('status2Chart').getContext('2d');
var status2Chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Active', 'Inactive'],
        datasets: [{
            label: '# of Subjects',
            data: [<?= json_encode($total_status_1); ?>, <?= json_encode($total_status_0); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: false,
        legend: {
            display: false,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
        }
    }
});
</script>
		  </span>

		  <div class="info-box-content">
			<span class="info-box-text">Total Records</span>
			<span class="info-box-number"><?= $total; ?></span>
		  </div>
		</div>
	  </div>
	  <div class="col-md-3 col-sm-6 col-12">
		<div class="info-box">
		  <span class="info-box-icon bg-success"><i class="fas fa-wave-square"></i></span>

		  <div class="info-box-content">
			<span class="info-box-text">Active Records</span>
			<span class="info-box-number"><?= $total_status_1; ?></span>
		  </div>
		</div>
	  </div>
	  <div class="col-md-3 col-sm-6 col-12">
		<div class="info-box">
		  <span class="info-box-icon bg-warning"><i class="fas fa-circle-notch"></i></span>

		  <div class="info-box-content">
			<span class="info-box-text">Inactive Records</span>
			<span class="info-box-number"><?= $total_status_0; ?></span>
		  </div>
		</div>
	  </div>
	  <div class="col-md-3 col-sm-6 col-12">
		<div class="info-box">
		  <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

		  <div class="info-box-content">
			<span class="info-box-text">Average/Year (<?= date('Y'); ?>)</span>
			<?php $average = $total_current_year/12; ?>
			<span class="info-box-number"><?= $average; ?></span>
		  </div>
		</div>
	  </div>
	</div>

<div class="row">
	<div class="col-md-4">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Users Statistic (Year: <?= date('Y'); ?>)</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body table-responsive">
				<table class="table table-hover table-sm">
					<tr>
						<th>Month</th>
						<th><?= date('Y'); ?></th>
						<th><?= date("Y",strtotime("-1 year")); ?></th>
						<th><?= date("Y",strtotime("-2 year")); ?></th>
					</tr>
					<tr>
						<td>January</td>
						<td><?= $jan; ?></td>
						<td><?= $jan_1; ?></td>
						<td><?= $jan_2; ?></td>
					</tr>
					<tr>
						<td>February</td>
						<td><?= $feb; ?></td>
						<td><?= $feb_1; ?></td>
						<td><?= $feb_2; ?></td>
					</tr>
					<tr>
						<td>March</td>
						<td><?= $mar; ?></td>
						<td><?= $mar_1; ?></td>
						<td><?= $mar_2; ?></td>
					</tr>
					<tr>
						<td>April</td>
						<td><?= $apr; ?></td>
						<td><?= $apr_1; ?></td>
						<td><?= $apr_2; ?></td>
					</tr>
					<tr>
						<td>May</td>
						<td><?= $may; ?></td>
						<td><?= $may_1; ?></td>
						<td><?= $may_2; ?></td>
					</tr>
					<tr>
						<td>June</td>
						<td><?= $jun; ?></td>
						<td><?= $jun_1; ?></td>
						<td><?= $jun_2; ?></td>
					</tr>
					<tr class="bg-gray disabled color-palette">
						<td>Total Quater 1</td>
						<td><?= $q1; ?></td>
						<td><?= $q1_1; ?></td>
						<td><?= $q1_2; ?></td>
					</tr>
					<tr>
						<td>July</td>
						<td><?= $jul; ?></td>
						<td><?= $jul_1; ?></td>
						<td><?= $jul_2; ?></td>
					</tr>
					<tr>
						<td>August</td>
						<td><?= $aug; ?></td>
						<td><?= $aug_1; ?></td>
						<td><?= $aug_2; ?></td>
					</tr>
					<tr>
						<td>September</td>
						<td><?= $sep; ?></td>
						<td><?= $sep_1; ?></td>
						<td><?= $sep_2; ?></td>
					</tr>
					<tr>
						<td>October</td>
						<td><?= $oct; ?></td>
						<td><?= $oct_1; ?></td>
						<td><?= $oct_2; ?></td>
					</tr>
					<tr>
						<td>November</td>
						<td><?= $nov; ?></td>
						<td><?= $nov_1; ?></td>
						<td><?= $nov_2; ?></td>
					</tr>
					<tr>
						<td>December</td>
						<td><?= $dec; ?></td>
						<td><?= $dec_1; ?></td>
						<td><?= $dec_2; ?></td>
					</tr>
					<tr class="bg-gray disabled color-palette">
						<td>Total Quater 2</td>
						<td><?= $q2; ?></td>
						<td><?= $q2_1; ?></td>
						<td><?= $q2_2; ?></td>
					</tr>
					<tr class="bg-purple disabled color-palette">
						<td>TOTAL</td>
						<td><?= $total_current_year; ?></td>
						<td><?= $total_1; ?></td>
						<td><?= $total_2; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Users Statistic Charts (Year: <?= date('Y'); ?>)</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">
				<div class="row">
					<div class="col-md-6">
<canvas id="monthYearChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('monthYearChart').getContext('2d');
var monthYearChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: '# of Month',
            data: [<?= json_encode($jan); ?>, <?= json_encode($feb); ?>, <?= json_encode($mar); ?>, <?= json_encode($apr); ?>, <?= json_encode($may); ?>, <?= json_encode($jun); ?>, <?= json_encode($jul); ?>, <?= json_encode($aug); ?>, <?= json_encode($sep); ?>, <?= json_encode($oct); ?>, <?= json_encode($nov); ?>, <?= json_encode($dec); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(89, 233, 28, 0.2)',
				'rgba(255, 5, 5, 0.2)',
                'rgba(255, 128, 0, 0.2)',
                'rgba(153, 153, 153, 0.2)',
                'rgba(15, 207, 210, 0.2)',
                'rgba(44, 13, 181, 0.2)',
                'rgba(86, 172, 12, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(89, 233, 28, 1)',
				'rgba(255, 5, 5, 1)',
                'rgba(255, 128, 0, 1)',
                'rgba(153, 153, 153, 1)',
                'rgba(15, 207, 210, 1)',
                'rgba(44, 13, 181, 1)',
                'rgba(86, 172, 12, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
		title: {
			display: true,
			text: 'Users Monthly Created'
		},
	legend: {
		display: false,
		position: 'top',
			labels: {
			  boxWidth: 40,
			  fontColor: 'black'
			}
	},
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
					</div>
					<div class="col-md-6">
<canvas id="monthYearComparisonChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('monthYearComparisonChart').getContext('2d');
var monthYearComparisonChart = document.getElementById("monthYearComparisonChart");

var dataFirst = {
    label: "<?= date('Y'); ?>",
    data: [<?= json_encode($jan); ?>, <?= json_encode($feb); ?>, <?= json_encode($mar); ?>, <?= json_encode($apr); ?>, <?= json_encode($may); ?>, <?= json_encode($jun); ?>, <?= json_encode($jul); ?>, <?= json_encode($aug); ?>, <?= json_encode($sep); ?>, <?= json_encode($oct); ?>, <?= json_encode($nov); ?>, <?= json_encode($dec); ?>],
    //lineTension: 0,
    fill: false,
    borderColor: 'rgba(255, 99, 132, 1)'
	//backgroundColor: 'rgba(255, 99, 132,0.6)'
  };

var dataSecond = {
    label: "<?= date("Y",strtotime("-1 year")); ?>",
    data: [<?= json_encode($jan_1); ?>, <?= json_encode($feb_1); ?>, <?= json_encode($mar_1); ?>, <?= json_encode($apr_1); ?>, <?= json_encode($may_1); ?>, <?= json_encode($jun_1); ?>, <?= json_encode($jul_1); ?>, <?= json_encode($aug_1); ?>, <?= json_encode($sep_1); ?>, <?= json_encode($oct_1); ?>, <?= json_encode($nov_1); ?>, <?= json_encode($dec_1); ?>],
    //lineTension: 0,
    fill: false,
	borderColor: 'rgba(54, 162, 235, 1)'
	//backgroundColor: 'rgba(54, 162, 235,0.6)'
  };
  
var dataThird = {
    label: "<?= date("Y",strtotime("-2 year")); ?>",
    data: [<?= json_encode($jan_2); ?>, <?= json_encode($feb_2); ?>, <?= json_encode($mar_2); ?>, <?= json_encode($apr_2); ?>, <?= json_encode($may_2); ?>, <?= json_encode($jun_2); ?>, <?= json_encode($jul_2); ?>, <?= json_encode($aug_2); ?>, <?= json_encode($sep_2); ?>, <?= json_encode($oct_2); ?>, <?= json_encode($nov_2); ?>, <?= json_encode($dec_2); ?>],
    //lineTension: 0,
    fill: false,
  borderColor: 'rgba(255, 206, 86, 1)'
  };

var monthData = {
  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
  datasets: [dataFirst, dataSecond, dataThird]
};

var chartOptions = {
	title: {
		display: true,
		text: 'Users: Yearly Comparison'
	},
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 40,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(monthYearComparisonChart, {
  type: 'line',
  data: monthData,
  options: chartOptions
});
</script>
					</div>
				</div>	
<hr>

<div class="row">
	<div class="col-md-6">
		<div class="row">
			<div class="col-md-6">
<canvas id="quaterYearChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById('quaterYearChart').getContext('2d');
var quaterYearChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Quater 1', 'Quater 2'],
        datasets: [{
            label: '# of Quater',
            data: [<?= json_encode($q1); ?>, <?= json_encode($q2); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
	title: {
		display: true,
		text: 'Users Registered by Quater'
	},
	legend: {
		display: false,
		position: 'top',
		labels: {
		  boxWidth: 20,
		  fontColor: 'black'
		}
	}
    }
});
</script>
			</div>
			<div class="col-md-6">
<canvas id="status2Chart2" width="400" height="400" align="center"></canvas>
<script>
var ctx = document.getElementById('status2Chart2').getContext('2d');
var status2Chart2 = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Inactive', 'Active', 'Archived', 'Disposed'],
        datasets: [{
            label: '# of Users',
            data: [<?= json_encode($total_status_0); ?>, <?= json_encode($total_status_1); ?>, <?= json_encode($total_status_2); ?>, <?= json_encode($total_status_3); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
	title: {
		display: true,
		text: 'Users Status'
	},
        legend: {
            display: false,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
        }
    }
});
</script>
			</div>
		</div>								
	</div>
	<div class="col-md-6">
	<!--standby-->
	</div>
</div>

			</div>
		</div>
	</div>
</div>

