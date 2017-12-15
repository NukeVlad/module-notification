# module-notification
Модуль Уведомление для NukeViet CMS 4.X

При установке в модуле необходимо написать строку в виде кода ниже:

if( isset( $site_mods['notification'] ) )
{
    require_once NV_ROOTDIR . '/modules/notification/notification.php';
    $message = sprintf( $lang_module['note_notification'], $content );
    save_notification( $message, $client_info['referer'], 'fa fa-user', $name );
}
`
