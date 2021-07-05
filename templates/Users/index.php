<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
 $c_name = $this->request->getParam('controller');
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha256-TQq84xX6vkwR0Qs1qH5ADkP+MvH0W+9E7TdHJsoIQiM=" crossorigin="anonymous"></script>

<?php //echo $username = $this->Identity->get('email'); ?>
<?= $this->Form->create(null,['url'=>['action'=>'change']]) ?>
<div class="horizontal_menu">
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
			<?= $this->Html->link(__('<i class="fas fa-plus"></i> New User'), ['action' => 'add'], ['class' => 'dropdown-item', 'escape' => false]) ?>
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
				<div class="panel_card2_title">List of Users</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
	</div>
		<div class="body">
			<div class="col-md-12 table-responsive">
				<table id="main_index" class="table table-hover">
					<thead>
				<tr>
					<th><?= $this->Form->checkbox('check[]',['onchange'=>'checkAll(this)', 'name'=>'chk[]']) ?></th>
					<th><?= $this->Paginator->sort('id') ?></th>
					<th><?= $this->Paginator->sort('email') ?></th>
					<th><?= $this->Paginator->sort('fullname') ?></th>
					<th><?= $this->Paginator->sort('age') ?></th>
					<th><?= $this->Paginator->sort('gender') ?></th>
					<th><?= $this->Paginator->sort('highest_qualification') ?></th>
					<th><?= $this->Paginator->sort('current_working_post') ?></th>
					<th><?= $this->Paginator->sort('dev_experience') ?></th>
					<th><?= $this->Paginator->sort('dev_sector') ?></th>
					<th><?= $this->Paginator->sort('primary_language') ?></th>
					<th class="actions" style="text-align: center;"><?= __('Actions') ?></th>
				</tr>
					</thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                
				<?php if ($user->fullname != NULL){
					echo "<tr class='bg-teal'>";
				}else
					echo "<tr class='bg-warning'>";
				?>
					<td><?php echo $this->Form->checkbox('check[]',['value'=>$user->id]) ?></td>
                    <td><?= $this->Number->format($user->id) ?></td>				
                    <td><?= h($user->email) ?></td>					
                    <td><?= h($user->fullname) ?></td>					
                    <td><?= h($user->age) ?></td>					
                    <td><?= h($user->gender) ?></td>					
                    <td><?= h($user->highest_qualification) ?></td>					
                    <td><?= h($user->current_working_post) ?></td>					
                    <td><?= h($user->dev_experience) ?></td>					
                    <td><?= h($user->dev_sector) ?></td>					
                    <td><?= h($user->primary_language) ?></td>					
                    <td class="actions" align="center">						
<div class="btn-group">
  <button type="button" class="btn btn-outline btn-sm btn-flat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-bars text-primary"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
		<?= $this->Html->link(__('<i class="far fa-folder-open"></i> View'), ['action' => 'mysurveyLock', $user->slug], ['class' => 'dropdown-item', 'escape' => false]) ?>
	<div class="dropdown-divider"></div>
		<?= $this->Html->link(__('<i class="far fa-edit"></i> Edit'), ['action' => 'edit', $user->id], ['class' => 'dropdown-item', 'escape' => false]) ?>
		<?= $this->Html->link(__('<i class="far fa-trash-alt"></i> Dispose'), ['action' => 'transferDisposed', $user->id], ['class' => 'dropdown-item', 'data-toggle' => 'modal', 'data-target' => '#disposed' . $user->id, 'escape' => false]) ?>
  </div>
</div>
                    </td>
                </tr>
<div class="modal fade" id="disposed<?php echo $user->id; ?>">
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
<?php echo $this->Paginator->limitControl([10 => 'Show 10 entries',25 => 'Show 25 entries', 50 => 'Show 50 entries', 100 => 'Show 100 entries'], $user->perPage,['class' => 'form-control form-control-sm','label' => false]); ?>
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

<div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-info-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Invitation Sent</span>
                <span class="info-box-number">
                  <?php echo $total_invitation; ?>
                  <small></small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Completed Response</span>
                <span class="info-box-number">
<?php echo $total_completed_response; ?>
				</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-spinner"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Pending for Response</span>
                <span class="info-box-number">
				<?php 
					$pending_answer = $total_invitation - $total_completed_response;
					echo $pending_answer;
				?>
				</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="far fa-list-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Log</span>
                <span class="info-box-number">0</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>	










<div class="row">
	<div class="col-md-4">
<canvas id="gender" width="200px" height="150px"></canvas>
<script>
var ctx = document.getElementById('gender').getContext('2d');
var gender = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Male','Female'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($total_male); ?>, <?= json_encode($total_female); ?>],
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
			display: true,
			text: 'Gender'
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
	<div class="col-md-4">
<canvas id="age" width="200px" height="150px"></canvas>
<script>
var ctx = document.getElementById('age').getContext('2d');
var age = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['21-25', '26-30', '31-35', '36-40', '41-45', '46-50'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($total_age_21_25); ?>, <?= json_encode($total_age_26_30); ?>, <?= json_encode($total_age_31_35); ?>, <?= json_encode($total_age_36_40); ?>, <?= json_encode($total_age_41_45); ?>, <?= json_encode($total_age_46_50); ?>],
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
			display: true,
			text: 'Age Segmentation'
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
	<div class="col-md-4">
<canvas id="qualification" width="200px" height="150px"></canvas>
<script>
var ctx = document.getElementById('qualification').getContext('2d');
var qualification = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['High School', 'Diploma', 'Bachelor Degree', 'Master Degree', 'PhD'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($total_qualification_hs); ?>, <?= json_encode($total_qualification_diploma); ?>, <?= json_encode($total_qualification_degree); ?>, <?= json_encode($total_qualification_master); ?>, <?= json_encode($total_qualification_phd); ?>],
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
			display: true,
			text: 'Academic Qualification'
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



<div class="row">
	<div class="col-md-4">
<canvas id="dev_experience" width="200px" height="150px"></canvas>
<script>
var ctx = document.getElementById('dev_experience').getContext('2d');
var dev_experience = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['<3', '3-6', '>6'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($total_exp_3); ?>, <?= json_encode($total_exp_36); ?>, <?= json_encode($total_exp_more); ?>],
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
			display: true,
			text: 'Development Experience (Year)'
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
	<div class="col-md-4">
<canvas id="dev_sector" width="200px" height="150px"></canvas>
<script>
var ctx = document.getElementById('dev_sector').getContext('2d');
var dev_sector = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Web', 'Mobile', 'Desktop', 'Cloud', 'IoT'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($total_sector_web); ?>, <?= json_encode($total_sector_mobile); ?>, <?= json_encode($total_sector_desktop); ?>, <?= json_encode($total_sector_cloud); ?>, <?= json_encode($total_sector_iot); ?>],
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
			display: true,
			text: 'Software Application Major Sector'
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
	<div class="col-md-4">
<canvas id="primary_language" width="200px" height="150px"></canvas>
<script>
var ctx = document.getElementById('primary_language').getContext('2d');
var primary_language = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['PHP', 'Java', 'Python', 'C', 'C++', 'Other'],
        datasets: [{
            label: '#',
            data: [<?= json_encode($total_language_php); ?>, <?= json_encode($total_language_java); ?>, <?= json_encode($total_language_python); ?>, <?= json_encode($total_language_c); ?>, <?= json_encode($total_language_cplus); ?>, <?= json_encode($total_language_other); ?>],
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
			display: true,
			text: 'Primary Programming Language Used'
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