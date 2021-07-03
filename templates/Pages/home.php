<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

//$this->disableAutoLayout();

$checkConnection = function (string $name) {
    $error = null;
    $connected = false;
    try {
        $connection = ConnectionManager::get($name);
        $connected = $connection->connect();
    } catch (Exception $connectionError) {
        $error = $connectionError->getMessage();
        if (method_exists($connectionError, 'getAttributes')) {
            $attributes = $connectionError->getAttributes();
            if (isset($attributes['message'])) {
                $error .= '<br />' . $attributes['message'];
            }
        }
    }

    return compact('connected', 'error');
};

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<div class="row">
	<div class="col-md-8">
		
		
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Re-CRUD Features</div>
				<div class="panel_card2_subtitle">Code The Pixel</div>
			</div>
			<div class="body justify">
Re-CRUD is designed with fully integrated electronic record management features which promotes and enable born-digital data to be appropriately managed based on the electronic record management method. The features can be highlighted as follows:
<br><br>
<table class="table table-hover table-borderless">
	<tr>
		<td>Inventory</td>
		<td>:</td>
		<td>a descriptive listing of each record series or system, together with an indication of the location, access and other pertinent data</td>
	</tr>
	<tr>
		<td>Retention</td>
		<td>:</td>
		<td>list how long each record series must be kept (the retention period), when the retention period starts (the cut-off), and the proper way to dispose of the record once retention is met (the disposition method)</td>
	</tr>
	<tr>
		<td>Appraisal</td>
		<td>:</td>
		<td>the process of determining the archival value and ultimate disposition of records. Appraisal decisions are informed by several factors including the historical, legal, operational and financial value of the records</td>
	</tr>
	<tr>
		<td>Disposition</td>
		<td>:</td>
		<td>the process of destruction of records or the transfer of records to another entity (most commonly an Archives) for permanent preservation</td>
	</tr>
	<tr>
		<td>RBAC</td>
		<td>:</td>
		<td>provides a role-based access control mechanism in electronic record management application to offer protection from unauthorized access. Authenticated users with different roles have different authorization or access to the records</td>
	</tr>
	<tr>
		<td>Search</td>
		<td>:</td>
		<td>Enables the user to locate and retrieve record based on specific metadata, word or phrases. It is a vital function in any WA as it enables fast data retrieval via the search parameter</td>
	</tr>
	<tr>
		<td>Audit Trail</td>
		<td>:</td>
		<td>provides log tracking for any changes to the electronic records to ensure that validity and integrity</td>
	</tr>
	<tr>
		<td>Archiving</td>
		<td>:</td>
		<td>transfer and stored the valuable records into a repository which make it non-active but still accessible through the system. It also helps to reduce the cluttered old and non-active record from the system</td>
	</tr>
	<tr>
		<td>Transfer and Sharing</td>
		<td>:</td>
		<td>provides the ability to transfer the record (internal to external or external to internal) in a single data or bulk data. There are several suggested format such as CSV, XML and JSON. Using QR code for sharing purpose</td>
	</tr>
	<tr>
		<td>Reporting</td>
		<td>:</td>
		<td>provides sharing features by sending links to other parties (public access or restricted access is depending on the policy). Reporting provides a summary related to the current status of records such as total records, active, inactive, the total required appraisal attention and others</td>
	</tr>
	<tr>
		<td>Others</td>
		<td>:</td>
		<td>The used of Bootstrap as the main UI template, ChartJS to visualize the data in the report page, select2 to customize select options, DOMPDF to render PDF, jQuery a lightweight javascript library, Phinx for database migration and Summernote for WYSIWYG editor</td>
	</tr>
</table>
			</div>
		</div>
		
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Instruction to Developer</div>
				<div class="panel_card2_subtitle">Code The Pixel</div>
			</div>
			<div class="body">
<ol>
	<li>
	<b>Framework Configuration</b>
	<br>
	Navigate to <code>.../config/app_local.php</code> and configure your data source connection.
	<br><br>
	</li>
	<li>
	<b>Database Migration</b>
	<br>
	Re-CRUD required <code>audit_log</code> table to stored the electronic record audit trail.
		<ol type="a">
			<li>Run console (Command Prompt/ Windows Powershell/ VS console etc.)</li>
			<li>Change path to the targeted source folder eg: <code>cd c:/xampp/htdocs/recrud</code></li>
			<li>Execute the following command: <code>bin/cake migrations migrate -p AuditStash -t 20171018185609</code></li>
			<li>Check your database eg: <code>127.0.0.1/phpmyadmin/</code>. The audit_log table should has been populated.</li>
		</ol>
	<br>	
	</li>
	<li>
	<b>Database Entity Requirements</b>
	<br>
	Re-CRUD is designed to maintain the born-electronic data using electronic record management specification. Therefore, each of the table required record management attributes to ensure the record can be maintain appropriately. the following attributes is required:
		<ol type="a">
			<li><code>status</code> - to identify the record status [0 - inactive; 1 - active; 2 - archived; 3 - disposed]</li>
			<li><code>hits</code> - record the views</li>
			<li><code>rm_retention</code> - retention date for each of the generated records</li>
			<li><code>rm_act_on</code> - action taken (archived/disposed) date</li>
			<li><code>rm_act_by</code> - action taken (archived/disposed) responsible person</li>
		</ol>
	<br>
	</li>
	<li>
	<b>Console Command</b>
		<ol type="a">
			<li>Run console (Command Prompt/ Windows Powershell/ VS console etc.)</li>
			<li>Change path to the targeted source folder eg: <code>cd c:/xampp/htdocs/recrud</code></li>
			<li>Execute the following command: <code>bin/cake bake all [YourTableName]</code></li>
			<li>Navigate to 127.0.0.1/recrud/[YourTableName]. This will render the generated re-CRUD output.</li>
		</ol>
	<br>
	</li>
	<li>
	<b>Re-CRUD Output</b>
		<ol type="a">
			<li><code>.../src/Model/Table/TableName.php</code> - Comprises relationship, bahaviour, validation etc.</li>
			<li><code>.../src/Model/Entity/TableName.php</code> - Comprises accessible field</li>
			<li><code>.../src/Controller/YourTableNameController.php</code> - comprises application logics</li>
			<li><code>.../templates/TableName/add.php</code> - form to capture data input</li>
			<li><code>.../templates/TableName/edit.php</code> - form to capture data editing</li>
			<li><code>.../templates/TableName/view.php</code> - rendered and view the respective records</li>
			<li><code>.../templates/TableName/index.php</code> - list all active records</li>
			<li><code>.../templates/TableName/index_archived.php</code> - list all archived records</li>
			<li><code>.../templates/TableName/index_disposed.php</code> - list all disposed records</li>
			<li><code>.../templates/TableName/retention_list.php</code> list all record that has expired retention date</li>
			<li><code>.../templates/TableName/report.php</code> - provides statistical reports</li>
			<li><code>.../templates/TableName/search.php</code> - search engine for specific table</li>
		</ol>
	<br>
	</li>
</ol>
			</div>
		</div>		
		
	</div>
	<div class="col-md-4">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Re-CRUD</div>
				<div class="panel_card2_subtitle">Code The Pixel</div>
			</div>
			<div class="body">
<table class="table table-sm table-borderless">
	<tr>
		<td>Repo</td>
		<td>:</td>
		<td>https://github.com/Asyraf-wa/reCRUD</td>
	</tr>
	<tr>
		<td>Version</td>
		<td>:</td>
		<td>1.0</td>
	</tr>
	<tr>
		<td>Core</td>
		<td>:</td>
		<td><?= Configure::version() ?></td>
	</tr>
	<tr>
		<td>Web</td>
		<td>:</td>
		<td>https://codethepixel.com</td>
	</tr>
</table>
			</div>
		</div>
		
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Useful Links</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">
<table class="table table-sm table-borderless">
	<tr>
		<td><i class="far fa-bookmark text-blue"></i> <?php echo $this->Html->link('Re-CRUD Repo - Re-CRUD repository and update release','https://github.com/Asyraf-wa', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-indigo"></i> <?php echo $this->Html->link('Code The Pixel - Re-CRUD tutorial','https://codethepixel.com', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-purple"></i> <?php echo $this->Html->link('GetBootstrap - Theme components','https://getbootstrap.com', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-pink"></i> <?php echo $this->Html->link('Font Awesome Icon - Icon collection','https://fontawesome.com', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-red"></i> <?php echo $this->Html->link('Feather Icon - Icon collection','https://feathericons.com', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-orange"></i> <?php echo $this->Html->link('Github - Codes repository','https://github.com', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-yellow"></i> <?php echo $this->Html->link('Composer - Dependecy manager','https://getcomposer.org/', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-green"></i> <?php echo $this->Html->link('ChartJS - Flexible charting library','https://www.chartjs.org/', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-teal"></i> <?php echo $this->Html->link('DataTables - Table features enhancement','https://datatables.net/', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-cyan"></i> <?php echo $this->Html->link('Google Fonts - Font library','https://fonts.google.com/', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-gray"></i> <?php echo $this->Html->link('Optimizilla - Image optimizer','https://imagecompressor.com/', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-primary"></i> <?php echo $this->Html->link('PHP - Official PHP references','https://www.php.net/manual/en/', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
	<tr>
		<td><i class="far fa-bookmark text-secondary"></i> <?php echo $this->Html->link('CakePHP - Web Application Framework','https://cakephp.org/', ['target'=>'_blank', 'class' => 'reference']); ?></td>
	</tr>
</table>
			</div>
		</div>
		
	</div>
</div>