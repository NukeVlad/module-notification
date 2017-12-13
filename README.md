# module-notification
Module for NukeViet CMS 4.X

Cài đặt ở module cần ghi thông báo như đoạn code dưới đây

if( isset( $site_mods['notification'] ) )
{
    require_once NV_ROOTDIR . '/modules/notification/notification.php';
    $message = sprintf( $lang_module['note_notification'], $content );
    save_notification( $message, $client_info['referer'], 'fa fa-user', $name );
}
`
