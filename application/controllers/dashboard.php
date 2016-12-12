<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller{

    function __construct(){
		parent::__construct();
		$this->load->helper('file');
		$this->_is_logged_kolaboratzaile();
		$this->load->model('berba_model');
		$this->load->model('tag_model');
		$this->load->model('berben_tag_model');
		$this->load->model('testuak_model');
		$this->load->model('protagonista_model');
	}

	function index(){//$a='' parametro hau pasatzen nion baina ez dakit zertarako

		/*$a parametroa titulotzat ipintzen nuen baina ez dakit zertarako
		 * 	if($a==''){
		$data['title']= "Hiztegia kudeatzeko leihoa";
		}else{
		$data['title']= $a;
		}*/

		$data['title']= "Mahaigaina";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
		
		
		$rol = $this->session->userdata('rol');
		$data['active'] = 'dashboard';
		if($rol == 'administratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		}
		if($rol == 'kolaboratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/kolaboratzaile/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/kolaboratzaile/main_menu', $data, TRUE);
		}
		if($rol == 'kritiko'){
			$data['dropdown_menu'] = $this->load->view('dashboard/kritiko/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/kritiko/main_menu', $data, TRUE);
		}
		$data['ondarroako_berba_kop'] = $this->berba_model->count_tagdunak(5);//5 da tag id
		$data['itsasoko_berba_kop'] = $this->berba_model->count_tagdunak(1);//1 da tag id
		$data['berba_kop'] = $this->db->get('berba')->num_rows();
		$data['main_content'] = $this->load->view('dashboard/mahaigaina', $data, TRUE);
		
		$data['body'] = $this->load->view("dashboard/body", $data, TRUE);
			
		$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);

		$this->load->view("includes/plantilla", $data);
	}

	//berben atala

	function berba_delete($id){
		$this->_is_logged_administratzaile();
		$this->berba_model->delete($id);
		$this->berben_tag_model->delete_berbalotura($id);
		$this->berbak_updater();
	}

	function berba_inserter(){
		$rol = $this->session->userdata('rol');
		
		//segurtasun kontrola
		if($rol != 'administratzaile' && $rol != 'kolaboratzaile'){
			redirect('users/logout');
		}
		
		$data['title']= "Berbak sartzeko formularioa";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
			
		$data['active'] = 'berba_inserter';
		if($rol == 'administratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		}
		if($rol == 'kolaboratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/kolaboratzaile/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/kolaboratzaile/main_menu', $data, TRUE);
		}
		if($rol == 'kritiko'){
			$data['dropdown_menu'] = $this->load->view('dashboard/kritiko/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/kritiko/main_menu', $data, TRUE);
		}
		
		$data['tagak'] = $this->tag_model->tagak()->result();
		$data['main_content'] = $this->load->view('inserter/body', $data, TRUE);
		$data['body'] = $this->load->view("dashboard/body", $data, TRUE);
			
		$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);

		$this->load->view("includes/plantilla", $data);
	}

	function protagonista_inserter(){
		$rol = $this->session->userdata('rol');
		
		//segurtasun kontrola
		if($rol != 'administratzaile' && $rol != 'kolaboratzaile'){
			redirect('users/logout');
		}
		
		$data['title']= "Protagonistak sartzeko formularioa";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
			
		$data['active'] = 'protagonista_inserter';
		if($rol == 'administratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		}
		if($rol == 'kolaboratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/kolaboratzaile/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/kolaboratzaile/main_menu', $data, TRUE);
		}
		if($rol == 'kritiko'){
			$data['dropdown_menu'] = $this->load->view('dashboard/kritiko/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/kritiko/main_menu', $data, TRUE);
		}
		
		$data['tagak'] = $this->tag_model->tagak()->result();
		$data['main_content'] = $this->load->view('inserter/body_protagonista', $data, TRUE);
		$data['body'] = $this->load->view("dashboard/body", $data, TRUE);
			
		$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);

		$this->load->view("includes/plantilla", $data);
	}

	function protagonista_gorde(){
// 		echo($this->input->get('argazkia'));
		/*
		 $this->form_validation->set_rules('berba', 'Berba', 'trim|required|callback__berba_check');
		$this->form_validation->set_rules('letra', 'Letra', 'trim|required');
		$this->form_validation->set_rules('editor1', 'Definizioa', 'trim');
		* */
		//balidazioak
		$this->form_validation->set_rules('izena', 'Izena', 'trim|required');//[abizena1, abizena2, ezizena]//izen abizenak eta ezizena existitzen diren ez da balidatzen
		$this->form_validation->set_rules('abizena1', '1 abizena', 'trim');
		$this->form_validation->set_rules('abizena2', '2 abizena', 'trim');
		$this->form_validation->set_rules('ezizena', 'ezizena', 'trim');
		$this->form_validation->set_rules('jaiotze_data', 'jaiotze_data', 'trim');
		$this->form_validation->set_rules('argazkia', 'Argazkia', 'trim|callback__argazkia_check[' . str_replace(' ', '', $_FILES['argazkia']['name']) . ']');
		$this->form_validation->set_rules('editor1', 'Testua', 'trim');

		$this->form_validation->set_message('required', '%s falta da!!!!');
 		$this->form_validation->set_message('_argazkia_check', '%s izen horrekin existitzen da, aldatu izena %s-ri.');
//  		$this->form_validation->set_message('_protagonista_check', '%s izen horrekin sartuta dago datu basean, begiratu ea horrela den');

// 		print_r($_FILES);
// 		$ar = $this->input->post('file');
// 		if( $this->_argazkia_check($ar) == FALSE){
// 			echo('existitzen da ' . $ar . ' ' . strlen($ar));
// 		}else{
// 			echo('ez da existitzen ' . $ar . ' ' . strlen($ar));
// 		}
		if ($this->form_validation->run() == FALSE){// || $this->_argazkia_check($this->input->post('argazkia')) == FALSE
			$this->protagonista_inserter();
		}else{
				
			$filename= str_replace(' ', '', $_FILES['argazkia']['name']);
			$uploadfile ='argazkiak/' . $filename;
			
			$izena = utf8_encode($this->input->post('izena'));
			$abizena1 = utf8_encode($this->input->post('abizena1'));
			$abizena2 = utf8_encode($this->input->post('abizena2'));
			$ezizena = utf8_encode($this->input->post('ezizena'));
			$jaiotze_data = utf8_encode($this->input->post('jaiotze_data'));
			if($jaiotze_data==''){
				$jaiotze_data=null;
			}
			$argazkia = $filename; //utf8_encode($this->input->post('argazkia'));
			$testua = utf8_encode($this->input->post('editor1'));
			
			
			//hobetu daiteke argazkia altza edo ez, zergaitik gertatu den jakin behar eta egokiago jokatu
			if(strlen($filename) > 0 ){//argazkia aukeratu bada
				if (move_uploaded_file($_FILES['argazkia']['tmp_name'], $uploadfile)) {
					$this->protagonista_model->insert($izena, $abizena1, $abizena2, $ezizena, $jaiotze_data,  $argazkia, $testua);

					$this->index('Gordeta!');
				} else {
					$this->protagonista_inserter();
				}
			}else{//argazkirik aukeratu ez bada			
				$this->protagonista_model->insert($izena, $abizena1, $abizena2, $ezizena, $jaiotze_data,  $argazkia, $testua);
				
				$this->index('Gordeta!');
				
			}			
		}
	}
    
    function protagonista_delete($id){
		$this->_is_logged_administratzaile();
		$this->protagonista_model->delete($id);
		$this->protagonistak_updater();
	}

    function protagonistak_updater(){
    	$this->_is_logged_administratzaile();
		$data['title']="Protagonisten datuak aldatzeko  leihoa";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);

		//administratzaileak exekuta lezake soilik
		$rol = $this->session->userdata('rol');
		$data['active'] = 'protagonistak_updater';
		if($rol == 'administratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		}
		
		$data['protagonistak']= $this->protagonista_model->danak();
		$data['main_content'] = $this->load->view('updater/body_protagonista', $data, TRUE);
		$data['body'] = $this->load->view('dashboard/body', $data, TRUE);

		$data['footer']= $this->load->view('dashboard/footer', null, TRUE);

		$this->load->view("includes/plantilla", $data);
	}

	function berba_check_ajax(){
		if($this->input->is_ajax_request()){
			$berba =  $this->input->post('berba');
			if(trim($berba) == ""){
				echo false;
			}else{
				$balidacion = $this->_berba_check($berba);
				echo $balidacion;
			}
		}else{
			echo 'denegado';
		}
	}

	function _berba_check($berba){
		return $this->berba_model->berba_check($berba);
	}
	
	function _argazkia_check($file = 0,  $argazkia){
		//substr($argazkia, strlen($argazkia)-9, strlen($argazkia))
		return $this->protagonista_model->argazkia_check($argazkia);
// 		$data['izena'] = $argazkia;
// 		$this->load->view('dashboard/proba', $data);
	}
	
	function _protagonista_check($izena, $abizena1){//, $abizena1, $abizena2, $ezizena
		//substr($argazkia, strlen($argazkia)-9, strlen($argazkia))
		$data = array(
				'izena' => $izena,
				'abizena1'=> $abizena1
				);
// 		'abizena1' => $abizena1,
// 		'abizena2' => $abizena2,
// 		'ezizena' => $ezizena
		return $this->protagonista_model->protagonista_check($data);
		// 		$data['izena'] = $argazkia;
		// 		$this->load->view('dashboard/proba', $data);
	}
	
	function berba_updater($id){
		$this->_is_logged_administratzaile();
		$data['title']= "Berbak aldatzeko formularioa";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
			

	
		//administratzaileak exekuta lezake soilik
		$rol = $this->session->userdata('rol');
		$data['active'] = 'berbak_updater';
		if($rol == 'administratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		}
		
		$data['tagak'] = $this->tag_model->tagak()->result_array();
		$data['berbabat'] = $this->berba_model->get($id);
		$berbaren_tagak = $this->berben_tag_model->berben_tag($id)->result_array();
		$data['berbaren_tagak'] = $this->_tag_boolean($data['tagak'], $berbaren_tagak);
		//print_r($data['berbaren_tagak']);
		
		$data['main_content'] = $this->load->view("updater/update_body", $data, TRUE);
		$data['body'] = $this->load->view('dashboard/body', $data, TRUE);
			
		$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);
	
		$this->load->view("includes/plantilla", $data);
	}

	function berbak_updater(){
		$this->_is_logged_administratzaile();
		$data['title']="Berbak zuzentzeko edo aldatzeko formularioa";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);

		//administratzaileak exekuta lezake soilik
		$rol = $this->session->userdata('rol');
		$data['active'] = 'berbak_updater';
		if($rol == 'administratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		}
		
		$data['berbak']= $this->berba_model->danak();
// 		$data['berbak']= $this->berba_model->berbak(30,0);
		$data['main_content'] = $this->load->view('updater/body', $data, TRUE);
		$data['body'] = $this->load->view('dashboard/body', $data, TRUE);

		$data['footer']= $this->load->view('dashboard/footer', null, TRUE);

		$this->load->view("includes/plantilla", $data);
	}
	
	function berbak_updater_scroll($limit, $offset){
		$data['berbak']= $this->berba_model->berbak($limit,$offset);
		$this->load->view('updater/body_scroll', $data);
	}

	function laste_martxan(){
		//    $this->_is_logged_administratzaile();
		//$this->load->view("includes/laste_martxan", '');

		$this->_is_logged_administratzaile();
		$data['title']="Oharra!!!";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);


		$data['body'] = $this->load->view('includes/laste_martxan', '', TRUE);

		$data['footer']= $this->load->view('dashboard/footer', null, TRUE);

		$this->load->view("includes/plantilla", $data);
	}

	function _tag_boolean($tagak, $berbaren_tagak){
		$a = array();
		foreach ($tagak as $tag) {
			$a[$tag['name']]= $this->_in_arrays($tag['id'], $berbaren_tagak);
		};
		return $a;
	}

	function _in_arrays($tag_id, $berbaren_tagak){
		foreach ($berbaren_tagak as $berbaren_taga){
			if($berbaren_taga['tag_id']== $tag_id){
				return true;
			}
		}
		return false;
	}

	function aldaketa_gorde(){
		$this->form_validation->set_rules('berba', 'Berba', 'trim|required');
		$this->form_validation->set_rules('editor1', 'Definizioa', 'trim');

		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_message('required', '%s bete behar da.');//%s coge el nombre de campo

		if ($this->form_validation->run() == FALSE){
			$this->berba_updater($this->input->post('id'));
		}else{
			//gorde
			$berba_id= $this->input->post('id');
			$berba = utf8_encode($this->input->post('berba'));
			$definizioa = utf8_encode($this->input->post('editor1'));

			$this->berba_model->update($berba_id, $berba, $definizioa);

			//gorde berbaren tagak
			$tagak = $this->tag_model->tagak();
			$insertatzeko_illarak=array();
			$kentzeko_illarak = array();
			//print_r($tagak->result_array());echo('<br>');
			foreach ($tagak->result() as $taga) {
				$tag_id = $this->input->post($taga->name);
				if($tag_id){

					$insertatzeko_illarak[$tag_id]=$berba_id;
				}else{

					$kentzeko_illarak[$taga->id] = $berba_id;
				}
			}

			foreach ($insertatzeko_illarak as $tag_id => $berba_id){
				if(!$this->berben_tag_model->exist($berba_id, $tag_id)){
					$this->berben_tag_model->insert($berba_id , $tag_id);
				}
			}

			foreach ($kentzeko_illarak as $tag_id => $berba_id){
				if($this->berben_tag_model->exist($berba_id, $tag_id)){
					$this->berben_tag_model->delete($berba_id, $tag_id);
				}
			}

			$this->index('Gordeta!');
		}
	}


	function gorde(){

		$this->form_validation->set_rules('berba', 'Berba', 'trim|required|callback__berba_check');
		$this->form_validation->set_rules('letra', 'Letra', 'trim|required');
		$this->form_validation->set_rules('editor1', 'Definizioa', 'trim');

		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		$this->form_validation->set_message('required', '%s bete behar da.');//%s coge el nombre de campo
		$this->form_validation->set_message('_berba_check', '%s existitzen da');


		if ($this->form_validation->run() == FALSE){
			$this->berba_inserter();
		}else{
			//gorde
			$berba = utf8_encode($this->input->post('berba'));
			$letra = utf8_encode($this->input->post('letra'));
			$definizioa = utf8_encode($this->input->post('editor1'));

			//$data = array('name'=> $berba, 'letra'=>$letra, 'definizio' => $definizioa);

			$berba_id = $this->berba_model->insert($berba, $letra, $definizioa);

			//gorde berbaren tagak
			$tagak = $this->tag_model->tagak();
			$insertatzeko_illarak = array();
			foreach ($tagak->result() as $taga) {
				$tag_id = $this->input->post($taga->name);
				if($tag_id != FALSE){
					//taga checked da!
					$insertatzeko_illarak[$tag_id] = $berba_id;
				}
			}
			foreach ($insertatzeko_illarak as $tag_id => $berba_id){
				$this->berben_tag_model->insert($berba_id , $tag_id);
			}
			//sartutako berbaren id eta chekeatutako tagen idekin insertak egin
			//hemen edo berben tag controlodorean baina berben_tag_model->insert($berba_id, $tag_id) erabiliz
			$this->index('Gordeta!');
		}

	}

	// 	function _berba_check($berba){
	// 		return $this->berba_model->berba_check($berba);
	// 	}

	function gordeta(){
		$data['title']="Gordeta!";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);

		$data['body']=$this->load->view('dashboard/gordeta', null, TRUE);
		$data['footer']=$this->load->view('dashboard/footer', null, TRUE);
		$this->load->view("includes/plantilla", $data);

	}

	function honi_buruz_updater(){
		$this->_is_logged_administratzaile();
		$data['title']= "Honi buruz testua aldatzeko formularioa";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
			
		//administratzaileak exekuta lezake soilik
		$rol = $this->session->userdata('rol');
		$data['active'] = 'honi_buruz_updater';
		if($rol == 'administratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		}
		
		$data['honi_buruz'] = $this->testuak_model->honi_buruz()->row();

		$data['main_content'] = $this->load->view("updater/update_honi_buruz", $data, TRUE);
		$data['body'] = $this->load->view("dashboard/body", $data, TRUE);
		
		$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);

		$this->load->view("includes/plantilla", $data);
	}

	function pertsonak_updater(){
		$this->_is_logged_administratzaile();
		$data['title']= "Pertsonak testua aldatzeko formularioa";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
			
		//administratzaileak exekuta lezake soilik
		$rol = $this->session->userdata('rol');
		$data['active'] = 'pertsonak_updater';
		if($rol == 'administratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		}
			
		$data['pertsonak'] = read_file('files/pertsonak.txt');

		$data['main_content'] = $this->load->view("updater/update_pertsonak", $data, TRUE);
		$data['body'] = $this->load->view("dashboard/body", $data, TRUE);
		
		$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);

		$this->load->view("includes/plantilla", $data);
	}

	function desixenak_updater(){
	$this->_is_logged_administratzaile();
		$data['title']= "Ezizenak testua aldatzeko formularioa";
		$data['header'] = $this->load->view("dashboard/header", $data, TRUE);
			
		//administratzaileak exekuta lezake soilik
		$rol = $this->session->userdata('rol');
		$data['active'] = 'desixenak_updater';
		if($rol == 'administratzaile'){
			$data['dropdown_menu'] = $this->load->view('dashboard/admin/dropdown_menu', '', TRUE);
			$data['main_menu'] = $this->load->view('dashboard/admin/main_menu', $data, TRUE);
		}
			
		$data['desixenak'] = read_file('files/desixenak.txt');

		$data['main_content'] = $this->load->view("updater/update_desixenak", $data, TRUE);
		$data['body'] = $this->load->view("dashboard/body", $data, TRUE);
		
		
		$data['footer'] = $this->load->view("dashboard/footer", null, TRUE);

		$this->load->view("includes/plantilla", $data);
	}



	function honi_buruz_aldaketa_gorde(){

		$this->form_validation->set_rules('editor1', 'Honi buruz', 'trim');

		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if ($this->form_validation->run() == FALSE){
			$this->honi_buruz_updater();
		}else{
			//gorde
			$testua = utf8_encode($this->input->post('editor1'));

			$this->testuak_model->update_honi_buruz($testua);

			$this->index('Gordeta!');
		}
	}

	function pertsonak_aldaketa_gorde(){

		$this->form_validation->set_rules('editor1', 'Pertsonak', 'trim');

		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');



		if ($this->form_validation->run() == FALSE){
			$this->pertsonak_updater();
		}else{
			//gorde
			$testua = utf8_encode($this->input->post('editor1'));

			if ( ! write_file('files/pertsonak.txt', $testua))
			{
				echo 'Ezinezkoa fitxategian idaztea';
			}
			else
			{
				$this->index('Gordeta!');
			}

				
		}
	}

	function desixenak_aldaketa_gorde(){

		$this->form_validation->set_rules('editor1', 'Desixenak', 'trim');

		//$this->form_validation->set_error_delimiters('<div class="error">', '</div>');



		if ($this->form_validation->run() == FALSE){
			$this->desixenak_updater();
		}else{
			//gorde
			$testua = utf8_encode($this->input->post('editor1'));

			if ( ! write_file('files/desixenak.txt', $testua))
			{
				echo 'Ezinezkoa fitxategian idaztea';
			}
			else
			{
				$this->index('Gordeta!');
			}


		}
	}



	function _is_logged_in(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		$user_id = $this->session->userdata('user_id');
		if ($is_logged_in != TRUE || $user_id == ""){
			redirect('users/login');
		}
	}

	function _is_logged_kolaboratzaile(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		$user_id = $this->session->userdata('user_id');
		$rol = $this->session->userdata('rol');
		if ($is_logged_in != TRUE || $user_id == ""){
			redirect('users/logout');
		}
		if($rol !='kolaboratzaile' && $rol !='administratzaile'){
			redirect('users/logout');
		}
	}

	function _is_logged_administratzaile(){
		$is_logged_in = $this->session->userdata('is_logged_in');
		$user_id = $this->session->userdata('user_id');
		$rol = $this->session->userdata('rol');
		if ($is_logged_in != TRUE || $user_id == ""){
			redirect('users/logout');
		}
		if($rol !='administratzaile'){
			redirect('users/logout');
		}
	}
	
	function probak(){
		//date
// 		echo(date('Y-m-d'));
		//
// 		$str = 'aaverde.jpg';
// 		echo(substr($str, strlen($str)-9, strlen($str)));

$data = array(
		'izena' => 'aaaa',
		'abizena1' => 'aasdfa'
		
		);
		if ($this->_protagonista_check($data)){
			echo('egia');
			
		}else{
			echo 'gezuz';
		}
		
	}

}