<?php

class Order extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('order_model');
        $this->load->model('customer_model');
        // $this->load->view('new_orders');
    }

    public function index() {

        $this->template->build("order/new_orders");
    }

    public function order_status() {
        $date = date("2015-04-17");
        $data['high'] = $this->order_model->get_order_status('0', $date);
        $data['medium'] = $this->order_model->get_order_status('1');
        $data['low'] = $this->order_model->get_order_status('0');
        $this->template->build("order/new_orders", $data);
    }

    public function order_on_hold() {
        $date = date("2015-04-17");

        $data['high'] = $this->order_model->get_order_on_hold('2', $date);
        $data['normal'] = $this->order_model->get_order_on_hold('1', $date);
        $data['low'] = $this->order_model->get_order_on_hold('0', $date);
        $this->template->build('hold/orders_on_hold', $data);
    }

    public function order_on_hold_popup() {
        if ($this->input->post()) {
            $data['ord_id'] = $_POST['ord_id'];
//            $data['ord_code'] = $_POST['ord_ref_id'];
            $data['is_hold'] = WORK_NOT_IN_HOLD;
            $this->order_model->update_hold_status($data);
            redirect('order/order_on_hold');
        }
        $data['ord_id'] = $_GET['ord_id'];
        $data['ord_code'] = $_GET['ord_ref_id'];
//        $data['hold'] = $this->order_model->get_order_hold_status($data);
        $this->load->view('hold/hold_popup', $data);
    }
    
    public function order_details() {
        $ord_id = $_GET['ord_id'];
        $data['sel_ord'] = $this->order_model->get_order_details_form($ord_id);
        $data['ordobj'] = $data['sel_ord'][0];
        $data['leading_edge'] = '';
        if($data['ordobj']->frm_size > 0){
			$data['frm_size'] = GetSingleReconrd("mst_stencil_format","sf_name","sf_id",$data['ordobj']->frm_size);
		}else{
			$data['frm_size'] = $data['ordobj']->custom_size;
		}
		
		if($data['ordobj']->stencil_side == 1){
			
			if($data['ordobj']->top_side == 1 && ($data['ordobj']->top_foil_thik!='') && ($data['ordobj']->top_multilevel!='')){
				$data['stencil_side'] = 'Top side stepdown';
			}else{
				$data['stencil_side'] = 'Top paste';
			}
			
			if($data['ordobj']->top_foil_thik != '') {$data['foil_thik'] = $data['ordobj']->top_foil_thik.' mils'; }
			if($data['ordobj']->top_multilevel != '') {$data['multilevel_thik'] = $data['ordobj']->top_multilevel.' mils'; }else{$data['multilevel_thik'] = '---';}
			if($data['ordobj']->top_multilevel_2 != '') {$data['multilevel_thik_2'] = ' / '.$data['ordobj']->top_multilevel_2.' mils'; }else{$data['multilevel_thik_2'] = '';}
			
			$data['dt_name'] = $data['ordobj']->dt_top_name;
			$data['dt_assembly'] = $data['ordobj']->dt_top_assembly;
			$data['dt_fab'] = $data['ordobj']->dt_top_fab;
			$data['dt_new1'] = $data['ordobj']->dt_top_new1;
			$data['dt_new2'] = $data['ordobj']->dt_top_new2;
			$data['dt_side'] = $data['ordobj']->dt_top_side;
			if($data['ordobj']->top_lead_edge != ""){
				$data['leading_edge']  =  "TOP - ".$data['ordobj']->top_lead_edge;
			}
			
		}elseif($data['ordobj']->stencil_side == 2){
			
			if($data['ordobj']->bottom_side == 2 && ($data['ordobj']->bot_foil_thik!='') && ($data['ordobj']->bot_multilevel!='')){
				$data['stencil_side'] = 'Bottom side stepdown';
			}else{
				$data['stencil_side'] = 'Bottom paste';
			}
			if($data['ordobj']->bot_foil_thik !='') { $data['foil_thik'] = $data['ordobj']->bot_foil_thik.' mils'; }
			if($data['ordobj']->bot_multilevel !='') { $data['multilevel_thik'] = $data['ordobj']->bot_multilevel.' mils'; }else{$data['multilevel_thik'] = '---';}
			if($data['ordobj']->bot_multilevel_2 !='') { $data['multilevel_thik_2'] = ' / '.$data['ordobj']->bot_multilevel_2.' mils'; }else{$data['multilevel_thik_2'] = '';}
			
			$data['dt_name'] = $data['ordobj']->dt_bot_name;
			$data['dt_assembly'] =$data['ordobj']->dt_bot_assembly;
			$data['dt_fab'] = $data['ordobj']->dt_bot_fab;
			$data['dt_new1'] = $data['ordobj']->dt_bot_new1;
			$data['dt_new2'] = $data['ordobj']->dt_bot_new2;
			$data['dt_side'] = $data['ordobj']->dt_bot_side;
			if($data['ordobj']->bot_lead_edge != ""){
				$data['leading_edge'] =  "BOT - ".$data['ordobj']->bot_lead_edge;
			}
			
		}elseif($data['ordobj']->stencil_side == 3){
			
			$data['stencil_side'] = 'Top and Bottom on same Stencil';
			if($data['ordobj']->top_foil_thik != '') {$data['foil_thik']=$data['ordobj']->top_foil_thik.' mils'; }
			if($data['ordobj']->top_multilevel != '') {$data['multilevel_thik'] = $data['ordobj']->top_multilevel.' mils'; }else{$data['multilevel_thik']='---';}
			if($data['ordobj']->top_multilevel_2 != '') {$data['multilevel_thik_2'] = ' / '.$data['ordobj']->top_multilevel_2.' mils'; }else{$data['multilevel_thik_2']='';}
			
			$data['dt_name'] = $data['ordobj']->dt_top_name;
			$data['dt_assembly'] = $data['ordobj']->dt_top_assembly;
			$data['dt_fab'] = $data['ordobj']->dt_top_fab;
			$data['dt_new1'] = $data['ordobj']->dt_top_new1;
			$data['dt_new2'] = $data['ordobj']->dt_top_new2;
			$data['dt_side'] = $data['ordobj']->dt_top_side;
			if($data['ordobj']->top_lead_edge != ""){
				$data['leading_edge'] =  "TOP - ".$data['ordobj']->top_lead_edge;
			}
		}
                $data['eng_service']=array();
		if($data['ordobj']->lead_free_mark==1){ $data['eng_service'][]="Lead Free Marking"; }
		if($data['ordobj']->design_for_no_clean==1){ $data['eng_service'][]="Design For No Clean"; }
		if($data['ordobj']->epo_coat==1){ $data['eng_service'][]="EPO Coat"; }
		if($data['ordobj']->film_plots==1){ $data['eng_service'][]="Film Plots"; }
		if($data['ordobj']->data_for_appr==1){ $data['eng_service'][]="Data For Approval"; }
		if($data['ordobj']->p3_rpt==1){ $data['eng_service'][]="P3 Report"; }
		if($data['ordobj']->spin_plate==1){ $data['eng_service'][]="Spin Plate"; }
		if($data['ordobj']->inspect_template==1){ $data['eng_service'][]="Inspection Template"; }
		if($data['ordobj']->fg_material==1){ $data['eng_service'][]="FG Material"; }
		if($data['ordobj']->fixture_stencil==1){ $data['eng_service'][]="Fixture With Stencil"; }
		$data['engservice']=implode(', ',$data['eng_service']);
                
                if($data['ordobj']->cust_ref !=''){
		
		$data['sel_comp'] = $this->customer_model->get_customer_details($data['ordobj']->cust_id);
		
		
			
			$data['compaddr'] = $data['sel_comp']['cust_addr1'].', ';
			
			$data['compaddr'].=$data['sel_comp']['cust_addr2'].', ';
			
			$data['compaddr'].=$data['sel_comp']['cust_city'].', ';
			
			$data['compaddr'].=GetSingleReconrd("mst_state","state_name","state_id",$data['sel_comp']['cust_state']).', ';
			
			$data['compaddr'].=$data['sel_comp']['cust_post_code'].', ';
			
			$data['compaddr'].=GetSingleReconrd("mst_country","country_name","country_id",$data['sel_comp']['cust_country']);
		
	}
	
	if($data['ordobj']->ad_by !=''){
		
		$data['eng_obj'] = $this->customer_model->get_engineer_details($data['ordobj']->eng_id);
		
			}
        $this->load->view('order/order_details',$data);
    }

}
