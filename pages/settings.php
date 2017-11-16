<?php
$content = '<div id="lazyload-wrapper">';

if (rex_post('config-submit', 'boolean'))
{
    $this->setConfig(rex_post('config', [
        ['lazyload_injectjs', 'string'],
        ['lazyload_offset', 'string'],
        ['lazyload_selector', 'string'],
        ['lazyload_delay', 'string']
    ]));

    $content .= rex_view::info('Änderung gespeichert');
}

$content .= '
<form action="' . rex_url::currentBackendPage() . '" method="post" id="lazyload_settings">
    <fieldset>
        <dl class="rex-form-group form-group">
            <dd>
                <div class="checkbox">
                    <label>
                        <input class="rex-form-text" type="checkbox" id="rex-form-lazyload_injectjs" name="config[lazyload_injectjs]" value="1" ';
                        if ($this->getConfig('lazyload_injectjs') == "1")
                        {
                            $content .= 'checked="checked"';
                        }
                        $content .= ' />
                        <span>';
                            $content .= "<strong>" . $this->i18n("lazyload_injectjs") . "</strong>";
                        $content .= '
                        </span>
                    </label>
                </div>
            </dd>
        </dl>
        <dl class="rex-form-group form-group">
            <dd>
                <div class="checkbox">
                    <label for="rex-form-lazyload_offset">
                        <strong>
                        ' . $this->i18n("lazyload_offset") . '
                        </strong><br>
                        <input class="rex-form-text form-control" type="text" id="rex-form-lazyload_offset" name="config[lazyload_offset]" placeholder="default: 100" value="';
$content .= $this->getConfig('lazyload_offset');
$content .= '" />
                    </label>
                    <p><i>
                        ' . $this->i18n("lazyload_offset_info") . '
                    </i></p>
                </div>
            </dd>
        </dl>
        <dl class="rex-form-group form-group">
            <dd>
                <div class="checkbox">
                    <label for="rex-form-lazyload_selector">
                        <strong>
                        ' . $this->i18n("lazyload_selector") . '
                        </strong><br>
                        <input class="rex-form-text form-control" type="text" id="rex-form-lazyload_selector" name="config[lazyload_selector]" placeholder="default: .b-lazy" value="';
$content .= $this->getConfig('lazyload_selector');
$content .= '" />
                    </label>
                    <p><i>
                        ' . $this->i18n("lazyload_selector_info") . '
                    </i></p>
                </div>
            </dd>
        </dl>
        <dl class="rex-form-group form-group">
            <dd>
                <div class="checkbox">
                    <label for="rex-form-lazyload_delay">
                        <strong>
                        ' . $this->i18n("lazyload_delay") . '
                        </strong><br>
                        <input class="rex-form-text form-control" type="text" id="rex-form-lazyload_delay" name="config[lazyload_delay]" placeholder="default: 25" value="';
$content .= $this->getConfig('lazyload_delay');
$content .= '" />
                    </label>
                    <p><i>
                        ' . $this->i18n("lazyload_delay_info") . '
                    </i></p>
                </div>
            </dd>
        </dl>
        <dl class="rex-form-group form-group">
            <dd>
                <button class="btn btn-save" type="submit" name="config-submit" value="1" title="' . $this->i18n('com_auth_config_save') . '">' . $this->i18n('lazyload_save') . '</button>
            </dd>
        </dl>

    </fieldset>    
</form>
</div>';

$fragment = new rex_fragment();
$fragment->setVar('class', 'edit');
$fragment->setVar('title', $this->i18n('lazyload_title'));
$fragment->setVar('body', $content, false);
echo $fragment->parse('core/page/section.php');

?>

<style>

    #lazyload_settings label 
    {
        padding-left: 0;
    }

    #lazyload_settings input 
    {
        margin-left: 0;
        position: relative;
    }

    #lazyload_settings input[type=text]
    {
        margin-top: 5px;
        width: 250px;
    }

    #lazyload_settings i 
    {
        color: #888888;
    }

    #lazyload_settings #lazyload_injectjs
    {
        width: 250px;
        padding: 20px;
    }

    #lazyload_settings b
    {
        color: red;
    }

</style>

<script>
    var jSaveInfo = jQuery("#lazyload-wrapper .alert-info");

    window.setTimeout(function()
    {
        jSaveInfo.slideUp();
    }, 2000);
</script>

