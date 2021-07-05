<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
use AuditStash\Meta\ApplicationMetadata;
use Cake\Event\EventManager;

/**
 * Sus Controller
 *
 * @property \App\Model\Table\SusTable $Sus
 * @method \App\Model\Entity\Sus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SusController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

	public function initialize(): void
	{
		parent::initialize();

		$this->Authentication->addUnauthenticatedActions(['add','edit']);
		
		$this->loadComponent('Search.Search', [
			'actions' => ['search'],
		]);
	}
	
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
		
		$this->set('sus', $this->paginate($this->Sus->find('all')
				->where(['Sus.status' => 1]) //1 = Active
				//->order(['Sus.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->Sus->find()->where(['status' => '1'])->count());
		
		$this->set('total', $this->Sus->find()->count());
//q1
		$this->set('q1_1', $this->Sus->find()->where(['q1' => '1'])->count());
		//$ayam = $q1_1/$total*100;
		//$this->set('ayam', $q1_1/$total*100);
		$this->set('q1_2', $this->Sus->find()->where(['q1' => '2'])->count());
		$this->set('q1_3', $this->Sus->find()->where(['q1' => '3'])->count());
		$this->set('q1_4', $this->Sus->find()->where(['q1' => '4'])->count());
		$this->set('q1_5', $this->Sus->find()->where(['q1' => '5'])->count());
//q2
		$this->set('q2_1', $this->Sus->find()->where(['q2' => '1'])->count());
		$this->set('q2_2', $this->Sus->find()->where(['q2' => '2'])->count());
		$this->set('q2_3', $this->Sus->find()->where(['q2' => '3'])->count());
		$this->set('q2_4', $this->Sus->find()->where(['q2' => '4'])->count());
		$this->set('q2_5', $this->Sus->find()->where(['q2' => '5'])->count());
//q3
		$this->set('q3_1', $this->Sus->find()->where(['q3' => '1'])->count());
		$this->set('q3_2', $this->Sus->find()->where(['q3' => '2'])->count());
		$this->set('q3_3', $this->Sus->find()->where(['q3' => '3'])->count());
		$this->set('q3_4', $this->Sus->find()->where(['q3' => '4'])->count());
		$this->set('q3_5', $this->Sus->find()->where(['q3' => '5'])->count());
//q4
		$this->set('q4_1', $this->Sus->find()->where(['q4' => '1'])->count());
		$this->set('q4_2', $this->Sus->find()->where(['q4' => '2'])->count());
		$this->set('q4_3', $this->Sus->find()->where(['q4' => '3'])->count());
		$this->set('q4_4', $this->Sus->find()->where(['q4' => '4'])->count());
		$this->set('q4_5', $this->Sus->find()->where(['q4' => '5'])->count());
//q5
		$this->set('q5_1', $this->Sus->find()->where(['q5' => '1'])->count());
		$this->set('q5_2', $this->Sus->find()->where(['q5' => '2'])->count());
		$this->set('q5_3', $this->Sus->find()->where(['q5' => '3'])->count());
		$this->set('q5_4', $this->Sus->find()->where(['q5' => '4'])->count());
		$this->set('q5_5', $this->Sus->find()->where(['q5' => '5'])->count());
//q6
		$this->set('q6_1', $this->Sus->find()->where(['q6' => '1'])->count());
		$this->set('q6_2', $this->Sus->find()->where(['q6' => '2'])->count());
		$this->set('q6_3', $this->Sus->find()->where(['q6' => '3'])->count());
		$this->set('q6_4', $this->Sus->find()->where(['q6' => '4'])->count());
		$this->set('q6_5', $this->Sus->find()->where(['q6' => '5'])->count());
//q7
		$this->set('q7_1', $this->Sus->find()->where(['q7' => '1'])->count());
		$this->set('q7_2', $this->Sus->find()->where(['q7' => '2'])->count());
		$this->set('q7_3', $this->Sus->find()->where(['q7' => '3'])->count());
		$this->set('q7_4', $this->Sus->find()->where(['q7' => '4'])->count());
		$this->set('q7_5', $this->Sus->find()->where(['q7' => '5'])->count());
//q8
		$this->set('q8_1', $this->Sus->find()->where(['q8' => '1'])->count());
		$this->set('q8_2', $this->Sus->find()->where(['q8' => '2'])->count());
		$this->set('q8_3', $this->Sus->find()->where(['q8' => '3'])->count());
		$this->set('q8_4', $this->Sus->find()->where(['q8' => '4'])->count());
		$this->set('q8_5', $this->Sus->find()->where(['q8' => '5'])->count());
//q9
		$this->set('q9_1', $this->Sus->find()->where(['q9' => '1'])->count());
		$this->set('q9_2', $this->Sus->find()->where(['q9' => '2'])->count());
		$this->set('q9_3', $this->Sus->find()->where(['q9' => '3'])->count());
		$this->set('q9_4', $this->Sus->find()->where(['q9' => '4'])->count());
		$this->set('q9_5', $this->Sus->find()->where(['q9' => '5'])->count());
//q10
		$this->set('q10_1', $this->Sus->find()->where(['q10' => '1'])->count());
		$this->set('q10_2', $this->Sus->find()->where(['q10' => '2'])->count());
		$this->set('q10_3', $this->Sus->find()->where(['q10' => '3'])->count());
		$this->set('q10_4', $this->Sus->find()->where(['q10' => '4'])->count());
		$this->set('q10_5', $this->Sus->find()->where(['q10' => '5'])->count());
    }
	
    public function indexArchived()
    {
		$this->set('sus', $this->paginate($this->Sus->find('all')
				->where(['Sus.status' => 2]) //2 = Archived
				//->order(['Sus.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->Sus->find()->where(['status' => '2'])->count());
    }
	
    public function indexDisposed()
    {
		$this->set('sus', $this->paginate($this->Sus->find('all')
				->where(['Sus.status' => 3]) //3 = Disposed
				//->order(['Sus.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->Sus->find()->where(['status' => '3'])->count());
    }

    /**
     * View method
     *
     * @param string|null $id Sus id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sus = $this->Sus->get($id, [
            'contain' => ['Users'],
        ]);
		

        $this->set(compact('sus'));
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
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Sus']);
			}
		});
        $sus = $this->Sus->newEmptyEntity();
        if ($this->request->is('post')) {
            $sus = $this->Sus->patchEntity($sus, $this->request->getData());
			
			$session = $this->request->getSession(); //get session data: user slug
			$sus->user_id = $session->read('user_id');
			
            if ($this->Sus->save($sus)) {
                $this->Flash->success(__('The sus has been saved.'));

                //$session = $this->request->getSession(); //get session data: user slug
                return $this->redirect(['controller' => 'users', 'action' => 'mysurvey', $session->read('slug')]);
            }
            $this->Flash->error(__('The sus could not be saved. Please, try again.'));
        }
        $users = $this->Sus->Users->find('list', ['limit' => 200]);
        $this->set(compact('sus', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Sus id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sus = $this->Sus->get($id, [
            'contain' => [],
        ]);
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Edit']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Sus']);
			}
		});
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sus = $this->Sus->patchEntity($sus, $this->request->getData());
            if ($this->Sus->save($sus)) {
                $this->Flash->success(__('The sus has been updated.'));

                $session = $this->request->getSession(); //get session data: user slug
                return $this->redirect(['controller' => 'users', 'action' => 'mysurvey', $session->read('slug')]);
            }
            $this->Flash->error(__('The sus could not be update. Please, try again.'));
        }
        $users = $this->Sus->Users->find('list', ['limit' => 200]);
        $this->set(compact('sus', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Sus id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Delete']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Sus']);
			}
		});
		
		$sus = TableRegistry::get('Sus');
		$query = $sus->query();
		$query->update()
			->set(['disposed_by' => $this->Auth->user('id')])
			->where(['id' => $id])
			->execute();
		
        $this->request->allowMethod(['post', 'delete']);
        $sus = $this->Sus->get($id);
        if ($this->Sus->delete($sus)) {
            $this->Flash->success(__('The sus has been deleted.'));
        } else {
            $this->Flash->error(__('The sus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function deleteAll()
	{
		$this->request->allowMethod(['post','delete']);
		$ids = $this->request->getData('ids');
		
		if($this->Sus->deleteAll(['Sus.id IN'=>$ids])){
			$this->Flash->success(__('The selected sus has been deleted.'));
		} else {
			$this->Flash->error(__('Please select sus to delete'));
		}
			return $this->redirect(['action' => 'index']);
	}
	
	public function change()
	{
		if($this->getRequest()->is('post')) {
			$check = $this->request->getData('check');
			$status = $this->request->getData('status');
			
			$this->Sus->updateAll(
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
		$sus = $this->Sus->get($id);
		$this->viewBuilder()->setClassName('CakePdf.pdf');
		$this->viewBuilder()->setOption(
			'pdfConfig',
			[
				'orientation' => 'portrait',
				'download' => true, // This can be omitted if "filename" is specified.
				'filename' => 'sus_' . $id . '.pdf' //// This can be omitted if you want file name based on URL.
			]
		);
		$this->set('sus', $sus);
	}

	
	public function csv()
	{
		$this->response = $this->response->withDownload('sus_list.csv');
		$sus = $this->Sus->find();
		$_serialize = 'sus';
		//$_header = ['ID', 'status', 'Created', 'Modified']; //include specific header
		//$_extract = ['id', 'status', 'created', 'modified']; //include specific data

		$this->viewBuilder()->setClassName('CsvView.Csv');
		$this->set(compact('sus', '_serialize')); //include the _header and _extract ifany
	}
	
	public function search()
	{
		$this->paginate['maxLimit'] = 999;

		$sus = $this->paginate($this->Sus->find('search', ['search' => $this->request->getQuery()]));
		$this->set('count_search_result', $this->Sus->find('search', ['search' => $this->request->getQuery()])->count());

		$this->set(compact('sus'));
		$this->set('_serialize', ['sus']);
	}
	
	public function retentionList()
    {
		$this->set('sus', $this->paginate($this->Sus->find('all')
				->where([
					'Sus.rm_retention <=' => date('Y-m-d'),
					'Sus.status' => 1,
					])
		));	
		$this->set('count_find_result', $this->Sus->find()
				->where(['status' => '1', 'rm_retention <=' => date('Y-m-d'),])->count());
    }
	
	public function transferArchived($id=null)
	{
		$this->request->allowMethod(['post']);
		$sus = $this->Sus->get($id);
		$updateData = [
				'status' => 2, //archived
				'rm_act_on' => date("Y-m-d H:i:s"),
				'rm_act_by' => $this->Auth->user('id')				
			]; 
			$this->Sus->query()->update()->set($updateData)->where(['id' => $sus['id']])->execute();
			$this->Flash->success(__('The sus has been transfer to archived.'));
		return $this->redirect($this->referer());
	}
	
	public function transferDisposed($id=null)
	{
		$this->request->allowMethod(['post']);
		$sus = $this->Sus->get($id);
		$updateData = [
				'status' => 3, //disposed
				'rm_act_on' => date("Y-m-d H:i:s"),
				'rm_act_by' => $this->Auth->user('id')				
			]; 
			$this->Sus->query()->update()->set($updateData)->where(['id' => $sus['id']])->execute();
			$this->Flash->success(__('The sus has been disposed.'));
		return $this->redirect($this->referer());
	}
	
	public function recordActive($id=null,$status)
	{
		$sus = TableRegistry::get('Sus');
		$query = $sus->query();
		$query->update()
			->set($query->newExpr('status = 1'))
			->where(['id' => $id])
			->execute();
			
		return $this->redirect($this->referer());
	}
	
	public function recordInactive($id=null,$status)
	{
		$sus = TableRegistry::get('Sus');
		$query = $sus->query();
		$query->update()
			->set($query->newExpr('status = 2'))
			->where(['id' => $id])
			->execute();
			
		return $this->redirect($this->referer());
	}
	
    public function report()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $sus = $this->paginate($this->Sus);
		
		$this->set('total', $this->Sus->find()->count());
		$this->set('total_status_0', $this->Sus->find()->where(['status' => '0'])->count());
		$this->set('total_status_1', $this->Sus->find()->where(['status' => '1'])->count());
		$this->set('total_status_2', $this->Sus->find()->where(['status' => '2'])->count());
		$this->set('total_status_3', $this->Sus->find()->where(['status' => '3'])->count());
//Current year count
		$this->set('total_current_year', $this->Sus->find()
		->where([
				'YEAR(Sus.created)' => date('Y')
		])->count());
		
		$this->set('q1', $this->Sus->find()
			->where([
				'MONTH(Sus.created) >=' => date('1'),
				'MONTH(Sus.created) <=' => date('6'),
				'YEAR(Sus.created)' => date('Y')
			])->count());

		$this->set('q2', $this->Sus->find()
			->where([
				'MONTH(Sus.created) >=' => date('7'),
				'MONTH(Sus.created) <=' => date('12'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
	
		$this->set('jan', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('1'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('feb', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('2'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('mar', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('3'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('apr', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('4'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('may', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('5'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('jun', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('6'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('jul', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('7'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('aug', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('8'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('sep', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('9'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('oct', $this->Sus->find()
			->where(
				['MONTH(Sus.created)' => date('10'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('nov', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('11'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
		$this->set('dec', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('12'),
				'YEAR(Sus.created)' => date('Y')
			])->count());
//-1 year count	
		$this->set('total_1', $this->Sus->find()
		->where([
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
		])->count());
		
		$this->set('q1_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created) >=' => date('1'),
				'MONTH(Sus.created) <=' => date('6'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());

		$this->set('q2_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created) >=' => date('7'),
				'MONTH(Sus.created) <=' => date('12'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
			
		$this->set('jan_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('1'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('feb_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('2'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('mar_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('3'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('apr_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('4'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('may_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('5'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('jun_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('6'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('jul_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('7'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('aug_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('8'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('sep_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('9'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('oct_1', $this->Sus->find()
			->where(
				['MONTH(Sus.created)' => date('10'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('nov_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('11'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('dec_1', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('12'),
				'YEAR(Sus.created)' => date('Y',strtotime('-1 year'))
			])->count());
//-2 year count	
				$this->set('total_2', $this->Sus->find()
		->where([
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
		])->count());
		
		$this->set('q1_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created) >=' => date('1'),
				'MONTH(Sus.created) <=' => date('6'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());

		$this->set('q2_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created) >=' => date('7'),
				'MONTH(Sus.created) <=' => date('12'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
			
		$this->set('jan_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('1'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('feb_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('2'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('mar_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('3'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('apr_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('4'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('may_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('5'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('jun_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('6'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('jul_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('7'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('aug_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('8'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('sep_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('9'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('oct_2', $this->Sus->find()
			->where(
				['MONTH(Sus.created)' => date('10'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('nov_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('11'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('dec_2', $this->Sus->find()
			->where([
				'MONTH(Sus.created)' => date('12'),
				'YEAR(Sus.created)' => date('Y',strtotime('-2 year'))
			])->count());
		
        $this->set(compact('sus'));
    }
}
