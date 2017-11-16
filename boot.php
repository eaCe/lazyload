<?php

if (!rex::isBackend())
{ 
    
    if ($this->getConfig('lazyload_injectjs') == '1')
    {
        include_once('lib/lazyload.php');
    }
}
?>