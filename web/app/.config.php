<?php
return array (
  'profile' => 
  array (
    'oj-name' => 'Universal Online Judge',
    'oj-name-short' => 'UOJ',
    'administrator' => 'root',
    'admin-email' => 'admin@local_uoj.ac',
    'QQ-group' => '',
    'ICP-license' => '',
  ),
  'database' => 
  array (
    'database' => 'app_uoj233',
    'username' => 'root',
    'password' => 'root',
    'host' => '127.0.0.1',
  ),
  'web' => 
  array (
    'domain' => NULL,
    'main' => 
    array (
      'protocol' => 'http',
      'host' => UOJContext::httpHost(),
      'port' => 80,
    ),
    'blog' => 
    array (
      'protocol' => 'http',
      'host' => UOJContext::httpHost(),
      'port' => 80,
    ),
  ),
  'security' => 
  array (
    'user' => 
    array (
      'client_salt' => 'fOUTUrVeea8HR2PSRd0al7lodiUYLyA2',
    ),
    'cookie' => 
    array (
      'checksum_salt' => 
      array (
        0 => 'DMibj9YkGvtZvQDb',
        1 => 'w2KKujRhEtRzXUXH',
        2 => 'sLyIPWwuc5u3SF8g',
      ),
    ),
  ),
  'mail' => 
  array (
    'noreply' => 
    array (
      'username' => 'tangzhongsi@zju.edu.cn',
      'password' => '7ujk0o2396',
      'host' => 'smtp.zju.edu.cn',
      'secure' => 'ssl',
      'port' => 994,
    ),
  ),
  'judger' => 
  array (
    'socket' => 
    array (
      'port' => '2333',
      'password' => 'UGi4vsgvdHtSpVOp8Ms23qvtD3vWTLxc',
    ),
  ),
  'switch' => 
  array (
    'web-analytics' => false,
    'blog-domain-mode' => 3,
  ),
);
