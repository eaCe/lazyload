document.addEventListener('DOMContentLoaded', function ()
{
    var bLazy = new Blazy(
    {
        selector: '". $selector ."', 
        offset: ". intval($offset) .", 
        delay: " . intval($delay) . ", 
        error: function(e)
        {
            console.log('Blazy - error loading image: ', e);
        }
    });
                
    setTimeout(function ()
    {
        bLazy.revalidate();
    }, 100); 

});