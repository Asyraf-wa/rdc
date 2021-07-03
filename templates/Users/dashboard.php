<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;
use Cake\Routing\Router;
//use MyLibraryBaseClass;

require_once(ROOT . DS . 'vendor' . DS  . 'simple_html_dom' . DS . 'simple_html_dom.php');
?>

<div class="row">
	<div class="col-md-8">
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">ReCRUD Data Collection System (ReDC)</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body justify">
Welcome to ReDC. ReDC is the web application that manage the evaluation for Re-CRUD case study. Please proceed to key in your PIN (provided in the invitation email).
<br><br>
<style>
  .fa-stack { font-size: 3em; }
  i { vertical-align: middle; }
</style>
<div class="row" align="center">
  <div class="col-md-4">
<span class="fa-stack" style="vertical-align: top;">
  <i class="far fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x">1</strong>
</span>
<br>PIN<br>
Enter your unique PIN
  </div>
  <div class="col-md-4">
<span class="fa-stack" style="vertical-align: top;">
  <i class="far fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x">2</strong>
</span>
<br>Case Study<br>
Execute EDMS case study
  </div>
  <div class="col-md-4">
<span class="fa-stack" style="vertical-align: top;">
  <i class="far fa-circle fa-stack-2x"></i>
  <strong class="fa-stack-1x">3</strong>
</span>
<br>Evaluate<br>
Complete the evaluation form
  </div>
</div>
<hr>
<center>
<?= $this->Html->image('process.jpg', ['alt' => 'reCRUD Evaluation Procedure', 'wdith' => '100%', 'height' => '100%', 'class' => '', 'style' => '']); ?>
</center> 	
			</div>
		</div>
		

		
		
		
		
		
	</div>
	<div class="col-md-4">
	
		<div class="card2">
			<div class="header">
				<div class="panel_card2_title">Scan for mobile access</div>
				<div class="panel_card2_subtitle"><?= $organization_name; ?></div>
			</div>
			<div class="body">
			
<div id="qr" align="center"></div>
<script type="text/javascript">
    const qrCode = new QRCodeStyling({
        width: 100,
        height: 100,
		margin: 0,
        //type: "svg",
        data: "<?php echo $this->request->getUri(); ?>",
        dotsOptions: {
            //color: "#4267b2",
            type: "dots"
        },
		cornersSquareOptions: {
			type: "dots",
			color: "#007bff",
		},
		cornersDotOptions: {
			type: "dots"
		},
        backgroundOptions: {
            //color: "#ffffff",
        },
        imageOptions: {
            crossOrigin: "anonymous",
            margin: 20
        }
    });

    qrCode.append(document.getElementById("qr"));
    //qrCode.download({ name: "qr", extension: "png" });
</script>
			</div>
		</div>	
	
<?php
//Malaysia Covid-19 Data by DataFlow Kit
$dataMalaysia = file_get_contents('https://covid-19.dataflowkit.com/v1/Malaysia');
$decodedMalaysia = json_decode($dataMalaysia);

//World Covid-19 Data by DataFlow Kit
$dataWorld = file_get_contents('https://covid-19.dataflowkit.com/v1/world');
$decodedWorld = json_decode($dataWorld);
?>
		<div class="card2">
			<div class="header bg-red">
<div class="row">
	<div class="col-md-10">
				<div class="panel_card2_title"><?= $decodedMalaysia->Country_text; ?> Covid-19 Tracker | RO: 
<?php
$html = file_get_html('http://covid-19.moh.gov.my/terkini');

echo $html->find('strong span', 0)->plaintext;
?>
				</div>
				<div class="panel_card2_subtitle_wht">Last Updated on: 
					<?php
					$dateTime = new DateTime($decodedMalaysia->{'Last Update'});
					echo $dateTime->format('d F Y (l) - g:i a');
					echo ' GMT';
					?>
				</div>
	</div>
	<div class="col-md-2 text-center">
	<?= $this->Html->image('c19.png', ['alt' => 'virus', 'class' => '', 'style' => 'opacity: .9', 'width' => '48px', 'height' => '48px']); ?>
	</div>
</div>

			</div>
			<div class="body">
<div class="row">
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?php if ($decodedMalaysia->{'New Cases_text'} == NULL){
			echo '-';
		}else
			echo $decodedMalaysia->{'New Cases_text'};
		?>
		</div>
		<div class="panel_card2_subtitle">New Case</div>
	</div>
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?php if ($decodedMalaysia->{'New Deaths_text'} == NULL){
			echo '-';
		}else
			echo $decodedMalaysia->{'New Deaths_text'};
		?>
		</div>
		<div class="panel_card2_subtitle">New Death</div>
	</div>
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?= $decodedMalaysia->{'Active Cases_text'}; ?>
		</div>
		<div class="panel_card2_subtitle">Active Case</div>
	</div>
</div>
	<br>
<div class="row">
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?= $decodedMalaysia->{'Total Recovered_text'}; ?>
		</div>
		<div class="panel_card2_subtitle">Total Recovered</div>
	</div>
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?= $decodedMalaysia->{'Total Cases_text'}; ?>
		</div>
		<div class="panel_card2_subtitle">Total Case</div>
	</div>
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?= $decodedMalaysia->{'Total Deaths_text'}; ?>
		</div>
		<div class="panel_card2_subtitle">Total Death</div>
	</div>
</div>
	<hr>
<div class="row">
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?= $decodedWorld->{'Total Recovered_text'}; ?>
		</div>
		<div class="panel_card2_subtitle">Worldwide Total Recovered</div>
	</div>
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?= $decodedWorld->{'Total Cases_text'}; ?>
		</div>
		<div class="panel_card2_subtitle">Worldwide Total Case</div>
	</div>
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?= $decodedWorld->{'Total Deaths_text'}; ?>
		</div>
		<div class="panel_card2_subtitle">Worldwide Total Death</div>
	</div>
</div>
	<hr>		
<div class="panel_card2_subtitle text-center">Data source from <a href="https://covid-19.dataflowkit.com/v1" target="blank">Dataflow Kit</a> #stayHome #staySafe</div>

			</div>
		</div>
	


<?php

//Malaysia Covid-19 Vaccination Data by OWID
$rows = file('https://raw.githubusercontent.com/owid/covid-19-data/master/public/data/vaccinations/country_data/Malaysia.csv');
$last_row = array_pop($rows);
$dataVaccine = str_getcsv($last_row);

for($i = 1; $i < count($dataVaccine); $i++) {
    $line = explode(',', $dataVaccine[$i]);
    for($j = 0; $j < count($line); $j++) {
        $array[$i][$j + 1] = $line[$j];
    }
}
//echo '<pre>';
//print_r($array);
//echo '</pre>';
?>
		<div class="card2">
			<div class="header bg-red">
<div class="row">
	<div class="col-md-10">
				<div class="panel_card2_title">Malaysia Covid-19 Vaccine Tracker</div>
				<div class="panel_card2_subtitle_wht">Last Updated on: 
					<?php
					$dateTime = new DateTime($array[1][1]);
					echo $dateTime->format('d F Y (l)');
					?>
				</div>
	</div>
	<div class="col-md-2 text-center">
	<?= $this->Html->image('c19_vaccine.png', ['alt' => 'virus', 'class' => '', 'style' => 'opacity: .9', 'width' => '48px', 'height' => '48px']); ?>
	</div>
</div>

			</div>
			<div class="body">
<div class="row">
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?php echo number_format($array[5][1], 0, '.', ','); ?>
		</div>
		<div class="panel_card2_subtitle">People Vaccinated</div>
	</div>
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?php echo number_format($array[6][1], 0, '.', ','); ?>
		</div>
		<div class="panel_card2_subtitle">Fully Vaccinated</div>
	</div>
	<div class="col-md-4 text-center">
		<div class="panel_card2_title">
		<?php echo number_format($array[4][1], 0, '.', ','); ?>
		</div>
		<div class="panel_card2_subtitle">Total Vaccinations</div>
	</div>
</div>
	<hr>		
<div class="panel_card2_subtitle text-center">Data source from <a href="https://github.com/owid/covid-19-data/blob/master/public/data/vaccinations/country_data/Malaysia.csv" target="blank">OWID</a> #stayHome #staySafe</div>
			</div>
		</div>



	
	
		
	</div>
</div>


