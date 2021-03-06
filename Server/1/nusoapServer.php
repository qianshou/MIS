<?php
	require_once('function.php');
	require_once('./lib/nusoap.php');
	$server = new soap_server;
    //避免乱码
    $server->soap_defencoding = 'UTF-8';
    $server->decode_utf8 = false;
    $server->xml_encoding = 'UTF-8';

    //开启接口服务
    $server->configureWSDL('student_judge');
    $server->configureWSDL('student_get_my_info');
    $server->configureWSDL('student_update_my_info');
    $server->configureWSDL('student_update_my_pwd');
    $server->configureWSDL('admin_judge');
    $server->configureWSDL('admin_info');
    $server->configureWSDL('get_stu_list');
    $server->configureWSDL('get_stu_info');
    $server->configureWSDL('get_stu_info_by_name');
    $server->configureWSDL('student_update_my_info');
    $server->configureWSDL('admin_delete_stu');
    $server->configureWSDL('admin_add_stu');
    $server->configureWSDL('admin_update_stu_pwd');
    $server->configureWSDL('admin_update_pwd');

    $server->configureWSDL('Web Service');


    //注册相关接口
    $server->register( 'student_judge',array("sid"=>"xsd:string","password"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'student_get_my_info',array("sid"=>"xsd:string","password"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'student_update_my_info',array("sid"=>"xsd:string","password"=>"xsd:string","name"=>"xsd:string","sex"=>"xsd:int","idnum"=>"xsd:string","email"=>"xsd:string","phone"=>"xsd:string","addr"=>"xsd:string","pic"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'student_update_my_pwd',array("sid"=>"xsd:string","password"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'admin_judge',array("username"=>"xsd:string","password"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'admin_info',array("username"=>"xsd:string","password"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'get_stu_list',array("username"=>"xsd:string","password"=>"xsd:string","type"=>"xsd:string","value"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'get_stu_info',array("username"=>"xsd:string","password"=>"xsd:string","sid"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'get_stu_info_by_name',array("username"=>"xsd:string","password"=>"xsd:string","name"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'admin_update_stu_info',array("username"=>"xsd:string","password"=>"xsd:string","sid"=>"xsd:string","name"=>"xsd:string","sex"=>"xsd:int","idnum"=>"xsd:string","email"=>"xsd:string","phone"=>"xsd:string","addr"=>"xsd:string","pic"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'admin_delete_stu',array("username"=>"xsd:string","password"=>"xsd:string","sid"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'admin_add_stu',array("username"=>"xsd:string","password"=>"xsd:string","sid"=>"xsd:string","upassword"=>"xsd:string","name"=>"xsd:string","sex"=>"xsd:int","idnum"=>"xsd:string","email"=>"xsd:string","phone"=>"xsd:string","addr"=>"xsd:string","pic"=>"xsd:string"),array("return"=>"xsd:string"));
    $server->register( 'admin_update_stu_pwd',array("username"=>"xsd:string","password"=>"xsd:string","sid"=>"xsd:string","upassword"=>"xsd:string"),array("return"=>"xsd:string"));
     $server->register( 'admin_update_pwd',array("username"=>"xsd:string","password"=>"xsd:string","npassword"=>"xsd:string"),array("return"=>"xsd:string"));

    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';

    $server->service($HTTP_RAW_POST_DATA);
?>