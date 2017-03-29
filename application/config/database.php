<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

if(ENVIRONMENT == 'production')
{

	// $db['default']['hostname'] = 'us-cdbr-azure-west-c.cloudapp.net';
	// $db['default']['username'] = 'b7fe759e067bc4';
	// $db['default']['password'] = '43d39743';
	// $db['default']['database'] = 'zion';
	$db['default']['hostname'] = '127.0.0.1:53946';
	$db['default']['username'] = 'azure';
	$db['default']['password'] = '6#vWHD_$';
	$db['default']['database'] = 'localdb';

}
else
{
	// $db['default']['hostname'] = 'us-cdbr-azure-west-c.cloudapp.net';
	// $db['default']['username'] = 'b7fe759e067bc4';
	// $db['default']['password'] = '43d39743';
	// $db['default']['database'] = 'zion';

	$db['default']['hostname'] = '127.0.0.1:53946';
	$db['default']['username'] = 'azure';
	$db['default']['password'] = '6#vWHD_$';
	$db['default']['database'] = 'localdb';

}


// if(ENVIRONMENT == 'production')
// {

// 	$db['default']['hostname'] = '10.184.104.87:47141';
// 	$db['default']['username'] = 'bd7bba72dc1b56';
// 	$db['default']['password'] = '32df5d74';
// 	$db['default']['database'] = 'heroku_eaed7eee8f00c7d';
// }
// else
// {
// 	$db['default']['hostname'] = '10.184.104.87:47141';
// 	$db['default']['username'] = 'bd7bba72dc1b56';
// 	$db['default']['password'] = '32df5d74';
// 	$db['default']['database'] = 'heroku_eaed7eee8f00c7d';

// }




// if(ENVIRONMENT == 'production')
// {

// 	$db['default']['hostname'] = 'localhost';
// 	$db['default']['username'] = 'root';
// 	$db['default']['password'] = 'root';
// 	$db['default']['database'] = 'library';
// }
// else
// {
// 	$db['default']['hostname'] = 'localhost';
// 	$db['default']['username'] = 'root';
// 	$db['default']['password'] = 'root';
// 	$db['default']['database'] = 'library';

// }

$db['default']['dbdriver'] = 'mysql';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

//end of database.php