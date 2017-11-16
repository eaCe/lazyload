<?php

rex_extension::register('OUTPUT_FILTER', function(rex_extension_point $ep)
{
    $addon = rex_addon::get('lazyload');

    $selector = (!is_null($addon->getConfig('lazyload_selector'))) ? $addon->getConfig('lazyload_selector') : ".b-lazy";
    $offset = (!is_null($addon->getConfig('lazyload_offset'))) ? $addon->getConfig('lazyload_offset') : 100;
    $delay = (!is_null($addon->getConfig('lazyload_delay'))) ? $addon->getConfig('lazyload_delay') : 25;
    
    $subject = $ep->getSubject();
    $domd = new DOMDocument();
    libxml_use_internal_errors(true);
    $domd->loadHTML($subject);
    libxml_use_internal_errors(false);

    //append css
    $head = $domd->getElementsByTagName("head")->item(0);
    $styleElement = $domd->createElement("link");
    $styleElement->setAttribute("rel", "stylesheet");
    $styleElement->setAttribute("href", rex_url::addonAssets("lazyload", 'blazy.min.css'));
    
    $head->appendChild($styleElement);

    //append js
    $body = $domd->getElementsByTagName("body")->item(0);
    $scriptElement = $domd->createElement("script");
    $scriptElement->setAttribute("type", "text/javascript");
    $scriptElement->setAttribute("src", rex_url::addonAssets("lazyload", 'blazy.min.js'));

    $scriptContainer = $domd->createElement("script");
    $scriptContainer->setAttribute("type", "text/javascript");
       
    $bLazyScript = $domd->createTextNode("new Blazy({selector: '". $selector ."', offset: ". intval($offset) .", delay: " . intval($delay) . "});");
    $scriptContainer->appendChild($bLazyScript);
    $body->appendChild($scriptElement);
    $body->appendChild($scriptContainer);

    //output modified dom
    $ep->setSubject($domd->saveHTML());
});
?>