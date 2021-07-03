<?php
declare(strict_types=1);
/* 
namespace App\Controller;
use Cake\ORM\TableRegistry;
use AuditStash\Meta\ApplicationMetadata;
use Cake\Event\EventManager;
 */
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use AuditStash\Meta\ApplicationMetadata;
use Cake\Event\EventInterface;

/**
 * AuditLogs Controller
 *
 * @property \App\Model\Table\AuditLogsTable $AuditLogs
 * @method \App\Model\Entity\AuditLog[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AuditLogsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

	public function initialize(): void
	{
		parent::initialize();

		$this->loadComponent('Search.Search', [
			'actions' => ['search'],
		]);
	}
	
    public function index()
    {
		$this->set('auditLogs', $this->paginate($this->AuditLogs->find('all')
				//->where(['AuditLogs.status' => 1]) //1 = Active
				//->order(['AuditLogs.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->AuditLogs->find()->count());
    }
	
    public function indexArchived()
    {
		$this->set('auditLogs', $this->paginate($this->AuditLogs->find('all')
				->where(['AuditLogs.status' => 2]) //2 = Archived
				//->order(['AuditLogs.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->AuditLogs->find()->where(['status' => '2'])->count());
    }
	
    public function indexDisposed()
    {
		$this->set('auditLogs', $this->paginate($this->AuditLogs->find('all')
				->where(['AuditLogs.status' => 3]) //3 = Disposed
				//->order(['AuditLogs.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->AuditLogs->find()->where(['status' => '3'])->count());
    }

    /**
     * View method
     *
     * @param string|null $id Audit Log id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $auditLog = $this->AuditLogs->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('auditLog'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Create']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'AuditLogs']);
			}
		});
        $auditLog = $this->AuditLogs->newEmptyEntity();
        if ($this->request->is('post')) {
            $auditLog = $this->AuditLogs->patchEntity($auditLog, $this->request->getData());
            if ($this->AuditLogs->save($auditLog)) {
                $this->Flash->success(__('The audit log has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The audit log could not be saved. Please, try again.'));
        }
        $this->set(compact('auditLog'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Audit Log id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $auditLog = $this->AuditLogs->get($id, [
            'contain' => [],
        ]);
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Edit']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'AuditLogs']);
			}
		});
        if ($this->request->is(['patch', 'post', 'put'])) {
            $auditLog = $this->AuditLogs->patchEntity($auditLog, $this->request->getData());
            if ($this->AuditLogs->save($auditLog)) {
                $this->Flash->success(__('The audit log has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The audit log could not be update. Please, try again.'));
        }
        $this->set(compact('auditLog'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Audit Log id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Delete']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'AuditLogs']);
			}
		});
		
		$auditLogs = TableRegistry::get('AuditLogs');
		$query = $auditLogs->query();
		$query->update()
			->set(['disposed_by' => $this->Auth->user('id')])
			->where(['id' => $id])
			->execute();
		
        $this->request->allowMethod(['post', 'delete']);
        $auditLog = $this->AuditLogs->get($id);
        if ($this->AuditLogs->delete($auditLog)) {
            $this->Flash->success(__('The audit log has been deleted.'));
        } else {
            $this->Flash->error(__('The audit log could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function deleteAll()
	{
		$this->request->allowMethod(['post','delete']);
		$ids = $this->request->getData('ids');
		
		if($this->AuditLogs->deleteAll(['AuditLogs.id IN'=>$ids])){
			$this->Flash->success(__('The selected auditLog has been deleted.'));
		} else {
			$this->Flash->error(__('Please select auditLog to delete'));
		}
			return $this->redirect(['action' => 'index']);
	}
	
	public function change()
	{
		if($this->getRequest()->is('post')) {
			$check = $this->request->getData('check');
			$status = $this->request->getData('status');
			
			$this->AuditLogs->updateAll(
				['status ' => $status ],
				['id IN' => $check]
			);
			$this->Flash->success(__('The selected action has been succesfully executed'));
			return $this->redirect($this->referer());
		}
	}
	
	public function pdf($id = null)
	{
		$this->viewBuilder()->enableAutoLayout(false); 
		$auditLog = $this->AuditLogs->get($id);
		$this->viewBuilder()->setClassName('CakePdf.pdf');
		$this->viewBuilder()->setOption(
			'pdfConfig',
			[
				'orientation' => 'portrait',
				'download' => true, // This can be omitted if "filename" is specified.
				'filename' => 'auditLog_' . $id . '.pdf' //// This can be omitted if you want file name based on URL.
			]
		);
		$this->set('auditLog', $auditLog);
	}

	
	public function csv()
	{
		$this->response = $this->response->withDownload('auditLogs_list.csv');
		$auditLogs = $this->AuditLogs->find();
		$_serialize = 'auditLogs';
		//$_header = ['ID', 'status', 'Created', 'Modified']; //include specific header
		//$_extract = ['id', 'status', 'created', 'modified']; //include specific data

		$this->viewBuilder()->setClassName('CsvView.Csv');
		$this->set(compact('auditLogs', '_serialize')); //include the _header and _extract ifany
	}
	
	public function search()
	{
		$this->paginate['maxLimit'] = 999;

		$auditLogs = $this->paginate($this->AuditLogs->find('search', ['search' => $this->request->getQuery()]));
		$this->set('count_search_result', $this->AuditLogs->find('search', ['search' => $this->request->getQuery()])->count());

		$this->set(compact('auditLogs'));
		$this->set('_serialize', ['auditLogs']);
	}
	
	public function retentionList()
    {
		$this->set('auditLogs', $this->paginate($this->AuditLogs->find('all')
				->where([
					'AuditLogs.rm_retention <=' => date('Y-m-d'),
					'AuditLogs.status' => 1,
					])
		));	
		$this->set('count_find_result', $this->AuditLogs->find()
				->where(['status' => '1', 'rm_retention <=' => date('Y-m-d'),])->count());
    }
	
	public function transferArchived($id=null)
	{
		$this->request->allowMethod(['post']);
		$auditLog = $this->AuditLogs->get($id);
		$updateData = [
				'status' => 2, //archived
				'rm_act_on' => date("Y-m-d H:i:s"),
				'rm_act_by' => $this->Auth->user('id')				
			]; 
			$this->AuditLogs->query()->update()->set($updateData)->where(['id' => $auditLog['id']])->execute();
			$this->Flash->success(__('The auditLog has been transfer to archived.'));
		return $this->redirect($this->referer());
	}
	
	public function transferDisposed($id=null)
	{
		$this->request->allowMethod(['post']);
		$auditLog = $this->AuditLogs->get($id);
		$updateData = [
				'status' => 3, //disposed
				'rm_act_on' => date("Y-m-d H:i:s"),
				'rm_act_by' => $this->Auth->user('id')				
			]; 
			$this->AuditLogs->query()->update()->set($updateData)->where(['id' => $auditLog['id']])->execute();
			$this->Flash->success(__('The auditLog has been disposed.'));
		return $this->redirect($this->referer());
	}
	
	public function recordActive($id=null,$status)
	{
		$auditLogs = TableRegistry::get('AuditLogs');
		$query = $auditLogs->query();
		$query->update()
			->set($query->newExpr('status = 1'))
			->where(['id' => $id])
			->execute();
			
		return $this->redirect($this->referer());
	}
	
	public function recordInactive($id=null,$status)
	{
		$auditLogs = TableRegistry::get('AuditLogs');
		$query = $auditLogs->query();
		$query->update()
			->set($query->newExpr('status = 2'))
			->where(['id' => $id])
			->execute();
			
		return $this->redirect($this->referer());
	}
	
    public function report()
    {
        $auditLogs = $this->paginate($this->AuditLogs);
		
		$this->set('total', $this->AuditLogs->find()->count());
		$this->set('total_status_0', $this->AuditLogs->find()->where(['status' => '0'])->count());
		$this->set('total_status_1', $this->AuditLogs->find()->where(['status' => '1'])->count());
		$this->set('total_status_2', $this->AuditLogs->find()->where(['status' => '2'])->count());
		$this->set('total_status_3', $this->AuditLogs->find()->where(['status' => '3'])->count());
//Current year count
		$this->set('total_current_year', $this->AuditLogs->find()
		->where([
				'YEAR(AuditLogs.created)' => date('Y')
		])->count());
		
		$this->set('q1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created) >=' => date('1'),
				'MONTH(AuditLogs.created) <=' => date('6'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());

		$this->set('q2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created) >=' => date('7'),
				'MONTH(AuditLogs.created) <=' => date('12'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
	
		$this->set('jan', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('1'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('feb', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('2'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('mar', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('3'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('apr', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('4'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('may', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('5'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('jun', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('6'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('jul', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('7'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('aug', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('8'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('sep', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('9'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('oct', $this->AuditLogs->find()
			->where(
				['MONTH(AuditLogs.created)' => date('10'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('nov', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('11'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
		$this->set('dec', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('12'),
				'YEAR(AuditLogs.created)' => date('Y')
			])->count());
//-1 year count	
		$this->set('total_1', $this->AuditLogs->find()
		->where([
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
		])->count());
		
		$this->set('q1_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created) >=' => date('1'),
				'MONTH(AuditLogs.created) <=' => date('6'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());

		$this->set('q2_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created) >=' => date('7'),
				'MONTH(AuditLogs.created) <=' => date('12'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
			
		$this->set('jan_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('1'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('feb_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('2'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('mar_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('3'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('apr_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('4'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('may_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('5'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('jun_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('6'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('jul_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('7'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('aug_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('8'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('sep_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('9'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('oct_1', $this->AuditLogs->find()
			->where(
				['MONTH(AuditLogs.created)' => date('10'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('nov_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('11'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('dec_1', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('12'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-1 year'))
			])->count());
//-2 year count	
				$this->set('total_2', $this->AuditLogs->find()
		->where([
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
		])->count());
		
		$this->set('q1_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created) >=' => date('1'),
				'MONTH(AuditLogs.created) <=' => date('6'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());

		$this->set('q2_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created) >=' => date('7'),
				'MONTH(AuditLogs.created) <=' => date('12'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
			
		$this->set('jan_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('1'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('feb_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('2'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('mar_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('3'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('apr_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('4'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('may_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('5'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('jun_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('6'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('jul_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('7'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('aug_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('8'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('sep_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('9'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('oct_2', $this->AuditLogs->find()
			->where(
				['MONTH(AuditLogs.created)' => date('10'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('nov_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('11'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('dec_2', $this->AuditLogs->find()
			->where([
				'MONTH(AuditLogs.created)' => date('12'),
				'YEAR(AuditLogs.created)' => date('Y',strtotime('-2 year'))
			])->count());
		
        $this->set(compact('auditLogs'));
    }
}
