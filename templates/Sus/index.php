<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sus[]|\Cake\Collection\CollectionInterface $sus
 */
 $c_name = $this->request->getParam('controller');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha256-TQq84xX6vkwR0Qs1qH5ADkP+MvH0W+9E7TdHJsoIQiM=" crossorigin="anonymous"></script>

<?= $this->Form->create(null,['url'=>['action'=>'change']]) ?>
<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
			<?= $this->Html->link(__('<i class="fas fa-plus"></i> New Sus'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
			<?= $this->Html->link(__('<i class="fas fa-search"></i> Search'), ['action' => 'search'], ['class' => 'dropdown-item', 'escape' => false]) ?>
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
				<div class="panel_card2_title">Re-CRUD System Usability Evaluation</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
		<div class="body">
			<div class="col-md-12 table-responsive">
				<table id="main_index" class="table table-hover table-bordered">
					<thead>
				<tr>
					<th colspan="3"></th>
					<th colspan="5" class="bg-primary text-center">Effectiveness</th>
					<th colspan="5" class="bg-yellow text-center">Efficiency</th>
					<th></th>
				</tr>
				<tr class="text-center">
					<th><?= $this->Form->checkbox('check[]',['onchange'=>'checkAll(this)', 'name'=>'chk[]']) ?></th>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('user_id','Respondent') ?></th>
					<th><?= $this->Paginator->sort('q1') ?></th>
					<th><?= $this->Paginator->sort('q2') ?></th>
					<th><?= $this->Paginator->sort('q3') ?></th>
					<th><?= $this->Paginator->sort('q4') ?></th>
					<th><?= $this->Paginator->sort('q5') ?></th>
					<th><?= $this->Paginator->sort('q6') ?></th>
					<th><?= $this->Paginator->sort('q7') ?></th>
					<th><?= $this->Paginator->sort('q8') ?></th>
					<th><?= $this->Paginator->sort('q9') ?></th>
					<th><?= $this->Paginator->sort('q10') ?></th>
					<th class="actions" style="text-align: center;"><?= __('Actions') ?></th>
				</tr>
					</thead>
            <tbody>
                <?php foreach ($sus as $sus): ?>
                <tr class="text-center">
					<td><?php echo $this->Form->checkbox('check[]',['value'=>$sus->id]) ?></td>
                    <td><?= $this->Number->format($sus->id) ?></td>
                    <td><?= $sus->has('user') ? $this->Html->link($sus->user->id, ['controller' => 'Users', 'action' => 'view', $sus->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($sus->q1) ?></td>
                    <td><?= $this->Number->format($sus->q2) ?></td>
                    <td><?= $this->Number->format($sus->q3) ?></td>
                    <td><?= $this->Number->format($sus->q4) ?></td>
                    <td><?= $this->Number->format($sus->q5) ?></td>
                    <td><?= $this->Number->format($sus->q6) ?></td>
                    <td><?= $this->Number->format($sus->q7) ?></td>
                    <td><?= $this->Number->format($sus->q8) ?></td>
                    <td><?= $this->Number->format($sus->q9) ?></td>
                    <td><?= $this->Number->format($sus->q10) ?></td>
                    <td class="actions" align="center">						
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="far fa-folder-open"></i> View'), ['action' => 'view', $sus->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="far fa-edit"></i> Edit'), ['action' => 'edit', $sus->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-trash-alt"></i> Dispose'), ['action' => 'transferDisposed', $sus->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#disposed' . $sus->id, 'escape' => false]) ?>
  </div>
</div>
                    </td>
                </tr>
<div class="modal fade" id="disposed<?php echo $sus->id; ?>">
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
                <?php endforeach; ?>
            </tbody>
				</table>
			</div>
<?php if ($count_find_result != NULL): ?>

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
<?php echo $this->Paginator->limitControl([10 => 'Show 10 entries',25 => 'Show 25 entries', 50 => 'Show 50 entries', 100 => 'Show 100 entries'], $sus->perPage,['class' => 'form-control form-control-sm','label' => false]); ?>
			</div>
		</div>
	</div>
	<div class="col-md-5 pull-right">
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












<div class="card2">
	<div class="header">
		<div class="panel_card2_title">Analysis</div>
		<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
	<div class="body">
	
<div class="horizontal_menu">
  <button class="btn btn-outline-primary btn-sm align-right" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle all charts</button>
</div>	
	
		<table class="table table-hover table-bordered">
			<tr class="text-center bg-gray">
				<td width="20px"></td>
				<td width="50px">#</td>
				<td>Questions</td>
				<td>Chart</td>
				<td>1</td>
				<td>2</td>
				<td>3</td>
				<td>4</td>
				<td>5</td>
			</tr>
<!--q1-->
			<tr class="text-center">
				<td rowspan="5" class="bg-primary"><br><br><br><br>Effectiveness</td>
				<td>1</td>
				<td class="text-left">It allows me to accomplish my tasks<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart1">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q1" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q1').getContext('2d');
var q1 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q1_1); ?>, <?= json_encode($q1_2); ?>, <?= json_encode($q1_3); ?>, <?= json_encode($q1_4); ?>, <?= json_encode($q1_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div>
				</td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart1" aria-expanded="false" aria-controls="chart1"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q1_1; ?><br>
				(<?php $q1_1_percentage = $q1_1/$total*100;
				echo $this->Number->precision($q1_1_percentage, 0); ?>%)</td>
				<td><?php echo $q1_2; ?><br>
				(<?php $q1_2_percentage = $q1_2/$total*100;
				echo $this->Number->precision($q1_2_percentage, 0); ?>%)</td>
				<td><?php echo $q1_3; ?><br>
				(<?php $q1_3_percentage = $q1_3/$total*100;
				echo $this->Number->precision($q1_3_percentage, 0); ?>%)</td>
				<td><?php echo $q1_4; ?><br>
				(<?php $q1_4_percentage = $q1_4/$total*100;
				echo $this->Number->precision($q1_4_percentage, 0); ?>%)</td>
				<td><?php echo $q1_5; ?><br>
				(<?php $q1_5_percentage = $q1_5/$total*100;
				echo $this->Number->precision($q1_5_percentage, 0); ?>%)</td>
			</tr>
<!--q2-->
			<tr class="text-center">
				<td>2</td>
				<td class="text-left">I think I would not need a system with more features for my tasks<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart2">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q2" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q2').getContext('2d');
var q2 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q2_1); ?>, <?= json_encode($q2_2); ?>, <?= json_encode($q2_3); ?>, <?= json_encode($q2_4); ?>, <?= json_encode($q2_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div></td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart2" aria-expanded="false" aria-controls="chart2"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q2_1; ?><br>
				(<?php $q2_1_percentage = $q2_1/$total*100;
				echo $this->Number->precision($q2_1_percentage, 0); ?>%)</td>
				<td><?php echo $q2_2; ?><br>
				(<?php $q2_2_percentage = $q2_2/$total*100;
				echo $this->Number->precision($q2_2_percentage, 0); ?>%)</td>
				<td><?php echo $q2_3; ?><br>
				(<?php $q2_3_percentage = $q2_3/$total*100;
				echo $this->Number->precision($q2_3_percentage, 0); ?>%)</td>
				<td><?php echo $q2_4; ?><br>
				(<?php $q2_4_percentage = $q2_4/$total*100;
				echo $this->Number->precision($q2_4_percentage, 0); ?>%)</td>
				<td><?php echo $q2_5; ?><br>
				(<?php $q2_5_percentage = $q2_5/$total*100;
				echo $this->Number->precision($q2_5_percentage, 0); ?>%)</td>
			</tr>
<!--q3-->
			<tr class="text-center">
				<td>3</td>
				<td class="text-left">I would not need to supplement Re-CRUD with an additional components<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart3">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q3" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q3').getContext('2d');
var q3 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q3_1); ?>, <?= json_encode($q3_2); ?>, <?= json_encode($q3_3); ?>, <?= json_encode($q3_4); ?>, <?= json_encode($q3_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div></td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart3" aria-expanded="false" aria-controls="chart3"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q3_1; ?><br>
				(<?php $q3_1_percentage = $q3_1/$total*100;
				echo $this->Number->precision($q3_1_percentage, 0); ?>%)</td>
				<td><?php echo $q3_2; ?><br>
				(<?php $q3_2_percentage = $q3_2/$total*100;
				echo $this->Number->precision($q3_2_percentage, 0); ?>%)</td>
				<td><?php echo $q3_3; ?><br>
				(<?php $q3_3_percentage = $q3_3/$total*100;
				echo $this->Number->precision($q3_3_percentage, 0); ?>%)</td>
				<td><?php echo $q3_4; ?><br>
				(<?php $q3_4_percentage = $q3_4/$total*100;
				echo $this->Number->precision($q3_4_percentage, 0); ?>%)</td>
				<td><?php echo $q3_5; ?><br>
				(<?php $q3_5_percentage = $q3_5/$total*100;
				echo $this->Number->precision($q3_5_percentage, 0); ?>%)</td>
			</tr>
<!--q4-->
			<tr class="text-center">
				<td>4</td>
				<td class="text-left">I found the system unnecessarily complex<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart4">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q4" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q4').getContext('2d');
var q4 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q4_1); ?>, <?= json_encode($q4_2); ?>, <?= json_encode($q4_3); ?>, <?= json_encode($q4_4); ?>, <?= json_encode($q4_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div></td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart4" aria-expanded="false" aria-controls="chart4"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q4_1; ?><br>
				(<?php $q4_1_percentage = $q4_1/$total*100;
				echo $this->Number->precision($q4_1_percentage, 0); ?>%)</td>
				<td><?php echo $q4_2; ?><br>
				(<?php $q4_2_percentage = $q4_2/$total*100;
				echo $this->Number->precision($q4_2_percentage, 0); ?>%)</td>
				<td><?php echo $q4_3; ?><br>
				(<?php $q4_3_percentage = $q4_3/$total*100;
				echo $this->Number->precision($q4_3_percentage, 0); ?>%)</td>
				<td><?php echo $q4_4; ?><br>
				(<?php $q4_4_percentage = $q4_4/$total*100;
				echo $this->Number->precision($q4_4_percentage, 0); ?>%)</td>
				<td><?php echo $q4_5; ?><br>
				(<?php $q4_5_percentage = $q4_5/$total*100;
				echo $this->Number->precision($q4_5_percentage, 0); ?>%)</td>
			</tr>
<!--q5-->
			<tr class="text-center">
				<td>5</td>
				<td class="text-left">This system’s capabilities would meet myrequirements<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart5">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q5" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q5').getContext('2d');
var q5 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q5_1); ?>, <?= json_encode($q5_2); ?>, <?= json_encode($q5_3); ?>, <?= json_encode($q5_4); ?>, <?= json_encode($q5_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div></td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart5" aria-expanded="false" aria-controls="chart5"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q5_1; ?><br>
				(<?php $q5_1_percentage = $q5_1/$total*100;
				echo $this->Number->precision($q5_1_percentage, 0); ?>%)</td>
				<td><?php echo $q5_2; ?><br>
				(<?php $q5_2_percentage = $q5_2/$total*100;
				echo $this->Number->precision($q5_2_percentage, 0); ?>%)</td>
				<td><?php echo $q5_3; ?><br>
				(<?php $q5_3_percentage = $q5_3/$total*100;
				echo $this->Number->precision($q5_3_percentage, 0); ?>%)</td>
				<td><?php echo $q5_4; ?><br>
				(<?php $q5_4_percentage = $q5_4/$total*100;
				echo $this->Number->precision($q5_4_percentage, 0); ?>%)</td>
				<td><?php echo $q5_5; ?><br>
				(<?php $q5_5_percentage = $q5_5/$total*100;
				echo $this->Number->precision($q5_5_percentage, 0); ?>%)</td>
			</tr>
<!--q6-->
			<tr class="text-center">
				<td rowspan="5" class="bg-yellow"><br><br><br><br>Efficiency</td>
				<td>6</td>
				<td class="text-left">It saves me time when I use it<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart6">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q6" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q6').getContext('2d');
var q6 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q6_1); ?>, <?= json_encode($q6_2); ?>, <?= json_encode($q6_3); ?>, <?= json_encode($q6_4); ?>, <?= json_encode($q6_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div></td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart6" aria-expanded="false" aria-controls="chart6"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q6_1; ?><br>
				(<?php $q6_1_percentage = $q6_1/$total*100;
				echo $this->Number->precision($q6_1_percentage, 0); ?>%)</td>
				<td><?php echo $q6_2; ?><br>
				(<?php $q6_2_percentage = $q6_2/$total*100;
				echo $this->Number->precision($q6_2_percentage, 0); ?>%)</td>
				<td><?php echo $q6_3; ?><br>
				(<?php $q6_3_percentage = $q6_3/$total*100;
				echo $this->Number->precision($q6_3_percentage, 0); ?>%)</td>
				<td><?php echo $q6_4; ?><br>
				(<?php $q6_4_percentage = $q6_4/$total*100;
				echo $this->Number->precision($q6_4_percentage, 0); ?>%)</td>
				<td><?php echo $q6_5; ?><br>
				(<?php $q6_5_percentage = $q6_5/$total*100;
				echo $this->Number->precision($q6_5_percentage, 0); ?>%)</td>
			</tr>
<!--q7-->
			<tr class="text-center">
				<td>7</td>
				<td class="text-left">I found the various functions in this system were well integrated<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart7">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q7" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q7').getContext('2d');
var q7 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q7_1); ?>, <?= json_encode($q7_2); ?>, <?= json_encode($q7_3); ?>, <?= json_encode($q7_4); ?>, <?= json_encode($q7_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div></td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart7" aria-expanded="false" aria-controls="chart7"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q7_1; ?><br>
				(<?php $q7_1_percentage = $q7_1/$total*100;
				echo $this->Number->precision($q7_1_percentage, 0); ?>%)</td>
				<td><?php echo $q7_2; ?><br>
				(<?php $q7_2_percentage = $q7_2/$total*100;
				echo $this->Number->precision($q7_2_percentage, 0); ?>%)</td>
				<td><?php echo $q7_3; ?><br>
				(<?php $q7_3_percentage = $q7_3/$total*100;
				echo $this->Number->precision($q7_3_percentage, 0); ?>%)</td>
				<td><?php echo $q7_4; ?><br>
				(<?php $q7_4_percentage = $q7_4/$total*100;
				echo $this->Number->precision($q7_4_percentage, 0); ?>%)</td>
				<td><?php echo $q7_5; ?><br>
				(<?php $q7_5_percentage = $q7_5/$total*100;
				echo $this->Number->precision($q7_5_percentage, 0); ?>%)</td>
			</tr>
<!--q8-->
			<tr class="text-center">
				<td>8</td>
				<td class="text-left">I tend to reduce a lot of mistakes with this system<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart8">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q8" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q8').getContext('2d');
var q8 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q8_1); ?>, <?= json_encode($q8_2); ?>, <?= json_encode($q8_3); ?>, <?= json_encode($q8_4); ?>, <?= json_encode($q8_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div></td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart8" aria-expanded="false" aria-controls="chart8"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q8_1; ?><br>
				(<?php $q8_1_percentage = $q8_1/$total*100;
				echo $this->Number->precision($q8_1_percentage, 0); ?>%)</td>
				<td><?php echo $q8_2; ?><br>
				(<?php $q8_2_percentage = $q8_2/$total*100;
				echo $this->Number->precision($q8_2_percentage, 0); ?>%)</td>
				<td><?php echo $q8_3; ?><br>
				(<?php $q8_3_percentage = $q8_3/$total*100;
				echo $this->Number->precision($q8_3_percentage, 0); ?>%)</td>
				<td><?php echo $q8_4; ?><br>
				(<?php $q8_4_percentage = $q8_4/$total*100;
				echo $this->Number->precision($q8_4_percentage, 0); ?>%)</td>
				<td><?php echo $q8_5; ?><br>
				(<?php $q8_5_percentage = $q8_5/$total*100;
				echo $this->Number->precision($q8_5_percentage, 0); ?>%)</td>
			</tr>
<!--q9-->
			<tr class="text-center">
				<td>9</td>
				<td class="text-left">I don’t make many errors with this system<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart9">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q9" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q9').getContext('2d');
var q9 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q9_1); ?>, <?= json_encode($q9_2); ?>, <?= json_encode($q9_3); ?>, <?= json_encode($q9_4); ?>, <?= json_encode($q9_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div></td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart9" aria-expanded="false" aria-controls="chart9"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q9_1; ?><br>
				(<?php $q9_1_percentage = $q9_1/$total*100;
				echo $this->Number->precision($q9_1_percentage, 0); ?>%)</td>
				<td><?php echo $q9_2; ?><br>
				(<?php $q9_2_percentage = $q9_2/$total*100;
				echo $this->Number->precision($q9_2_percentage, 0); ?>%)</td>
				<td><?php echo $q9_3; ?><br>
				(<?php $q9_3_percentage = $q9_3/$total*100;
				echo $this->Number->precision($q9_3_percentage, 0); ?>%)</td>
				<td><?php echo $q9_4; ?><br>
				(<?php $q9_4_percentage = $q9_4/$total*100;
				echo $this->Number->precision($q9_4_percentage, 0); ?>%)</td>
				<td><?php echo $q9_5; ?><br>
				(<?php $q9_5_percentage = $q9_5/$total*100;
				echo $this->Number->precision($q9_5_percentage, 0); ?>%)</td>
			</tr>
<!--q10-->
			<tr class="text-center">
				<td>10</td>
				<td class="text-left">I don’t have to spend a lot of time correcting things with this system<br>
					<div class="row">
					  <div class="col">
						<div class="collapse multi-collapse" id="chart10">
<div class="row">
	<div class="col-md-7">

	</div>
	<div class="col-md-5">
<canvas id="q10" width="200px" height="200px"></canvas>
<script>
var ctx = document.getElementById('q10').getContext('2d');
var q10 = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['1','2','3','4','5'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($q10_1); ?>, <?= json_encode($q10_2); ?>, <?= json_encode($q10_3); ?>, <?= json_encode($q10_4); ?>, <?= json_encode($q10_5); ?>],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
		responsive: true,
		title: {
			display: false,
			text: ''
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
</div>
						</div>
					  </div>
					</div></td>
				<td>
				<button class="btn btn-block btn-outline-primary btn-sm" type="button" data-toggle="collapse" data-target="#chart10" aria-expanded="false" aria-controls="chart10"><i class="fas fa-chart-bar"></i></button>
				</td>
				<td><?php echo $q10_1; ?><br>
				(<?php $q10_1_percentage = $q10_1/$total*100;
				echo $this->Number->precision($q10_1_percentage, 0); ?>%)</td>
				<td><?php echo $q10_2; ?><br>
				(<?php $q10_2_percentage = $q10_2/$total*100;
				echo $this->Number->precision($q10_2_percentage, 0); ?>%)</td>
				<td><?php echo $q10_3; ?><br>
				(<?php $q10_3_percentage = $q10_3/$total*100;
				echo $this->Number->precision($q10_3_percentage, 0); ?>%)</td>
				<td><?php echo $q10_4; ?><br>
				(<?php $q10_4_percentage = $q10_4/$total*100;
				echo $this->Number->precision($q10_4_percentage, 0); ?>%)</td>
				<td><?php echo $q10_5; ?><br>
				(<?php $q10_5_percentage = $q10_5/$total*100;
				echo $this->Number->precision($q10_5_percentage, 0); ?>%)</td>
			</tr>
		</table>
	</div>
</div>

<div class="card2">
	<div class="header">
		<div class="panel_card2_title">Analysis</div>
		<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
	<div class="body">
<div class="row">
	<div class="col-md-4">
	x
	</div>
	<div class="col-md-4">
	x
	</div>
	<div class="col-md-4">
	x
	</div>
</div>
	</div>
</div>


<div class="container">
<div class="row">
	<div class="col-md-4">
	x
	</div>
	<div class="col-md-4">
	x
	</div>
	<div class="col-md-4">
	x
	</div>
	<div class="col-md-4">
	x
	</div>
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