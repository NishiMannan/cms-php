<?php




ob_start();
 //require __DIR__ . '/vendor/autoload.php';
require 'Pusher/vendor/autoload.php';
  $options = array(
    'cluster' => 'us2',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'caeebda509aa2036ec33',
    '0e421191fcc5de6be59e',
    '1143085',
    $options
  );

  $data['message'] = "User already exist";

if(strlen($username)<4)
{
$data['message'] = "Username too short";
	
}
  $pusher->trigger('channel-1', 'event-1', $data);

?>
