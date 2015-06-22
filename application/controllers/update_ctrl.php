
<?php
class Update_ctrl extends CI_Controller{

function __construct(){
	parent::__construct();
	$this->load->model('agenciesmodel');
}


	public function index()
	{
		//$this->load->view('controls_view');

	}

    /*****************************************************************************************************
    *                         Supply Chain Agency Functions                                              *
    *                                                                                                    *
    *****************************************************************************************************/

public function show_agency_id() {
	$id = $this->uri->segment(3);//get id from the url
	$data['agencies'] = $this->agenciesmodel->show_students();
	$data['single_agency'] = $this->agenciesmodel->show_student_id($id);


	$this->load->view('supply_chain_agency_view',$data);
}

function update_agency_id1() {
	$id= $this->input->post('supply_agency_id');
	$data = array(
	'SUPPLY_CHAIN_AGENCY' => $this->input->post('supply_agency_name'),
	'CONTACT_PERSON' => $this->input->post('contact_person'),
	'CONTACT_PHONE' => $this->input->post('contact_phone'),
	'COMMENT' => $this->input->post('supply_agency_description'),

	);
	$updaterecord=$this->agenciesmodel->update_student_id1($id,$data);

	     	$data['formupdate'] =  "";
		if($updaterecord){
			$data['formupdate'] =  "set";
		}


	$id = $this->uri->segment(3);//get id from the url
	$data['agencies'] = $this->agenciesmodel->show_students();
	$data['single_agency'] = $this->agenciesmodel->show_student_id($id);


	$this->load->view('supply_chain_agency_view',$data);

}

function delete_agency()   {
	 $id= $this->input->post('supply_agency_id');     
     $this->db->where('supply_chain_agency_id', $id);
     $deleterecord=$this->db->delete('supply_chain_agency');
     		$data['status'] =  "";
		if($deleterecord){
			$data['status'] =  "Agency deleted Successfully!..";
		}
	
		$this->show_agency_id();
}

/*****************************************************************************************************
*                                 County Functions                                                   *
*                                                                                                    *
*****************************************************************************************************/
public function show_county_id() {
	$id = $this->uri->segment(3);//get id from the url
	$data['counties'] = $this->agenciesmodel->show_counties();
	$data['single_county'] = $this->agenciesmodel->show_county_id($id);
	$data['zones'] = $this->agenciesmodel->getZone();//get zones

	$this->load->view('counties_view',$data);
}


function update_county_id1() {
	  $id= $this->input->post('county_id');
	  $data = array(
	  'zone' => $this->input->post('zone_name'),
	  'comment' => $this->input->post('county_comment'),
	  );
	  $Updatecounty=$this->agenciesmodel->update_counties_id1($id,$data);
	  $data['status'] =  "";
	  if ($Updatecounty) {
	 	 $data['status'] =  "Agency updated Successfully!..";
	 }
	 $this->show_county_id();     
}



/*****************************************************************************************************
*                         Funding agency Functions                                                   *
*                                                                                                    *
*****************************************************************************************************/

public function showFundingAgency() {
	$fid = $this->uri->segment(3);//get id from the url
	$data2['fundingagencies'] = $this->agenciesmodel->show_fundingorgs();
	$data2['single_fundingagency'] = $this->agenciesmodel->show_fundingOrg_id($fid);


	$this->load->view('showfundingagencies',$data2);	

}
function updateFundingAgencyid() {
	$id= $this->input->post('funding_agency_id');
	$data = array(
	'funding_agency_name' => $this->input->post('funding_agency_name'),
	'comment' => $this->input->post('funding_agency_description'),
	
	);
	$this->agenciesmodel->update_funding_agency($id,$data);
	$this->showFundingAgency();	     
}

function deleteFundingAgency(){

	$id= $this->input->post('funding_agency_id');     
	$this->db->where('funding_agency_id', $id);
	$deleterecord=$this->db->delete('funding_agencies');
	$data['status'] =  "";
	 if($deleterecord){
		$data['status'] =  "Agency deleted Successfully!..";
		}
		$this->showFundingAgency();
}

/*****************************************************************************************************
*                         Static Parameters functions                                                *
*                                                                                                    *
*****************************************************************************************************/


public function showStaticParams() {
		$fid = $this->uri->segment(3);//get id from the url
		$data3['staticParams'] = $this->agenciesmodel->showStaticParams();
		$data3['single_staticparam'] = $this->agenciesmodel->show_staticparams_id($fid);

		$data3['COMMODITY']=$this->agenciesmodel->show_commodities();




		$this->load->view('showstaticparams',$data3);
}


function updateStaticParamsid() {
	
	$id= $this->input->post('staticparams_id');

	$commodity_name= $this->input->post('commodity_name');
	$commodity_id=$this->agenciesmodel->showCommodityId($commodity_name);

	$data = array(
	'period' => $this->input->post('period'),
	'commodity_id'=>$commodity_id,
	'projected_monthly_consumption' => $this->input->post('projected_monthly_consumption'),
	'average_monthly_consumption'=>$this->input->post('average_monthly_consumption'),
     'reporting_rate'=>$this->input->post('reporting_rate')
	);




	$this->agenciesmodel->update_static_id1($id,$data);
	$this->showStaticParams();
	     
}

public function deleteStaticParam(){
	 	$id= $this->input->post('staticparams_id');     
		     $this->db->where('staticparameterid', $id);
		     $deleterecord=$this->db->delete('static_parameters');
		     		$data['status'] =  "";
				if($deleterecord){
					$data['status'] =  "Parameter deleted Successfully!..";
				}
			$this->showStaticParams();
}

/*****************************************************************************************************
*                         Pending Stocks  Functions                                                  *
*                                                                                                    *
*****************************************************************************************************/
public function show_pending_stocks() {
	$psid = $this->uri->segment(3);//get id from the url
	$data2['PSTOCKS'] = $this->agenciesmodel->showPendingStock();
	$data2['single_PSTOCKS'] = $this->agenciesmodel->showPendingStock_id($psid);
	$data2['COMMODITY']=$this->agenciesmodel->show_commodities();
	$data2['FUNDING']=$this->agenciesmodel->show_fundingorgs();

	$this->load->view('showpendingstock',$data2);
}

public function updatePendingDeliveryid() {
	$id= $this->input->post('pendingstockid');

	$commodity= $this->input->post('commodity_name');
	//'pack_size' => $this->input->post('pack_size'),
	$funding_agency_name = $this->input->post('funding_agency');
		


	$commodity_id=$this->agenciesmodel->showCommodityId($commodity);
	$funding_agency_Id=$this->agenciesmodel->show_fundingOrgId($funding_agency_name);


	$data = array(
	'pending_deliveries' => $this->input->post('pending_deliveries'),
	'expected_date_delivery'=>$this->input->post('expected_date_delivery'),
	'comments'=>$this->input->post('pddescription'),
	'commodity_id'=>$commodity_id,
	'funding_agency_id'=>$funding_agency_Id,
	);

	$this->agenciesmodel->update_pending_delivery($id,$data);
	$this->show_pending_stocks();

 }

/*****************************************************************************************************
*                         Central Level Stocks Functions                                             *
*                                                                                                    *
*****************************************************************************************************/

	 public function show_central_level_stock(){
	 	$clid = $this->uri->segment(3);//get id from the url
		$datacl['Central_level'] = $this->agenciesmodel->showCentralStock();
		$datacl['single_Central_level'] = $this->agenciesmodel->showCentralStock_id($clid);
		$datacl['COMMODITY']=$this->agenciesmodel->show_commodities();
		$datacl['FUNDING']=$this->agenciesmodel->show_fundingorgs();
		$datacl['SUPLYAGENCY']=$this->agenciesmodel->show_students();

		$this->load->view('central_level_data-view',$datacl);
		// $this->getPendingStockTotals();
	 }

	 public function updatecentral_levelid(){	 
		 $id= $this->input->post('central_level_stock_id');//central_level_stock_id
		$commodity_name = $this->input->post('commodity_name');
		$supply_chain_agency = $this->input->post('supply_chain_agency');
		$funding_agency_name=$this->input->post('funding_Agency');
		$commodity_id=$this->agenciesmodel->showCommodityId($commodity_name);
		$funding_id=$this->agenciesmodel->show_fundingOrgId($funding_agency_name);
		$supply_agency_id=$this->agenciesmodel->showSupplyAgencyId($supply_chain_agency);
		
			$data = array(
			'opening_balance' => $this->input->post('opening_balance'),
			'receipts_from_suppliers'=>$this->input->post('receipts_from_suppliers'),
			'closing_balance'=>$this->input->post('closing_balance'),
			'total_issues'=>$this->input->post('total_issues'),
			'earliest_expiry_date'=>$this->input->post('earliest_expiry_date'),
			'quantity_expiring'=>$this->input->post('quantity_expiring'),
			'report_date'=>$this->input->post('report_date'),
			'funding_agency_id'=>$funding_id,
			'supply_agency_id'=>$supply_agency_id,
			'commodity_id'=>$commodity_id,
			);



	$this->agenciesmodel->update_central_data($id,$data);
	$this->show_central_level_stock();



	 }

	 public function delete_central_level_data(){


	 	$id= $this->input->post('central_level_stock_id');     
		 $this->db->where('central_level_stock_id', $id);
		     $deleterecord=$this->db->delete('central_level_soh');
		     $data['status'] =  "";
				if($deleterecord){
					$data['status'] =  "Parameter deleted Successfully!..";
				}
			$this->show_central_level_stock();



	 }


/*****************************************************************************************************
*                        Commodities Functions                                                       *
*                                                                                                    *
*****************************************************************************************************/

		public function show_commodities_id() {
		$id = $this->uri->segment(3);//get id from the url
		$data['commodities'] = $this->agenciesmodel->show_commodities();
		$data['single_commodity'] = $this->agenciesmodel->show_commodities_id($id);
		$data['funding_agency'] = $this->agenciesmodel->show_fundingorgs();
		$this->load->view('commodities_view',$data);	

		}
		function update_commodity_id() {
		$id= $this->input->post('commodity_id');
		$commodity_name = $this->input->post('commodity_name');
		$funding_agency_name = $this->input->post('funding_agency_name');
		$funding_id=$this->agenciesmodel->show_fundingOrgId($funding_agency_name);
		$data = array(
		'commodity_names'=>$commodity_name,
		'pack_size' => $this->input->post('pack_size'),
		'funding_agency_id'=>$funding_id,
		//'commodity_description' => $this->input->post('commodity_description'),
		);
		$this->agenciesmodel->update_commodity_id($id,$data);
		$this->show_commodities_id();
		     
		 }

		
		function delete_commodity()   {

			 $id= $this->input->post('commodities_id');     
		     $this->db->where('commodity_id', $id);
		     $deleterecord=$this->db->delete('commodities');
		     		$data['status'] =  "";
				if($deleterecord){
					$data['status'] =  "Commodity deleted Successfully!..";
				}
			
				$this->show_commodities_id();
		    }


	/*****************************************************************************************************
    *                         Reports                                                                     *
    *                                                                                                    *
    *****************************************************************************************************/
    function DisplayPendingShipments(){
		$pendingtotals['pendingConsignments']=$this->agenciesmodel->getPendingStockTotals();
		$pendingtotals['COMMODITY']=$this->agenciesmodel->show_commodities();



		$this->load->view('pending_commodities', $pendingtotals);
	}

	
public function pendingstocksReports() {
	$psid = $this->uri->segment(3);//get id from the url
	$data2['PSTOCKS'] = $this->agenciesmodel->showPendingStock();
	$data2['single_PSTOCKS'] = $this->agenciesmodel->showPendingStock_id($psid);
	$data2['COMMODITY']=$this->agenciesmodel->show_commodities();
	$data2['FUNDING']=$this->agenciesmodel->show_fundingorgs();

	$this->load->view('pendingshipments',$data2);
}


	/*****************************************************************************************************
    *                        Central level Reports(SOH,MOS)                                                       *
    *                                                                                                    *
    *****************************************************************************************************/

public function centralLevelStocksReports($period){
    $centralReport['period']=$this->agenciesmodel->getCentralAAC($period);
    $this->load->view('centralreport',$centralReport);

	//print_r($period);
}

public function centralLevelDhisStocksReports($period){
    $centralReport['period']=$this->agenciesmodel->getCentralDhisAAC($period);
    $this->load->view('centralDhisReport',$centralReport);
    
}

public function select_period(){   

      $centralReport['period'] =  "";
      $centralReport['period_dates'] = $this->agenciesmodel->show_static_param_periods();
      $this->load->view('centralreport',$centralReport);
			
}
	


}

?>