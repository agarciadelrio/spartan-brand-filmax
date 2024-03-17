<?php
define('DEV', TRUE);
$version = trim(file_get_contents(ROOT.'/brand/version.txt'));
define('CONF',[
  #'api_endpoint' => 'http://0.0.0.0:8070/api/v2',
  'api_endpoint' => 'http://erp.elqueque.com/api/v2',
  'api_key' => '34053d70-b2b0-4e57-a603-bfc3cbcf8086', // EDEN
  #'api_key' => '2f67a9d9-c345-4c87-898d-2515b4019cf6', // MOOBY
  #'api_key' => '4e96f785-6e4b-4323-a306-0ad4e229ad9c', // FILMAX
  'lang' => ['es','en','ca'],
  'default_lang' => 'en',
  'locales_map' => [
    'es' => 'es_ES',
    'en' => 'en_GB',
    'ca' => 'ca_ES',
  ]
]);
setlocale(LC_ALL, CONF['locales_map']['en']);