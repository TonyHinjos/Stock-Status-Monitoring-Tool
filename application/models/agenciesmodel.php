<?php
class agenciesmodel extends CI_Model 
{

	
	function __construct()
    {
       parent::__construct();
        
    }

	
	
	function getZone(){	
		$this->db->select('*');		
		$this->db->from('zones');				
		$query = $this->db->get();		
		return $query->result();			
	}

	function showSupplyAgencyId($supply_name){
		$this->db->select('*');
		$this->db->where('supply_chain_agency', $supply_name);
		$query = $this->db->get('supply_chain_agency');
		$row = $query->row();
		$id = $row->supply_chain_agency_id;
		return $id;
	}
			
	function addAgency($agency=NULL){		
		$this->db->insert('supply_chain_agency', $agency);
		return $this->db->insert_id();						
	}


	//update model functions
		/***************************************************************************************************************
		*	COUNTY RECORDS                                                                                             *
		*
		***************************************************************************************************************/



		// Function To Fetch All Students Record
	function show_students(){
	$query = $this->db->get('supply_chain_agency');
	$query_result = $query->result();
	return $query_result;
	}
	// Function To Fetch Selected Student Record
	function show_student_id($data){
	$this->db->select('*');
	$this->db->from('supply_chain_agency');
	$this->db->where('supply_chain_agency_id', $data);
	$query = $this->db->get();
	$result = $query->result();
	return $result;
	}
// Update Query For Selected Student
	function update_student_id1($id,$data){
	    $this->db->where('supply_chain_agency_id', $id);
	    $this->db->update('supply_chain_agency', $data);
	}


/***************************************************************************************************************
*	COUNTY RECORDS                                                                                             *
*
***************************************************************************************************************/

// Function To Fetch Selected County Record
	function show_county_id($data){
	$this->db->select('*');
	$this->db->from('counties');
	$this->db->where('county_id', $data);
	$query = $this->db->get();
	$result = $query->result();
	return $result;
	}

    // Function To Fetch All Counties Record
	function show_counties(){
	$query = $this->db->get('counties');
	$query_result = $query->result();
	return $query_result;
	}

	function update_counties_id1($id,$data){
	    $this->db->where('county_id', $id);
	    $this->db->update('counties', $data);
	}



	 /*****************************************************************************************************
    *                         Funding agency Functions                                                   *
    *                                                                                                    *
    *****************************************************************************************************/					


	function show_fundingorgs(){
	$query = $this->db->get('funding_agencies');
	$query_result = $query->result();
	return $query_result;
	}
	// Function To Fetch Selected Student Record
	function show_fundingOrg_id($dataf){
	$this->db->select('*');
	$this->db->from('funding_agencies');
	$this->db->where('funding_agency_id', $dataf);
	$query = $this->db->get();
	$result = $query->result();
	return $result;
	}

	function show_fundingOrgId($name){
		$this->db->select('*');
		$this->db->where('funding_agency_name', $name);
		$query = $this->db->get('funding_agencies');
		$row = $query->row();
		$string = $row->funding_agency_id;
		return $string;
	}

	function addfundingAgency($fagency=NULL){		
	$this->db->insert('funding_agencies', $fagency);
	return $this->db->insert_id();						
    }

	function getfundigAgency(){	
	$this->db->select('*');	
	$this->db->from('funding_agencies');				
	$query = $this->db->get();		
	return $query->result();			
    }


		function update_funding_agency($fid,$fdata){
	    $this->db->where('funding_agency_id', $fid);
	    $this->db->update('funding_agencies', $fdata);
	}
/*****************************************************************************************************
*                         Static parameters Functions                                                *
*                                                                                                    *
*****************************************************************************************************/



	function showStaticParams(){
	$query = $this->db->get('static_parameters');
	$query_result = $query->result();
	return $query_result;
	}

	function show_staticparams_id($datasp){
	$this->db->select('*');
	$this->db->from('static_parameters');
	$this->db->where('staticparameterid', $datasp);
	$query = $this->db->get();
	$result = $query->result();
	return $result;
	}


    function addstaticparam($sp=NULL){	
    $this->db->insert('static_parameters', $sp);
    return $this->db->insert_id();						
	}

	function update_static_id1($id,$data){
    $this->db->where('staticparameterid', $id);
    $this->db->update('static_parameters', $data);
    }


    function getStaticParams(){	
	$this->db->select('*');
	$this->db->from('static_parameters');				
	$query = $this->db->get();		
	return $query->result();			
	}


/*****************************************************************************************************
*                        Pending Stocks Functions                                                    *
*                                                                                                    *
*****************************************************************************************************/

	function showPendingStock(){
	$query = $this->db->get('central_level_pending_stock');
	$query_result = $query->result();
	return $query_result;
	}
	function showPendingStock_id($psdata){
	$this->db->select('*');
	$this->db->from('central_level_pending_stock');
	$this->db->where('pendingstocksId', $psdata);
	$query = $this->db->get();
	$result = $query->result();
	return $result;
	}


	function update_pending_delivery($psid,$pendingdata){
	$this->db->where('pendingstocksId', $psid);
	$this->db->update('central_level_pending_stock', $pendingdata);
	}

	function addPendingStock($pending=NULL){	
	$this->db->insert('central_level_pending_stock', $pending);
	return $this->db->insert_id();	
	}					


	function getPendingStock(){	
	$this->db->select('*');
	$this->db->from('central_level_pending_stock');				
	$query = $this->db->get();		
	return $query->result();			
	}

	/*****************************************************************************************************
	*                        Central level Stock Functions                                               *
	*                                                                                                    *
	*****************************************************************************************************/
		function update_central_data($cdid,$cdData){
	$this->db->where('central_level_stock_id', $cdid);
	$this->db->update('central_level_soh', $cdData);
	}

	function addCentralStock($central_data=NULL){	
	$this->db->insert('central_level_soh', $central_data);
	return $this->db->insert_id();						
	}


	function getCentralStock(){	
	$this->db->select('*');
	$this->db->from('central_level_soh');				
	$query = $this->db->get();		
	return $query->result();			
	}



	function showCentralStock(){
	$query = $this->db->get('central_level_soh');
	$query_result = $query->result();
	return $query_result;

	}
	function showCentralStock_id($psdata){
	$this->db->select('*');
	$this->db->from('central_level_soh');
	$this->db->where('central_level_stock_id', $psdata);
	$query = $this->db->get();
	$result = $query->result();
	return $result;
	}



	/*****************************************************************************************************
	*                                 Commodities Functions                                              *
	*                                                                                                    *
	*****************************************************************************************************/

	// Function To Fetch All Commodities Record
	function show_commodities(){
	$query = $this->db->get('commodities');
	$query_result = $query->result();
	return $query_result;
	}
	// Function To Fetch Selected Student Record
	function show_commodities_id($data){
	$this->db->select('*');
	$this->db->from('commodities');
	$this->db->where('commodity_id', $data);
	$query = $this->db->get();
	$result = $query->result();
	return $result;
	}

	// Update Query For Selected Student
	function update_commodity_id($id,$data){
	    $this->db->where('commodity_id', $id);
	    $this->db->update('commodities', $data);
	}

	function addCommodity($commodity){
		$this->db->insert('commodities', $commodity);
		return $this->db->insert_id();						
	
	}

	function getCommodity(){	
	$this->db->select('*');
	$this->db->from('commodities');				
	$query = $this->db->get();		
	return $query->result();			
	}

		function showCommodityId($commodity_name){
		$this->db->select('*');
		$this->db->where('commodity_name', $commodity_name);
		$query = $this->db->get('commodities');
		$row = $query->row();
		$string = $row->commodity_id;
		return $string;
	}


	public function getPendingStockTotals(){
	$this->db->select('*,SUM(pending_deliveries) AS PendingTotal');
	$this->db->group_by('commodity_id');
	$this->db->order_by('PendingTotal', 'desc'); 
	$query=$this->db->get('central_level_pending_stock',10);
	/*return $query->result();*/
	return $query->result();

  }

  public function getCentralAAC($period)
  {

  	$sql="SELECT staticparameterid,period,commodity_id as cid,(SELECT commodity_name FROM commodities WHERE commodity_id=cid) as cname ,average_monthly_consumption,reporting_rate FROM static_parameters WHERE date(period) ='{$period}'";
  	$result=$this->db->query($sql);
  	return $result->result();

  }
}
?>

















































