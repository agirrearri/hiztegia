<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Berba extends CI_Controller{
    function __construct(){
		parent::__construct();
		$this->load->helper('file');
		$this->load->model('berba_model');
		$this->load->model('testuak_model');
	}

    function index(){
		//tag header
		$data['title'] = 'Berba hiztegixe';
		$data['header'] = $this->load->view("includes/header", $data, TRUE);

		//tag body
		$data['header_info'] = $this->berba_model->letrak();
		$data['menu_header_content'] = $this->load->view('berba/menu_header', $data, TRUE);
			
		$data['menu_left_content'] = $this->load->view('includes/first_column','', TRUE);
			
		$data['mensaje'] = $this->testuak_model->honi_buruz()->row()->testua;
		/*
		$data['mensaje'] = '<p style="text-align: justify;font-weight:600;">HITZAURREA</p>
		
<p style="text-align: justify;">Webgune honek Ondarroan erabiltzen diren eta erabili izan diren berba, lokuzio, esaera, metafora eta abar eskaintzen dizkizu. Ondarroako hizkuntza biziaren tresna horiek medio, etnografiaren zenbait alderdi ere aurkituko diztuzu berton: XX. mende hasieratik erdi aldera bitartean ondarrutarrek, emakume nahiz gizon, eramaniko bizimoduaren xehetasunak, bizipenak, bizipozak, pentsamoldea, politikaren eta erlijioaren eragina, tartean 1936ko gerrako gorabeherak, finean, bizitzea tokatu zitzaien bizitzaren aurrean zuten jarrera eta ikuspegia.</p>
		
<p style="text-align: justify;">Gertaera zenbait argitzeko edo egiaztatzeko une jakin batzuetan dokumentu ofizialetara jo dudan arren, nik neuk bizitakoa eta ondarrutarrek, emakume nahiz gizonezko, kontatutakoa hartu dut oinarri eta iturburutzat. Euren oroitzapenak, kontatu dizkidaten bezala islatzen ahalegindu naiz. Beraz, hemen subjektibotasuna da nagusi: euren egia.</p>
		
<p style="text-align: justify;">Hau ere ondarrutarren historia da, Ondarroako emakume eta gizonen oroimen kolektiboa; aurrekoen ildoari jarraituz eurek eraiki eta tajututako berbetarekin, gabezia eta bitxikeria guztiak barne, kontatua.</p>
<br><br>
<p style="text-align: justify;">Neurri honetako lan bat okerrik gabe burutzea ez da posible. Eta ahalegin handia egin arren, ziur nago akatsik ez dela faltako; era guztietako akatsak. Beraz, lan honetako testuren bat irakurri, eta akats, huts, edo datu okerren bat begiztatuko bazenu, zalantzarik ez izan: hitzaurrearen beheko aldean duzun posta elektronikoa erabiliz niri jakinarazi, arren, zein berbatan aurkitzen den aditzera emanez. "Hiztegi" hau osatuz joan nadin datu berriren bat nahiz informazio gehigarri bat eskaini nahi bazenit ere berdin. Orain arte ondarroar askoren laguntza izan dut. Aurrerantzean, emailez baliatuz, Ondarroako edo erbesteko, zure hondar alea jartzeko aukeran zaude. Eskertuko nizuke. </p>
<p style="text-align: justify;">admin@ondarruberbetan.com</p>';
*/
		$data['main_content'] = $this->load->view('includes/mezu', $data, TRUE);
			
		$data['menu_foot_content'] = '';
			
		$data['body']= $this->load->view('includes/body', $data, TRUE);
			
		//behekaldea bodyan sartzen da baina scriptak doazenez aparte jarri dut.
		$data['footer'] = $this->load->view('includes/footer', '', TRUE);
			
		$this->load->view('includes/plantilla', $data);
	}

	function home(){
		$data['mensaje'] = $this->testuak_model->honi_buruz()->row()->testua;
		$this->load->view('includes/mezu', $data);
	}
    
    function ondarrutarrak(){
    	$data['mensaje'] = read_file('files/pertsonak.txt');
		$this->load->view('includes/mezu', $data);
	}
    
    function protagonistak(){
        $data['mensaje'] = "<br><br><br><center><h3>Atal hau oraindik egiteko dago, lanean gabiltza.</h3></center>";
        $this->load->view('includes/mezu', $data);
    }
    
    function desixenak(){
       	$data['mensaje'] = read_file('files/desixenak.txt');
		$this->load->view('includes/mezu', $data);
	}


	function guri_buruz(){
		$data['mensaje'] = "Egile eta parte hartzaileei buruzko informazioa.<p>Josu Arrizabalaga Basterretxea: berbak pilatu eta hiztegia egin duena</p><p>Eñaut Agirre Arrizabalaga: webgunearen egilea</p><p>Iradokizunetarako: admin@ondarruberbetan.com</p>";
		$this->load->view('includes/mezu', $data);
	}

	function mezua_erakutsi($mezua){
		$data['mensaje'] = $mezua;
		$this->load->view('includes/mezu', $data);
	}

	function azkenak(){
		/*sortze data barriane dutenak
		 * */
		$data['berbak'] = $this->berba_model->azken_berbak();
		$this->load->view('berba/azkenak', $data);
	}

	function guztiak($offset='')
	{
		/*berba guztiak paginatuta
		 * */
		$limit = 24;
		$total = $this->berba_model->count_mensajes();
		$data['berbak'] = $this->berba_model->berbak($limit, $offset);
		$config['base_url'] = 'berba/guztiak/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		//$config['uri_segment'] = '3';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		$this->load->view('berba/berba_paginado', $data);
	}

	function lortu( $letra,$offset=''){
		/*$letra-rekin hasitako bebak lortzen ditu
		 * */
		$limit = 10000;
		$total = $this->berba_model->count_berba_hasieradunak($letra);
		$data['berbak'] = $this->berba_model->berba_hasieradunak($limit, $offset, $letra);
        //$data['berbak'] = $this->berba_model->berba_letradunak($letra);
		$config['base_url'] = 'berba/lortu/'.$letra.'/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		$data['letra']=$letra;
		$this->load->view('berba/berba_paginado', $data);
	}
    
    function berba_like(){
         $keyword = $this->input->post('term');
     
         $query = $this->berba_model->get_like($keyword); 
         
         if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
        {
            $data[] = array('label'=> $row->name, 'value'=> $row->id);
        }
     }
     echo json_encode($data);
     
  }

	function tagdunak($tag_id, $offset=''){
		/*$tag_id duten berbak
		 * */
		$limit = 5000;
		$total = $this->berba_model->count_tagdunak($tag_id);
		if($total == 0){
			$this->mezua_erakutsi("Ez dago gai honekin logutako berbarik");
		}
		$data['berbak'] = $this->berba_model->tagdunak($limit, $offset, $tag_id);
		//		echo($total." ". count($data['berbak']));
		//		print_r($data['berbak']->result());
		$config['base_url'] = 'berba/tagdunak/'.$tag_id.'/';
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;
		$config['uri_segment'] = '4';
		$this->pagination->initialize($config);
		$data['pag_links'] = $this->pagination->create_links();
		$data['letra']=$tag_id;
		$this->load->view('berba/berba_paginado', $data);
	}

	function get($id){
		$data['main_info'] = $this->berba_model->get($id);
		$this->load->view('berba/bat', $data);
	}

	function letrak(){
		$this->berba_model->letrak();
	}

}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>