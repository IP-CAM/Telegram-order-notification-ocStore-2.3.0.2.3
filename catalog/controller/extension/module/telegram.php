<?php
class ControllerExtensionModuleTelegram extends Controller{
//Формирование сообщения о заказе
  public function sendOrderAlert(&$route, &$data, &$output){
    $order_id = $data[0];
    $this->load->model('checkout/order');
    $order_info = $this->model_checkout_order->getOrder($order_id);

    $this->load->model('setting/setting');
    $setting = $this->model_setting_setting->getSetting('telegram');

    if (isset($setting['telegram_order_alert'])) {
      $this->load->model('account/order');
      if (count($this->model_account_order->getOrderHistories($order_id)) <= 1) {
        $message = $this->replaceMessage($setting['telegram_meassage'],$order_info);
        $this->sendMessagetoTelegam($message);
      }
      $order_products = $this->model_account_order->getOrderProducts($order_id);
      $products = $this->bulidProducts($order_products);
      $this->sendMessagetoTelegam($products);
    }
  }

//Формирование сообщения о регистрации нового пользователя
  public function sendAccountAlert(&$route, &$data, &$output){

    $this->load->model('setting/setting');
    $setting = $this->model_setting_setting->getSetting('telegram');
    if (isset($setting['telegram_customer_alert'])) {
      $message = $this->replaceMessage($setting['telegram_new_account_meassage'],$data[0]);
      $this->sendMessagetoTelegam( $message);
    }
  }
//Формирование сообщения о возврате товара
  public function sendReturnProductAlert(&$data,&$output)
  {
    $this->load->model('setting/setting');
    $setting = $this->model_setting_setting->getSetting('telegram');
    if (isset($setting['telegram_return_alert'])) {
        $message = "запрос возврата \n ";
        $this->sendMessagetoTelegam( $message);
    }
  }

  // Отправка сообщения в Telegram
  public function sendMessagetoTelegam($msg)
  {
      $this->load->model('setting/setting');
      $setting = $this->model_setting_setting->getSetting('telegram');
      //print_r($setting);
      $botToken = $setting['telegram_boot_token'];
      $website = "https://api.telegram.org/bot" . $botToken;
      $chatIds = $setting['telegram_chat_ids'];  //Receiver Chat Id
      $this->initMessage($botToken, $chatIds, $msg);
  }

  private function initMessage($botToken, $chatID, $msg)
  {
      $website = "https://api.telegram.org/bot" . $botToken;
      $params = [
          'chat_id' => $chatID,
          'text' => $msg,
      ];
      $ch = curl_init($website . '/sendMessage');
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close($ch);
//            var_dump($result);
//            exit;
  }



  public function replaceMessage($string,$arr){
    return   $str = preg_replace_callback('/{(\w+)}/', function($match) use($arr) {
        return $arr[$match[1]];
    }, $string );
  }

  protected function  bulidProducts($products){
    $pr = array();
    foreach ($products as $product){
        $pr[] = "Name : $product[name]  \n    Price: $product[price] \n qty : $product[quantity] ";
    }
    return implode("------- \n",$pr);
  }



}