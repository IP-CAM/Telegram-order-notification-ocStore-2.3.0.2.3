<?php
class ControllerExtensionModuleTelegram extends Controller {
  private $error = array();

  public function index() {
    $this->load->language('extension/module/telegram');

    $this->document->setTitle($this->language->get('heading_title'));

    $this->load->model('setting/setting');
    if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()){
      $this->model_setting_setting->editSetting('telegram', $this->request->post);
      $this->session->data['success'] = $this->language->get('text_success');
      $data['success'] = $this->session->data['success'] ;
      $this->response->redirect($this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true));
    }

    $data['text_enabled'] = $this->language->get('text_enabled');
    $data['text_disabled'] = $this->language->get('text_disabled');
    $data['heading_title'] = $this->language->get('heading_title');
    $data['header_customer_message'] = $this->language->get('header_customer_message');
    $data['error_permission'] = $this->language->get('error_permission');
    $data['error_sent_notfction'] = $this->language->get('error_sent_notfction');
    $data['error_no_key'] = $this->language->get('error_no_key');
    $data['text_extension'] = $this->language->get('text_extension');
    $data['text_success'] = $this->language->get('text_success');
    $data['text_sent_success'] = $this->language->get('text_sent_success');
    $data['text_edit'] = $this->language->get('text_edit');
    $data['text_new_account_messag'] = $this->language->get('text_new_account_messag');
    $data['entry_status'] = $this->language->get('entry_status');
    $data['entry_description'] = $this->language->get('entry_description');
    $data['entry_app_key'] = $this->language->get('entry_app_key');
    $data['entry_user_key'] = $this->language->get('entry_user_key');
    $data['entry_send_order_alert'] = $this->language->get('entry_send_order_alert');
    $data['entry_send_new_customer_alert'] = $this->language->get('entry_send_new_customer_alert');
    $data['entry_add_customer_name'] = $this->language->get('entry_add_customer_name');
    $data['entry_return_alert'] = $this->language->get('entry_return_alert');
    $data['entry_return_message'] = $this->language->get('entry_return_message');
    $data['entry_return_chatID'] = $this->language->get('entry_return_chatID');
    $data['entry_return_BOTTOKEN'] = $this->language->get('entry_return_BOTTOKEN');
    $data['entry_return_messag_text'] = $this->language->get('entry_return_messag_text');
    $data['entry_new_account_messag_text'] = $this->language->get('entry_new_account_messag_text');
    $data['button_save'] = $this->language->get('button_save');
    $data['button_cancel'] = $this->language->get('button_cancel');

    if (isset($this->error['telegram_boot_token'])){
      $data['error_no_key'] = $this->error['telegram_boot_token'];
    } else {
      $data['error_no_key'] = '';
    }

    $data['breadcrumbs'] = array();

    $data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
    );

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('text_extension'),
      'href' => $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true)
    );

    $data['breadcrumbs'][] = array(
      'text' => $this->language->get('heading_title'),
      'href' => $this->url->link('extension/module/telegram', 'token=' . $this->session->data['token'], true)
    );

    $data['action'] = $this->url->link('extension/module/telegram', 'token=' . $this->session->data['token'], true);

    $data['cancel'] = $this->url->link('extension/extension', 'token=' . $this->session->data['token'] . '&type=module', true);


    if(isset($this->request->post['telegram_boot_token'])) {
			$data['telegram_boot_token'] = $this->request->post['telegram_boot_token'];
		} elseif ($this->config->get('telegram_boot_token')){
			$data['telegram_boot_token'] = $this->config->get('telegram_boot_token');
		} else {
			$data['telegram_boot_token'] = '';
    }
    
    if(isset($this->request->post['telegram_order_alert'])) {
			$data['telegram_order_alert'] = $this->request->post['telegram_order_alert'];
		} elseif ($this->config->get('telegram_order_alert')){
			$data['telegram_order_alert'] = $this->config->get('telegram_order_alert');
		} else {
			$data['telegram_order_alert'] = '';
    }
    
    if(isset($this->request->post['telegram_customer_alert'])) {
			$data['telegram_customer_alert'] = $this->request->post['telegram_customer_alert'];
		} elseif ($this->config->get('telegram_customer_alert')){
			$data['telegram_customer_alert'] = $this->config->get('telegram_customer_alert');
		} else{
			$data['telegram_customer_alert'] = '';
    }
    
    if(isset($this->request->post['telegram_status'])) {
			$data['telegram_status'] = $this->request->post['telegram_status'];
		} elseif ($this->config->get('telegram_status')){
			$data['telegram_status'] = $this->config->get('telegram_status');
		} else{
			$data['telegram_status'] = '';
    }
    
    if(isset($this->request->post['telegram_chat_ids'])) {
			$data['telegram_chat_ids'] = $this->request->post['telegram_chat_ids'];
		} elseif ($this->config->get('telegram_chat_ids')){
			$data['telegram_chat_ids'] = $this->config->get('telegram_chat_ids');
		} else{
			$data['telegram_chat_ids'] = '';
    }
    
    if(isset($this->request->post['telegram_return_alert'])) {
			$data['telegram_return_alert'] = $this->request->post['telegram_return_alert'];
		} elseif ($this->config->get('telegram_return_alert')){
			$data['telegram_return_alert'] = $this->config->get('telegram_return_alert');
		} else{
			$data['telegram_return_alert'] = '';
    }
    
    if(isset($this->request->post['telegram_meassage'])) {
			$data['telegram_meassage'] = $this->request->post['telegram_meassage'];
		} elseif ($this->config->get('telegram_meassage')){
			$data['telegram_meassage'] = $this->config->get('telegram_meassage');
		} else{
			$data['telegram_meassage'] = '';
    }
    
    if(isset($this->request->post['telegram_new_account_meassage'])) {
			$data['telegram_new_account_meassage'] = $this->request->post['telegram_new_account_meassage'];
		} elseif ($this->config->get('telegram_new_account_meassage')){
			$data['telegram_new_account_meassage'] = $this->config->get('telegram_new_account_meassage');
		} else{
			$data['telegram_new_account_meassage'] = '';
    }
    
    $data['header'] =      $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] =      $this->load->controller('common/footer');

    $this->response->setOutput($this->load->view('extension/module/telegram', $data));
  }
    public function install(){
      $this->load->model('extension/event');
      $this->model_extension_event->addEvent('telegram', 'catalog/model/checkout/order/addOrderHistory/after', 'extension/module/telegram/sendOrderAlert');
      $this->model_extension_event->addEvent('telegram', 'catalog/model/account/customer/addCustomer/after', 'extension/module/telegram/sendAccountAlert');
      $this->model_extension_event->addEvent('telegram', 'catalog/model/account/return/addReturn/after', 'extension/module/telegram/sendReturnProductAlert');
    }

    public function uninstall(){
	    $this->load->model('extension/event');
        $this->model_extension_event->deleteEvent('telegram');
    }

    protected function validate() {

      if (!$this->user->hasPermission('modify', 'extension/module/telegram')) {
        $this->error['warning'] = $this->language->get('error_permission');
      }
  
      if (!$this->request->post['telegram_boot_token']) {
        $this->error['telegram_boot_token'] = $this->language->get('error_no_key');
      }
  
      return !$this->error;
    }

}
