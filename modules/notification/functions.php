<?php

/**
 * @Project NUKEVIET 4.x
 * @Author Mr.Thang (kid.apt@gmail.com)
 * @Copyright (C) 2017 Mr.Thang. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 10-01-2017 20:08
 */

if ( ! defined( 'NV_SYSTEM' ) ) die( 'Stop!!!' );
 
define( 'NV_IS_MOD_MESSAGE', true );

//require_once ( NV_ROOTDIR . "/modules/" . $module_file . "/global.functions.php" );

/**
 * initial_config_data()
 * 
 * @return
 */
function initial_config_data ()
{
    global $module_data;
    
    $sql = "SELECT `config_name`,`config_value` FROM `" . NV_PREFIXLANG . "_" . $module_data . "_config`";
    
    $list = nv_db_cache( $sql );

    $module_setting = array();
    foreach ( $list as $values )
    {
        $module_setting[$values['config_name']] = $values['config_value'];
    }

    return $module_setting;
}

if ( $op == "main" )
{
    $messalias = "";
    $nv_vertical_menu = array();
	
    if ( ! empty( $array_op ) )
    {
        $messalias = isset( $array_op[0] ) ? $array_op[0] : "";
    }
        
    if ( !empty( $messalias ) and defined ( "NV_IS_USER" ) and preg_match( "/^([a-z0-9\-\_\.]+)$/i", $messalias ) and ( $messalias != "config" ) ) 
	{
		$query = "SELECT a.id, a.title, a.alias, a.description, a.send_time, a.send_name, b.viewed  FROM `" . NV_PREFIXLANG . "_" . $module_data . "` AS a INNER JOIN `" . NV_PREFIXLANG . "_" . $module_data . "_status` AS b ON a.id=b.messid WHERE a.alias=" . $db->quote( $messalias ) . " AND b.user_id=" . $user_info['userid'] . " AND a.status=1";
		
		if ( ( $result = $db->query( $query ) ) === false )
		{
			Header( "Location: " . NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name );
			exit();
		}
		if ( ( $messdata = $result->fetch() ) === false )
		{
			Header( "Location: " . NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&" . NV_NAME_VARIABLE . "=" . $module_name );
			exit();
		}

		$op = "detail";
            
		$array_mod_title[] = array( 
			'catid' => $messdata['id'], 
			'title' => $messdata['title'], 
			'link' => NV_BASE_SITEURL . "index.php?" . NV_LANG_VARIABLE . "=" . NV_LANG_DATA . "&amp;" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=" . $messdata['alias'] 
        );

		sort( $array_mod_title, SORT_NUMERIC );
    }
}

?>