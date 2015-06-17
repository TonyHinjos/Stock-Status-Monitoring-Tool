<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AgencyHomeController extends CI_Controller 
{

	function __construct()
    {
       parent::__construct();

       $this->load->library('form_validation');
       $this->load->model('agenciesmodel');
     
    }

	public function index()
	{
		$this->load->view('deliveries_default_view');	

	}



	/*****************************************************************************************************
    *                             Supply Chain Agency Functions                                          *
    *                                                                                                    *
    *****************************************************************************************************/


	public function save(){
		$agency_name= ($this->input->post('supply_agency_name'));
		$person= ($this->input->post('contact_person'));
		$contact= ($this->input->post('contact_phone'));
		$phone= ($this->input->post('supply_chain_description'));


		$agency = array(
			'SUPPLY_CHAIN_AGENCY' => $agency_name,
			'CONTACT_PERSON' => $person,
			'CONTACT_PHONE' => $contact,
			'COMMENT' => $phone
		);
       
		$agencyId = $this->agenciesmodel->addagency($agency);
		$data['message'] =  "";
		if($agencyId){
			$data['message'] =  "Agency Saved Successfully!..";
		}

        // $this->index();
		$this->load->view('deliveries_default_view', $data);
	}



public function showcounties(){
		$query = $this->agenciesmodel->getCounty();
        
        $data['SUPPLY_AGENCIES'] = "";
		if($query){
			$data['SUPPLY_AGENCIES'] =  $query;
		}

		$this->load->view('counties_view.php', $data);
	}




	/*****************************************************************************************************
    *                         Funding Agency Functions                                                   *
    *                                                                                                    *
    *****************************************************************************************************/

		public function saveFundingAgency(){
		$agency_name= ($this->input->post('funding_agency_name'));
		$fdescription= ($this->input->post('funding_agency_description'));


		$fagency = array(
			'funding_agency_name' => $agency_name,
				'comment' => $fdescription
		);
       
		$fundingagencyId = $this->agenciesmodel->addfundingagency($fagency);
		$fdata['funding_agency_message'] =  "";
		if($fundingagencyId){
			$fdata['funding_agency_message'] =  "Funding Agency Saved Successfully!..";
		}


		$query = $this->agenciesmodel->getfundigAgency();

		if($query){
			$fdata['funding_AGENCIES'] =  $query;
		}
		//$this->load->view('result.php', $data);
		$this->load->view('deliveries_default_view', $fdata);
	}

    /*****************************************************************************************************
    *                         Static Parameters Functions                                                *
    *                                                                                                    *
    *****************************************************************************************************/
	public function saveStaticParams(){
		$prd= ($this->input->post('period'));
		$cn= ($this->input->post('commodity_name'));
		$ps= ($this->input->post('pack_size'));
		$pmc= ($this->input->post('projected_monthly_consumption'));
		$amc= ($this->input->post('average_monthly_consumption'));
		$rr= ($this->input->post('reporting_rate'));
		



		$commodity_id=$this->agenciesmodel->showCommodityId($cn);

		$staticparams = array(

			'period'=>$prd,
			'commodity_id'=>$commodity_id,
			//'pack_size'=>$ps,
			'projected_monthly_consumption'=>$pmc,
			'average_monthly_consumption'=>$amc,
			'reporting_rate'=>$rr
			);
       
		$psId = $this->agenciesmodel->addstaticparam($staticparams);
		$data['message'] =  "";
		if($psId){
			$data['message'] =  "Agency Saved Successfully!..";
		}


		$query = $this->agenciesmodel->getStaticParams();

		if($query){
			$data['STATICPARAMS'] =  $query;
		}
		//$this->load->view('result.php', $data);
		$this->load->view('deliveries_default_view', $data);
	}

    /*****************************************************************************************************
    *                         Pending Delivery Functions                                                 *
    *                                                                                                    *
    *****************************************************************************************************/
	public function savePendingDeliveries(){
        $commodity_name= ($this->input->post('commodity_name'));
		$pack_size= ($this->input->post('pack_size'));
		$funding_agency= ($this->input->post('funding_agency'));
		$pending_deliveries= ($this->input->post('pending_deliveries'));
		$expected_date_delivery= ($this->input->post('expected_date_delivery'));
		$pddescription=($this->input->post('pddescription'));




		$commodity_id=$this->agenciesmodel->showCommodityId($commodity_name);
		$funding_agency_Id=$this->agenciesmodel->show_fundingOrgId($funding_agency);

		$pendingStock = array(
			'commodity_id'=>$commodity_id,
			//'pack_size'=>$pack_size,
			'funding_agency_id'=>$funding_agency_Id,
			'pending_deliveries'=>$pending_deliveries,
			'comments'=>$pddescription,
			'expected_date_delivery'=>$expected_date_delivery			
			);
       
		$psId = $this->agenciesmodel->addPendingStock($pendingStock);
		$data['message'] =  "";
		if($psId){
			$data['message'] =  "Agency Saved Successfully!..";
		}


		$query = $this->agenciesmodel->getPendingStock();

		if($query){
			$data['STATICPARAMS'] =  $query;
		}
		$this->load->view('deliveries_default_view', $data);
	}


	/*****************************************************************************************************
    *                         Central Level Stock Functions                                              *
    *                                                                                                    *
    *****************************************************************************************************/


  public function saveCentralData(){

		$commodity_name = $this->input->post('commodity_name');
		$supply_chain_agency = $this->input->post('supply_agency_name');
		$funding_agency_name=$this->input->post('funding_agency_name');
		$commodity_id=$this->agenciesmodel->showCommodityId($commodity_name);
		$funding_id=$this->agenciesmodel->show_fundingOrgId($funding_agency_name);
		$supply_agency_id=$this->agenciesmodel->showSupplyAgencyId($supply_chain_agency);

		$date1=date('D M Y');
		$time = time() + (0*60*60);
		$current_time  = date('H:i',$time);
		$date = ($date1. ' '. $current_time);
		//echo($date);

			$data = array(
			'opening_balance' => $this->input->post('opening_balance'),
			'receipts_from_suppliers'=>$this->input->post('receipts_from_suppliers'),
			'closing_balance'=>$this->input->post('closing_balance'),
			'total_issues'=>$this->input->post('total_issues'),
			'earliest_expiry_date'=>$this->input->post('earliest_expiry_date'),
			'quantity_expiring'=>$this->input->post('quantity_expiring'),
			'report_date'=>$date,
			'funding_agency_id'=>$funding_id,
			'supply_agency_id'=>$supply_agency_id,
			'commodity_id'=>$commodity_id,
			);


		$psId = $this->agenciesmodel->addCentralStock($data);



		$data['message'] =  "";
		if($psId){
			$data['message'] =  "Central Stock Saved Successfully!..";
		}


		$query = $this->agenciesmodel->getCentralStock();

		if($query){
			$data['STATICPARAMS'] =  $query;
		}
		$this->load->view('deliveries_default_view', $data);
    }


	/*****************************************************************************************************
    *                         Commodities Functions                                                      *
    *                                                                                                    *
    *****************************************************************************************************/
   	public function saveCommodity(){
		$commodity_name= ($this->input->post('commodity_name'));
		$pack_size= ($this->input->post('pack_size'));
		$funding_agency= ($this->input->post('funding_agency_name'));
		$commodity_comment= ($this->input->post('commodity_description'));



		$funding_agency_Id=$this->agenciesmodel->show_fundingOrgId($funding_agency);

		$commodity = array(
			'commodity_name' => $commodity_name,
			'pack_size' => $pack_size,
			'funding_agency_id' => $funding_agency_Id,
			//'commodity_description' => $commodity_comment
		);
       
		$commodityId = $this->agenciesmodel->addCommodity($commodity);
		$data['message'] =  "";
		if($commodityId){
			$data['message'] =  "Agency Saved Successfully!..";
		}


		$query = $this->agenciesmodel->getCommodity();

		if($query){
			$data['COMMODITIES_DETAILS'] =  $query;
		}
		
		$this->load->view('deliveries_default_view', $data);
	}
}
    /*****************************************************************************************************
    *                         End                                                                        *
    *                                                                                                    *
    *****************************************************************************************************/