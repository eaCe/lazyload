<?php

rex_extension::register('OUTPUT_FILTER', function(rex_extension_point $ep)
{
    $addon = rex_addon::get('lazyload');

    $selector = (!is_null($addon->getConfig('lazyload_selector')) && $this->getConfig('lazyload_selector') !== "") ? $addon->getConfig('lazyload_selector') : ".b-lazy";
    $offset = (!is_null($this->getConfig('lazyload_offset')) && $this->getConfig('lazyload_offset') !== "") ? intval($this->getConfig('lazyload_offset')) : 100;
    $delay = (!is_null($addon->getConfig('lazyload_delay')) && $this->getConfig('lazyload_delay') !== "") ? intval($addon->getConfig('lazyload_delay')) : 50;
    
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
    $blazyScript = $domd->createElement("script");
    $blazyScript->setAttribute("type", "text/javascript");
    $blazyScript->setAttribute("src", rex_url::addonAssets("lazyload", 'blazy.min.js'));

    $lazyloadScript = $domd->createElement("script");
    $lazyloadScript->setAttribute("type", "text/javascript");
    $lazyloadScript->setAttribute("src", rex_url::addonAssets("lazyload", 'lazyload.min.js'));

    $lazyVarsContainer = $domd->createElement("script");
    $lazyVarsContainer->setAttribute("type", "text/javascript");
    $lazyVars = $domd->createTextNode("var layzySelector='". $selector ."',layzyOffset=". $offset .",layzyDelay=". $delay .";");
    $lazyVarsContainer->appendChild($lazyVars);
    
    $head->appendChild($lazyVarsContainer);
    $body->appendChild($blazyScript);
    $body->appendChild($lazyloadScript);

    //output modified dom
    $ep->setSubject($domd->saveHTML());
});
?>