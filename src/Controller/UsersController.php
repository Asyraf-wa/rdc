<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\TableRegistry;
use AuditStash\Meta\ApplicationMetadata;
use Cake\Event\EventManager;

//use Cake\Event\EventInterface;

use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Security;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

	public function initialize(): void
	{
		parent::initialize();
		
		$this->Authentication->addUnauthenticatedActions(['login','dashboard','mysurvey','pin']);

		$this->loadComponent('Search.Search', [
			'actions' => ['search'],
		]);
	}
	
/* public function beforeFilter(EventInterface $event)
{
    //$this->RequestHandler->setConfig('viewClassMap', ['rss' => 'MyRssView']);
} */

//use Cake\Event\EventInterface;

	
public function login()
{
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    if ($result->isValid()) {
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Users',
            'action' => 'index',
        ]);

        return $this->redirect($redirect);
    }
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error(__('Invalid username or password'));
    }
}

public function logout()
{
    $result = $this->Authentication->getResult();
    if ($result->isValid()) {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
	
    public function invite()
    {
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Invite']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Users']);
			}
		});
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
			$user->pin = rand(1000,9999);
			$receiver = $this->request->getData('email');
			$pin = $user->pin;
			
            if ($this->Users->save($user)) {
				$slug = $user->slug;
//mailer
				$mailer = new Mailer();
				$mailer->setTransport('default'); //get email config
				$mailer->setViewVars([
					'pin' => $pin,
					'slug' => $slug,
					]);
				$mailer->setFrom('noreply@codethepixel.com')
					->setTo($receiver) //array formatted
					->setEmailFormat('html')
					->setSubject('Invitation to Re-CRUD Case Study')
					->viewBuilder()
						->setTemplate('invitation');
				$mailer->deliver();
                $this->Flash->success(__('The respondent has been invited.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
	
    public function pin($slug = null)
    {
        $user = $this->Users
			->findBySlug($slug)
			//->contain(['UserGroups', 'Announcements', 'Contacts', 'UserDetails'])
			->firstOrFail();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData(),['validate' => 'pin']);
			$pin = $user->pin;
			$pin2 = $this->request->getData('pin2');
			if ($pin2 == $pin) {
				$session = $this->getRequest()->getSession(); //get session
				$session->write('pin2', $this->request->getData('pin2')); //write pin value to session
				$session->write('slug', $user->slug); //write pin value to session
				return $this->redirect(['action' => 'mysurvey', $user->slug]);
			}
			$this->Flash->error(__('Wrong Pin code. Please try again.'));
        }
        $this->set(compact('user'));
    }
	
    public function mysurvey($slug = null)
    {
		
		//$user = $this->Users->get($id, [
        //    'contain' => ['Questions'],
        //]);
		
		$user = $this->Users
			->findBySlug($slug)
			->contain(['Questions','Sus'])
			->firstOrFail();
		
		$users = TableRegistry::get('Users');
		$query = $users->query();
		$query->update()
			->set($query->newExpr('hits = hits + 1'))
			->where(['slug' => $slug])
			->execute();
			
//count
		$this->loadModel('Questions');
		$total_question = $this->Questions->find()->where(['Questions.user_id' => $user->id])->count();
		
		$this->loadModel('Sus');
		$total_sus = $this->Sus->find()->where(['Sus.user_id' => $user->id])->count();
			
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Thank you. Your demographic information has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The user could not be update. Please, try again.'));
        }
        $this->set(compact('user','total_question','total_sus'));
    }
	
    public function mysurveyLock($slug = null)
    {
		$user = $this->Users
			->findBySlug($slug)
			->contain(['Questions','Sus'])
			->firstOrFail();
		
		$users = TableRegistry::get('Users');
		$query = $users->query();
		$query->update()
			->set($query->newExpr('hits = hits + 1'))
			->where(['slug' => $slug])
			->execute();
			
//count
		$this->loadModel('Questions');
		$total_question = $this->Questions->find()->where(['Questions.user_id' => $user->id])->count();
		
		$this->loadModel('Sus');
		$total_sus = $this->Sus->find()->where(['Sus.user_id' => $user->id])->count();
			
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Thank you. Your demographic information has been saved.'));

                //return $this->redirect(['action' => 'index']);
            }
            //$this->Flash->error(__('The user could not be update. Please, try again.'));
        }
        $this->set(compact('user','total_question','total_sus'));
    }
	
    public function index()
    {
		
		$this->set('users', $this->paginate($this->Users->find('all')
				->where(['Users.status' => 1]) //1 = Active
				//->order(['Users.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->Users->find()->where(['status' => '1'])->count());
    }
	
    public function dashboard()
    {
		
		$this->set('users', $this->paginate($this->Users->find('all')
				//->where(['Users.status' => 1]) //1 = Active
				//->order(['Users.created' => 'desc']) 
		));	
		//$this->set('count_find_result', $this->Users->find()->where(['status' => '1'])->count());
    }
	
    public function indexArchived()
    {
		$this->set('users', $this->paginate($this->Users->find('all')
				->where(['Users.status' => 2]) //2 = Archived
				//->order(['Users.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->Users->find()->where(['status' => '2'])->count());
    }
	
    public function indexDisposed()
    {
		$this->set('users', $this->paginate($this->Users->find('all')
				->where(['Users.status' => 3]) //3 = Disposed
				//->order(['Users.created' => 'desc']) 
		));	
		$this->set('count_find_result', $this->Users->find()->where(['status' => '3'])->count());
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Questions'],
        ]);
		
		$users = TableRegistry::get('Users');
		$query = $users->query();
		$query->update()
			->set($query->newExpr('hits = hits + 1'))
			->where(['id' => $id])
			->execute();

        $this->set(compact('user'));
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
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Users']);
			}
		});
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Edit']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Users']);
			}
		});
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be update. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
		EventManager::instance()->on('AuditStash.beforeLog', function ($event, array $logs) {
			foreach ($logs as $log) {
				$log->setMetaInfo($log->getMetaInfo() + ['a_name' => 'Delete']);
				$log->setMetaInfo($log->getMetaInfo() + ['c_name' => 'Users']);
			}
		});
		
		$users = TableRegistry::get('Users');
		$query = $users->query();
		$query->update()
			->set(['disposed_by' => $this->Auth->user('id')])
			->where(['id' => $id])
			->execute();
		
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
	
	public function deleteAll()
	{
		$this->request->allowMethod(['post','delete']);
		$ids = $this->request->getData('ids');
		
		if($this->Users->deleteAll(['Users.id IN'=>$ids])){
			$this->Flash->success(__('The selected user has been deleted.'));
		} else {
			$this->Flash->error(__('Please select user to delete'));
		}
			return $this->redirect(['action' => 'index']);
	}
	
	public function change()
	{
		if($this->getRequest()->is('post')) {
			$check = $this->request->getData('check');
			$status = $this->request->getData('status');
			
			$this->Users->updateAll(
				['status ' => $status ],
				['id IN' => $check]
			);
			$this->Flash->success(__('The selected action has been succesfully executed'));
			return $this->redirect($this->referer());
		}
	}
	
	public function pdf($id = null)
	{
		$user = $this->Users->get($id, [
            'contain' => ['Questions','Sus'],
        ]);
		
		$this->viewBuilder()->enableAutoLayout(false); 
		//$user = $this->Users->get($id);
		$this->viewBuilder()->setClassName('CakePdf.Pdf');
		$this->viewBuilder()->setOption(
			'pdfConfig',
			[
				'orientation' => 'portrait',
				'download' => true, // This can be omitted if "filename" is specified.
				'filename' => 'user_' . $id . '.pdf' //// This can be omitted if you want file name based on URL.
			]
		);
		$this->set('user', $user);
	}

	
	public function csv()
	{
		$this->response = $this->response->withDownload('users_list.csv');
		$users = $this->Users->find();
		$_serialize = 'users';
		//$_header = ['ID', 'status', 'Created', 'Modified']; //include specific header
		//$_extract = ['id', 'status', 'created', 'modified']; //include specific data

		$this->viewBuilder()->setClassName('CsvView.Csv');
		$this->set(compact('users', '_serialize')); //include the _header and _extract ifany
	}
	
	public function search()
	{
		$this->paginate['maxLimit'] = 999;

		$users = $this->paginate($this->Users->find('search', ['search' => $this->request->getQuery()]));
		$this->set('count_search_result', $this->Users->find('search', ['search' => $this->request->getQuery()])->count());

		$this->set(compact('users'));
		$this->set('_serialize', ['users']);
	}
	
	public function retentionList()
    {
		$this->set('users', $this->paginate($this->Users->find('all')
				->where([
					'Users.rm_retention <=' => date('Y-m-d'),
					'Users.status' => 1,
					])
		));	
		$this->set('count_find_result', $this->Users->find()
				->where(['status' => '1', 'rm_retention <=' => date('Y-m-d'),])->count());
    }
	
	public function transferArchived($id=null)
	{
		$this->request->allowMethod(['post']);
		$user = $this->Users->get($id);
		$updateData = [
				'status' => 2, //archived
				'rm_act_on' => date("Y-m-d H:i:s"),
				'rm_act_by' => $this->Auth->user('id')				
			]; 
			$this->Users->query()->update()->set($updateData)->where(['id' => $user['id']])->execute();
			$this->Flash->success(__('The user has been transfer to archived.'));
		return $this->redirect($this->referer());
	}
	
	public function transferDisposed($id=null)
	{
		$this->request->allowMethod(['post']);
		$user = $this->Users->get($id);
		$updateData = [
				'status' => 3, //disposed
				'rm_act_on' => date("Y-m-d H:i:s"),
				'rm_act_by' => $this->Auth->user('id')				
			]; 
			$this->Users->query()->update()->set($updateData)->where(['id' => $user['id']])->execute();
			$this->Flash->success(__('The user has been disposed.'));
		return $this->redirect($this->referer());
	}
	
	public function recordActive($id=null,$status)
	{
		$users = TableRegistry::get('Users');
		$query = $users->query();
		$query->update()
			->set($query->newExpr('status = 1'))
			->where(['id' => $id])
			->execute();
			
		return $this->redirect($this->referer());
	}
	
	public function recordInactive($id=null,$status)
	{
		$users = TableRegistry::get('Users');
		$query = $users->query();
		$query->update()
			->set($query->newExpr('status = 2'))
			->where(['id' => $id])
			->execute();
			
		return $this->redirect($this->referer());
	}
	
    public function report()
    {
        $users = $this->paginate($this->Users);
		
		$this->set('total', $this->Users->find()->count());
		$this->set('total_status_0', $this->Users->find()->where(['status' => '0'])->count());
		$this->set('total_status_1', $this->Users->find()->where(['status' => '1'])->count());
		$this->set('total_status_2', $this->Users->find()->where(['status' => '2'])->count());
		$this->set('total_status_3', $this->Users->find()->where(['status' => '3'])->count());
//Current year count
		$this->set('total_current_year', $this->Users->find()
		->where([
				'YEAR(Users.created)' => date('Y')
		])->count());
		
		$this->set('q1', $this->Users->find()
			->where([
				'MONTH(Users.created) >=' => date('1'),
				'MONTH(Users.created) <=' => date('6'),
				'YEAR(Users.created)' => date('Y')
			])->count());

		$this->set('q2', $this->Users->find()
			->where([
				'MONTH(Users.created) >=' => date('7'),
				'MONTH(Users.created) <=' => date('12'),
				'YEAR(Users.created)' => date('Y')
			])->count());
	
		$this->set('jan', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('1'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('feb', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('2'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('mar', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('3'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('apr', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('4'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('may', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('5'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('jun', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('6'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('jul', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('7'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('aug', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('8'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('sep', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('9'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('oct', $this->Users->find()
			->where(
				['MONTH(Users.created)' => date('10'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('nov', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('11'),
				'YEAR(Users.created)' => date('Y')
			])->count());
		$this->set('dec', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('12'),
				'YEAR(Users.created)' => date('Y')
			])->count());
//-1 year count	
		$this->set('total_1', $this->Users->find()
		->where([
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
		])->count());
		
		$this->set('q1_1', $this->Users->find()
			->where([
				'MONTH(Users.created) >=' => date('1'),
				'MONTH(Users.created) <=' => date('6'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());

		$this->set('q2_1', $this->Users->find()
			->where([
				'MONTH(Users.created) >=' => date('7'),
				'MONTH(Users.created) <=' => date('12'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
			
		$this->set('jan_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('1'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('feb_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('2'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('mar_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('3'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('apr_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('4'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('may_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('5'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('jun_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('6'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('jul_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('7'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('aug_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('8'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('sep_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('9'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('oct_1', $this->Users->find()
			->where(
				['MONTH(Users.created)' => date('10'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('nov_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('11'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
		$this->set('dec_1', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('12'),
				'YEAR(Users.created)' => date('Y',strtotime('-1 year'))
			])->count());
//-2 year count	
				$this->set('total_2', $this->Users->find()
		->where([
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
		])->count());
		
		$this->set('q1_2', $this->Users->find()
			->where([
				'MONTH(Users.created) >=' => date('1'),
				'MONTH(Users.created) <=' => date('6'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());

		$this->set('q2_2', $this->Users->find()
			->where([
				'MONTH(Users.created) >=' => date('7'),
				'MONTH(Users.created) <=' => date('12'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
			
		$this->set('jan_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('1'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('feb_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('2'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('mar_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('3'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('apr_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('4'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('may_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('5'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('jun_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('6'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('jul_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('7'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('aug_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('8'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('sep_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('9'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('oct_2', $this->Users->find()
			->where(
				['MONTH(Users.created)' => date('10'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('nov_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('11'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		$this->set('dec_2', $this->Users->find()
			->where([
				'MONTH(Users.created)' => date('12'),
				'YEAR(Users.created)' => date('Y',strtotime('-2 year'))
			])->count());
		
        $this->set(compact('users'));
    }
}
