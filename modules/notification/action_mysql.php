<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Mr.Thang (kid.apt@gmail.com)
 * @Copyright (C) 2017 Mr.Thang. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 10-01-2017 20:08
 */

if ( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data;

$sql_create_module = $sql_drop_module;

//Пресс-релиз
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  message varchar(255) NOT NULL,
  url varchar(255) NOT NULL,
  icon varchar(255) NOT NULL,
  author varchar(255) NOT NULL,
  adminid_send mediumint(8) unsigned NOT NULL DEFAULT '0',
  addtime int(10) unsigned NOT NULL DEFAULT '0',
  showview tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT 'Kiểu hiển thị - 0 hien 1 lan, 1 hien vs khach lan dau truy cap',
  allowed_view varchar(255) DEFAULT '0' COMMENT 'Nhóm được xem thông báo này',
  status tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
)ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'timeview', '20')";
$sql_create_module[] = "INSERT INTO " . NV_CONFIG_GLOBALTABLE . " (lang, module, config_name, config_value) VALUES ('" . $lang . "', '" . $module_name . "', 'timeout', '5')";
