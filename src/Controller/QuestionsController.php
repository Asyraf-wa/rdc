<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
use AuditStash\Meta\ApplicationMetadata;
use Cake\Event\EventManager;

/**
 * Questions Controller
 *
 * @property \App\Model\Table\QuestionsTable $Questions
 * @method \App\Model\Entity\Question[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuestionsController extends AppController
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
		
		$this->set('questions', $this->paginate($this->Questions->find('all')
				->where(['Questions.status' => 1]) //1 = Active
				//->order(['Questions.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->Questions->find()->where(['status' => '1'])->count());
		
		$this->set('total', $this->Questions->find()->count());
//SF1
		$this->set('sf1_s_negative', $this->Questions->find()->where(['sf1_s' => '-1',])->count()); 
		$this->set('sf1_s_zero', $this->Questions->find()->where(['sf1_s' => '0',])->count()); 
		$this->set('sf1_s_pointfive', $this->Questions->find()->where(['sf1_s' => '0.5',])->count()); 
		$this->set('sf1_s_one', $this->Questions->find()->where(['sf1_s' => '1',])->count());
		
		$this->set('sf1_l_n', $this->Questions->find()->where(['sf1_l' => 'N',])->count()); 
		$this->set('sf1_l_d', $this->Questions->find()->where(['sf1_l' => 'D',])->count()); 
		$this->set('sf1_l_hd', $this->Questions->find()->where(['sf1_l' => 'HD',])->count()); 
		$this->set('sf1_l_m', $this->Questions->find()->where(['sf1_l' => 'M',])->count()); 
//SF2
		$this->set('sf2_s_negative', $this->Questions->find()->where(['sf2_s' => '-1',])->count()); 
		$this->set('sf2_s_zero', $this->Questions->find()->where(['sf2_s' => '0',])->count()); 
		$this->set('sf2_s_pointfive', $this->Questions->find()->where(['sf2_s' => '0.5',])->count()); 
		$this->set('sf2_s_one', $this->Questions->find()->where(['sf2_s' => '1',])->count());
		
		$this->set('sf2_l_n', $this->Questions->find()->where(['sf2_l' => 'N',])->count()); 
		$this->set('sf2_l_d', $this->Questions->find()->where(['sf2_l' => 'D',])->count()); 
		$this->set('sf2_l_hd', $this->Questions->find()->where(['sf2_l' => 'HD',])->count()); 
		$this->set('sf2_l_m', $this->Questions->find()->where(['sf2_l' => 'M',])->count()); 
//SF3
		$this->set('sf3_s_negative', $this->Questions->find()->where(['sf3_s' => '-1',])->count()); 
		$this->set('sf3_s_zero', $this->Questions->find()->where(['sf3_s' => '0',])->count()); 
		$this->set('sf3_s_pointfive', $this->Questions->find()->where(['sf3_s' => '0.5',])->count()); 
		$this->set('sf3_s_one', $this->Questions->find()->where(['sf3_s' => '1',])->count());
		
		$this->set('sf3_l_n', $this->Questions->find()->where(['sf3_l' => 'N',])->count()); 
		$this->set('sf3_l_d', $this->Questions->find()->where(['sf3_l' => 'D',])->count()); 
		$this->set('sf3_l_hd', $this->Questions->find()->where(['sf3_l' => 'HD',])->count()); 
		$this->set('sf3_l_m', $this->Questions->find()->where(['sf3_l' => 'M',])->count()); 
//SF4
		$this->set('sf4_s_negative', $this->Questions->find()->where(['sf4_s' => '-1',])->count()); 
		$this->set('sf4_s_zero', $this->Questions->find()->where(['sf4_s' => '0',])->count()); 
		$this->set('sf4_s_pointfive', $this->Questions->find()->where(['sf4_s' => '0.5',])->count()); 
		$this->set('sf4_s_one', $this->Questions->find()->where(['sf4_s' => '1',])->count());
		
		$this->set('sf4_l_n', $this->Questions->find()->where(['sf4_l' => 'N',])->count()); 
		$this->set('sf4_l_d', $this->Questions->find()->where(['sf4_l' => 'D',])->count()); 
		$this->set('sf4_l_hd', $this->Questions->find()->where(['sf4_l' => 'HD',])->count()); 
		$this->set('sf4_l_m', $this->Questions->find()->where(['sf4_l' => 'M',])->count()); 
//SF5
		$this->set('sf5_s_negative', $this->Questions->find()->where(['sf5_s' => '-1',])->count()); 
		$this->set('sf5_s_zero', $this->Questions->find()->where(['sf5_s' => '0',])->count()); 
		$this->set('sf5_s_pointfive', $this->Questions->find()->where(['sf5_s' => '0.5',])->count()); 
		$this->set('sf5_s_one', $this->Questions->find()->where(['sf5_s' => '1',])->count());
		
		$this->set('sf5_l_n', $this->Questions->find()->where(['sf5_l' => 'N',])->count()); 
		$this->set('sf5_l_d', $this->Questions->find()->where(['sf5_l' => 'D',])->count()); 
		$this->set('sf5_l_hd', $this->Questions->find()->where(['sf5_l' => 'HD',])->count()); 
		$this->set('sf5_l_m', $this->Questions->find()->where(['sf5_l' => 'M',])->count()); 
//SF6
		$this->set('sf6_s_negative', $this->Questions->find()->where(['sf6_s' => '-1',])->count()); 
		$this->set('sf6_s_zero', $this->Questions->find()->where(['sf6_s' => '0',])->count()); 
		$this->set('sf6_s_pointfive', $this->Questions->find()->where(['sf6_s' => '0.5',])->count()); 
		$this->set('sf6_s_one', $this->Questions->find()->where(['sf6_s' => '1',])->count());
		
		$this->set('sf6_l_n', $this->Questions->find()->where(['sf6_l' => 'N',])->count()); 
		$this->set('sf6_l_d', $this->Questions->find()->where(['sf6_l' => 'D',])->count()); 
		$this->set('sf6_l_hd', $this->Questions->find()->where(['sf6_l' => 'HD',])->count()); 
		$this->set('sf6_l_m', $this->Questions->find()->where(['sf6_l' => 'M',])->count()); 
//SF7
		$this->set('sf7_s_negative', $this->Questions->find()->where(['sf7_s' => '-1',])->count()); 
		$this->set('sf7_s_zero', $this->Questions->find()->where(['sf7_s' => '0',])->count()); 
		$this->set('sf7_s_pointfive', $this->Questions->find()->where(['sf7_s' => '0.5',])->count()); 
		$this->set('sf7_s_one', $this->Questions->find()->where(['sf7_s' => '1',])->count());
		
		$this->set('sf7_l_n', $this->Questions->find()->where(['sf7_l' => 'N',])->count()); 
		$this->set('sf7_l_d', $this->Questions->find()->where(['sf7_l' => 'D',])->count()); 
		$this->set('sf7_l_hd', $this->Questions->find()->where(['sf7_l' => 'HD',])->count()); 
		$this->set('sf7_l_m', $this->Questions->find()->where(['sf7_l' => 'M',])->count()); 
//SF8
		$this->set('sf8_s_negative', $this->Questions->find()->where(['sf8_s' => '-1',])->count()); 
		$this->set('sf8_s_zero', $this->Questions->find()->where(['sf8_s' => '0',])->count()); 
		$this->set('sf8_s_pointfive', $this->Questions->find()->where(['sf8_s' => '0.5',])->count()); 
		$this->set('sf8_s_one', $this->Questions->find()->where(['sf8_s' => '1',])->count());
		
		$this->set('sf8_l_n', $this->Questions->find()->where(['sf8_l' => 'N',])->count()); 
		$this->set('sf8_l_d', $this->Questions->find()->where(['sf8_l' => 'D',])->count()); 
		$this->set('sf8_l_hd', $this->Questions->find()->where(['sf8_l' => 'HD',])->count()); 
		$this->set('sf8_l_m', $this->Questions->find()->where(['sf8_l' => 'M',])->count()); 
//SF9
		$this->set('sf9_s_negative', $this->Questions->find()->where(['sf9_s' => '-1',])->count()); 
		$this->set('sf9_s_zero', $this->Questions->find()->where(['sf9_s' => '0',])->count()); 
		$this->set('sf9_s_pointfive', $this->Questions->find()->where(['sf9_s' => '0.5',])->count()); 
		$this->set('sf9_s_one', $this->Questions->find()->where(['sf9_s' => '1',])->count());
		
		$this->set('sf9_l_n', $this->Questions->find()->where(['sf9_l' => 'N',])->count()); 
		$this->set('sf9_l_d', $this->Questions->find()->where(['sf9_l' => 'D',])->count()); 
		$this->set('sf9_l_hd', $this->Questions->find()->where(['sf9_l' => 'HD',])->count()); 
		$this->set('sf9_l_m', $this->Questions->find()->where(['sf9_l' => 'M',])->count()); 
//SF10
		$this->set('sf10_s_negative', $this->Questions->find()->where(['sf10_s' => '-1',])->count()); 
		$this->set('sf10_s_zero', $this->Questions->find()->where(['sf10_s' => '0',])->count()); 
		$this->set('sf10_s_pointfive', $this->Questions->find()->where(['sf10_s' => '0.5',])->count()); 
		$this->set('sf10_s_one', $this->Questions->find()->where(['sf10_s' => '1',])->count());
		
		$this->set('sf10_l_n', $this->Questions->find()->where(['sf10_l' => 'N',])->count()); 
		$this->set('sf10_l_d', $this->Questions->find()->where(['sf10_l' => 'D',])->count()); 
		$this->set('sf10_l_hd', $this->Questions->find()->where(['sf10_l' => 'HD',])->count()); 
		$this->set('sf10_l_m', $this->Questions->find()->where(['sf10_l' => 'M',])->count()); 
//SF11
		$this->set('sf11_s_negative', $this->Questions->find()->where(['sf11_s' => '-1',])->count()); 
		$this->set('sf11_s_zero', $this->Questions->find()->where(['sf11_s' => '0',])->count()); 
		$this->set('sf11_s_pointfive', $this->Questions->find()->where(['sf11_s' => '0.5',])->count()); 
		$this->set('sf11_s_one', $this->Questions->find()->where(['sf11_s' => '1',])->count());
		
		$this->set('sf11_l_n', $this->Questions->find()->where(['sf11_l' => 'N',])->count()); 
		$this->set('sf11_l_d', $this->Questions->find()->where(['sf11_l' => 'D',])->count()); 
		$this->set('sf11_l_hd', $this->Questions->find()->where(['sf11_l' => 'HD',])->count()); 
		$this->set('sf11_l_m', $this->Questions->find()->where(['sf11_l' => 'M',])->count()); 
//SF12
		$this->set('sf12_s_negative', $this->Questions->find()->where(['sf12_s' => '-1',])->count()); 
		$this->set('sf12_s_zero', $this->Questions->find()->where(['sf12_s' => '0',])->count()); 
		$this->set('sf12_s_pointfive', $this->Questions->find()->where(['sf12_s' => '0.5',])->count()); 
		$this->set('sf12_s_one', $this->Questions->find()->where(['sf12_s' => '1',])->count());
		
		$this->set('sf12_l_n', $this->Questions->find()->where(['sf12_l' => 'N',])->count()); 
		$this->set('sf12_l_d', $this->Questions->find()->where(['sf12_l' => 'D',])->count()); 
		$this->set('sf12_l_hd', $this->Questions->find()->where(['sf12_l' => 'HD',])->count()); 
		$this->set('sf12_l_m', $this->Questions->find()->where(['sf12_l' => 'M',])->count()); 






    }
	
    public function indexArchived()
    {
		$this->set('questions', $this->paginate($this->Questions->find('all')
				->where(['Questions.status' => 2]) //2 = Archived
				//->order(['Questions.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->Questions->find()->where(['status' => '2'])->count());
    }
	
    public function indexDisposed()
    {
		$this->set('questions', $this->paginate($this->Questions->find('all')
				->where(['Questions.status' => 3]) //3 = Disposed
				//->order(['Questions.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->Questions->find()->where(['status' => '3'])->count());
    }

    /**
     * View method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => ['Users'],
        ]);
		
		$questions = TableRegistry::get('Questions');
		$query = $questions->query();
		$query->update()
			->set($query->newExpr('hits = hits + 1'))
			->where(['id' => $id])
			->execute();

        $this->set(compact('question'));
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
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Questions']);
			}
		});
        $question = $this->Questions->newEmptyEntity();
        if ($this->request->is('post')) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
			 $session = $this->request->getSession(); //get session data: user slug
			 $question->user_id = $session->read('user_id');
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been saved.'));

               
                return $this->redirect(['controller' => 'users', 'action' => 'mysurvey', $session->read('slug')]);
            }
            $this->Flash->error(__('The question could not be saved. Please, try again.'));
        }
        $users = $this->Questions->Users->find('list', ['limit' => 200]);
        $this->set(compact('question', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $question = $this->Questions->get($id, [
            'contain' => [],
        ]);
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Edit']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Questions']);
			}
		});
        if ($this->request->is(['patch', 'post', 'put'])) {
            $question = $this->Questions->patchEntity($question, $this->request->getData());
            if ($this->Questions->save($question)) {
                $this->Flash->success(__('The question has been updated.'));
					$session = $this->request->getSession(); //get session data: user slug
                return $this->redirect(['controller' => 'users', 'action' => 'mysurvey', $session->read('slug')]);
            }
            $this->Flash->error(__('The question could not be update. Please, try again.'));
        }
        $users = $this->Questions->Users->find('list', ['limit' => 200]);
        $this->set(compact('question', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Question id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Delete']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Questions']);
			}
		});
		
		$questions = TableRegistry::get('Questions');
		$query = $questions->query();
		$query->update()
			->set(['disposed_by' => $this->Auth->user('id')])
			->where(['id' => $id])
			->execute();
		
        $this->request->allowMethod(['post', 'delete']);
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('The question has been deleted.'));
        } else {
            $this->Flash->error(__('The question could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function deleteAll()
	{
		$this->request->allowMethod(['post','delete']);
		$ids = $this->request->getData('ids');
		
		if($this->Questions->deleteAll(['Questions.id IN'=>$ids])){
			$this->Flash->success(__('The selected question has been deleted.'));
		} else {
			$this->Flash->error(__('Please select question to delete'));
		}
			return $this->redirect(['action' => 'index']);
	}
	
	public function change()
	{
		if($this->getRequest()->is('post')) {
			$check = $this->request->getData('check');
			$status = $this->request->getData('status');
			
			$this->Questions->updateAll(
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
		$question = $this->Questions->get($id);
		$this->viewBuilder()->setClassName('CakePdf.pdf');
		$this->viewBuilder()->setOption(
			'pdfConfig',
			[
				'orientation' => 'portrait',
				'download' => true, // This can be omitted if "filename" is specified.
				'filename' => 'question_' . $id . '.pdf' //// This can be omitted if you want file name based on URL.
			]
		);
		$this->set('question', $question);
	}

	
	public function csv()
	{
		$this->response = $this->response->withDownload('questions_list.csv');
		$questions = $this->Questions->find();
		$_serialize = 'questions';
		//$_header = ['ID', 'status', 'Created', 'Modified']; //include specific header
		//$_extract = ['id', 'status', 'created', 'modified']; //include specific data

		$this->viewBuilder()->setClassName('CsvView.Csv');
		$this->set(compact('questions', '_serialize')); //include the _header and _extract ifany
	}
	
	public function search()
	{
		$this->paginate['maxLimit'] = 999;

		$questions = $this->paginate($this->Questions->find('search', ['search' => $this->request->getQuery()]));
		$this->set('count_search_result', $this->Questions->find('search', ['search' => $this->request->getQuery()])->count());

		$this->set(compact('questions'));
		$this->set('_serialize', ['questions']);
	}
	
	public function retentionList()
    {
		$this->set('questions', $this->paginate($this->Questions->find('all')
				->where([
					'Questions.rm_retention <=' => date('Y-m-d'),
					'Questions.status' => 1,
					])
		));	
		$this->set('count_find_result', $this->Questions->find()
				->where(['status' => '1', 'rm_retention <=' => date('Y-m-d'),])->count());
    }
	
	public function transferArchived($id=null)
	{
		$this->request->allowMethod(['post']);
		$question = $this->Questions->get($id);
		$updateData = [
				'status' => 2, //archived
				'rm_act_on' => date("Y-m-d H:i:s"),
				'rm_act_by' => $this->Auth->user('id')				
			]; 
			$this->Questions->query()->update()->set($updateData)->where(['id' => $question['id']])->execute();
			$this->Flash->success(__('The question has been transfer to archived.'));
		return $this->redirect($this->referer());
	}
	
	public function transferDisposed($id=null)
	{
		$this->request->allowMethod(['post']);
		$question = $this->Questions->get($id);
		$updateData = [
				'status' => 3, //disposed
				'rm_act_on' => date("Y-m-d H:i:s"),
				'rm_act_by' => $this->Auth->user('id')				
			]; 
			$this->Questions->query()->update()->set($updateData)->where(['id' => $question['id']])->execute();
			$this->Flash->success(__('The question has been disposed.'));
		return $this->redirect($this->referer());
	}
	
	public function recordActive($id=null,$status)
	{
		$questions = TableRegistry::get('Questions');
		$query = $questions->query();
		$query->update()
			->set($query->newExpr('status = 1'))
			->where(['id' => $id])
			->execute();
			
		return $this->redirect($this->referer());
	}
	
	public function recordInactive($id=null,$status)
	{
		$questions = TableRegistry::get('Questions');
		$query = $questions->query();
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
        $questions = $this->paginate($this->Questions);
		
		$this->set('total', $this->Questions->find()->count());
		$this->set('total_status_0', $this->Questions->find()->where(['status' => '0'])->count());
		$this->set('total_status_1', $this->Questions->find()->where(['status' => '1'])->count());
		$this->set('total_status_2', $this->Questions->find()->where(['status' => '2'])->count());
		$this->set('total_status_3', $this->Questions->find()->where(['status' => '3'])->count());
//Current year count
		$this->set('total_current_year', $this->Questions->find()
		->where([
				'YEAR(Questions.created)' => date('Y')
		])->count());
		
		$this->set('q1', $this->Questions->find()
			->where([
				'MONTH(Questions.created) >=' => date('1'),
				'MONTH(Questions.created) <=' => date('6'),
				'YEAR(Questions.created)' => date('Y')
			])->count());

		$this->set('q2', $this->Questions->find()
			->where([
				'MONTH(Questions.created) >=' => date('7'),
				'MONTH(Questions.created) <=' => date('12'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
	
		$this->set('jan', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('1'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('feb', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('2'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('mar', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('3'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('apr', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('4'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('may', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('5'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('jun', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('6'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('jul', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('7'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('aug', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('8'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('sep', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('9'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('oct', $this->Questions->find()
			->where(
				['MONTH(Questions.created)' => date('10'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('nov', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('11'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
		$this->set('dec', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('12'),
				'YEAR(Questions.created)' => date('Y')
			])->count());
//-1 year count	
		$this->set('total_1', $this->Questions->find()
		->where([
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
		])->count());
		
		$this->set('q1_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created) >=' => date('1'),
				'MONTH(Questions.created) <=' => date('6'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());

		$this->set('q2_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created) >=' => date('7'),
				'MONTH(Questions.created) <=' => date('12'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
			
		$this->set('jan_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('1'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('feb_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('2'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('mar_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('3'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('apr_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('4'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('may_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('5'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('jun_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('6'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('jul_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('7'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('aug_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('8'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('sep_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('9'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('oct_1', $this->Questions->find()
			->where(
				['MONTH(Questions.created)' => date('10'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('nov_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('11'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('dec_1', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('12'),
				'YEAR(Questions.created)' => date('Y',strtotime('-1 year'))
			])->count());
//-2 year count	
				$this->set('total_2', $this->Questions->find()
		->where([
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
		])->count());
		
		$this->set('q1_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created) >=' => date('1'),
				'MONTH(Questions.created) <=' => date('6'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());

		$this->set('q2_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created) >=' => date('7'),
				'MONTH(Questions.created) <=' => date('12'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
			
		$this->set('jan_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('1'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('feb_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('2'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('mar_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('3'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('apr_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('4'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('may_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('5'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('jun_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('6'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('jul_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('7'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('aug_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('8'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('sep_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('9'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('oct_2', $this->Questions->find()
			->where(
				['MONTH(Questions.created)' => date('10'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('nov_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('11'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('dec_2', $this->Questions->find()
			->where([
				'MONTH(Questions.created)' => date('12'),
				'YEAR(Questions.created)' => date('Y',strtotime('-2 year'))
			])->count());
		
        $this->set(compact('questions'));
    }
}
