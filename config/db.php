<?php

//return [
//    'class' => 'yii\db\Connection',
//    'dsn' => 'oci:dbname=10.2.10.128/XE;charset=UTF8',
//    'username' => 'AUTORIZACAO',
//    'password' => 'AUTORIZACAO',
//    'charset' => 'UTF8',
//    'enableSchemaCache' => true,   
//    'schemaCacheDuration' => 3600,   
//    'schemaCache' => 'cache',
//];

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'oci:dbname=tcmdb.cy8ep9k6o8za.sa-east-1.rds.amazonaws.com:1521/prdp;charset=UTF8',
    'username' => 'SPE_APURACAO',
    'password' => 'tcmpa321',
    'charset' => 'UTF8', 
    'enableSchemaCache' => true,    
    'schemaCacheDuration' => 3600,    
    'schemaCache' => 'cache',
];
