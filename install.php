<?php

function addEffects($valuesArray)
{
    $sql = rex_sql::factory();
    $sql->setTable(rex::getTablePrefix() . 'media_manager_type_effect');
    $sql->setValues($valuesArray);

    try
    {
        $sql->insert();
    }
    catch (rex_sql_exception $e)
    {
        $error = $sql->getError();
        throw new Exception($error);
    }
}

$mtypeSql = rex_sql::factory();
$mtypeSql->setQuery("INSERT IGNORE INTO `rex_media_manager_type`
    SET `name` = 'lazyimage',
    `description` = 'Ausgabe einer sehr kleinen Bilddatei';
");

$lazyloadId = $mtypeSql->getLastId();

if ($lazyloadId == 0)
{
    trigger_error("Der Mediatyp lazyimage existiert bereits!", E_USER_NOTICE);
}
else
{
    $resize = [
        'type_id' => $lazyloadId,
        'effect' => 'resize',
        'parameters' => '{"rex_effect_rounded_corners":{"rex_effect_rounded_corners_topleft":"","rex_effect_rounded_corners_topright":"","rex_effect_rounded_corners_bottomleft":"","rex_effect_rounded_corners_bottomright":""},"rex_effect_workspace":{"rex_effect_workspace_width":"","rex_effect_workspace_height":"","rex_effect_workspace_hpos":"left","rex_effect_workspace_vpos":"top","rex_effect_workspace_set_transparent":"colored","rex_effect_workspace_bg_r":"","rex_effect_workspace_bg_g":"","rex_effect_workspace_bg_b":""},"rex_effect_crop":{"rex_effect_crop_width":"","rex_effect_crop_height":"","rex_effect_crop_offset_width":"","rex_effect_crop_offset_height":"","rex_effect_crop_hpos":"center","rex_effect_crop_vpos":"middle"},"rex_effect_insert_image":{"rex_effect_insert_image_brandimage":"","rex_effect_insert_image_hpos":"left","rex_effect_insert_image_vpos":"top","rex_effect_insert_image_padding_x":"-10","rex_effect_insert_image_padding_y":"-10"},"rex_effect_rotate":{"rex_effect_rotate_rotate":"0"},"rex_effect_filter_colorize":{"rex_effect_filter_colorize_filter_r":"","rex_effect_filter_colorize_filter_g":"","rex_effect_filter_colorize_filter_b":""},"rex_effect_image_properties":{"rex_effect_image_properties_jpg_quality":"","rex_effect_image_properties_png_compression":"","rex_effect_image_properties_webp_quality":"","rex_effect_image_properties_interlace":null},"rex_effect_filter_brightness":{"rex_effect_filter_brightness_brightness":""},"rex_effect_flip":{"rex_effect_flip_flip":"X"},"rex_effect_filter_contrast":{"rex_effect_filter_contrast_contrast":""},"rex_effect_filter_sharpen":{"rex_effect_filter_sharpen_amount":"80","rex_effect_filter_sharpen_radius":"0.5","rex_effect_filter_sharpen_threshold":"3"},"rex_effect_resize":{"rex_effect_resize_width":"","rex_effect_resize_height":"100","rex_effect_resize_style":"maximum","rex_effect_resize_allow_enlarge":"enlarge"},"rex_effect_filter_blur":{"rex_effect_filter_blur_repeats":"50","rex_effect_filter_blur_type":"gaussian","rex_effect_filter_blur_smoothit":"10"},"rex_effect_mirror":{"rex_effect_mirror_height":"","rex_effect_mirror_set_transparent":"colored","rex_effect_mirror_bg_r":"","rex_effect_mirror_bg_g":"","rex_effect_mirror_bg_b":""},"rex_effect_header":{"rex_effect_header_download":"open_media","rex_effect_header_cache":"no_cache"},"rex_effect_convert2img":{"rex_effect_convert2img_convert_to":"jpg","rex_effect_convert2img_density":"150"},"rex_effect_mediapath":{"rex_effect_mediapath_mediapath":""},"rex_effect_define_quality":{"rex_effect_define_quality_quality":""}}',
        'priority' => '1'
    ];

    $blur = [
        'type_id' => $lazyloadId,
        'effect' => 'filter_blur',
        'parameters' => '{"rex_effect_rounded_corners":{"rex_effect_rounded_corners_topleft":"","rex_effect_rounded_corners_topright":"","rex_effect_rounded_corners_bottomleft":"","rex_effect_rounded_corners_bottomright":""},"rex_effect_workspace":{"rex_effect_workspace_width":"","rex_effect_workspace_height":"","rex_effect_workspace_hpos":"left","rex_effect_workspace_vpos":"top","rex_effect_workspace_set_transparent":"colored","rex_effect_workspace_bg_r":"","rex_effect_workspace_bg_g":"","rex_effect_workspace_bg_b":""},"rex_effect_crop":{"rex_effect_crop_width":"","rex_effect_crop_height":"","rex_effect_crop_offset_width":"","rex_effect_crop_offset_height":"","rex_effect_crop_hpos":"center","rex_effect_crop_vpos":"middle"},"rex_effect_insert_image":{"rex_effect_insert_image_brandimage":"","rex_effect_insert_image_hpos":"left","rex_effect_insert_image_vpos":"top","rex_effect_insert_image_padding_x":"-10","rex_effect_insert_image_padding_y":"-10"},"rex_effect_rotate":{"rex_effect_rotate_rotate":"0"},"rex_effect_filter_colorize":{"rex_effect_filter_colorize_filter_r":"","rex_effect_filter_colorize_filter_g":"","rex_effect_filter_colorize_filter_b":""},"rex_effect_image_properties":{"rex_effect_image_properties_jpg_quality":"","rex_effect_image_properties_png_compression":"","rex_effect_image_properties_webp_quality":"","rex_effect_image_properties_interlace":null},"rex_effect_filter_brightness":{"rex_effect_filter_brightness_brightness":""},"rex_effect_flip":{"rex_effect_flip_flip":"X"},"rex_effect_filter_contrast":{"rex_effect_filter_contrast_contrast":""},"rex_effect_filter_sharpen":{"rex_effect_filter_sharpen_amount":"80","rex_effect_filter_sharpen_radius":"0.5","rex_effect_filter_sharpen_threshold":"3"},"rex_effect_resize":{"rex_effect_resize_width":"","rex_effect_resize_height":"","rex_effect_resize_style":"maximum","rex_effect_resize_allow_enlarge":"enlarge"},"rex_effect_filter_blur":{"rex_effect_filter_blur_repeats":"50","rex_effect_filter_blur_type":"gaussian","rex_effect_filter_blur_smoothit":"10"},"rex_effect_mirror":{"rex_effect_mirror_height":"","rex_effect_mirror_set_transparent":"colored","rex_effect_mirror_bg_r":"","rex_effect_mirror_bg_g":"","rex_effect_mirror_bg_b":""},"rex_effect_header":{"rex_effect_header_download":"open_media","rex_effect_header_cache":"no_cache"},"rex_effect_convert2img":{"rex_effect_convert2img_convert_to":"jpg","rex_effect_convert2img_density":"150"},"rex_effect_mediapath":{"rex_effect_mediapath_mediapath":""},"rex_effect_define_quality":{"rex_effect_define_quality_quality":""}}',
        'priority' => '2'
    ];

    addEffects($resize);
    addEffects($blur);
}
