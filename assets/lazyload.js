window.onload = function ()
{
    window.bLazy = new Blazy(
    {
        selector: layzySelector,
        offset: layzyOffset,
        delay: layzyDelay,
        success: function (el)
        {
            window.dispatchEvent(new CustomEvent('lazyLoaded', {detail: el}));
        },
        error: function (e)
        {
            console.log('Blazy - error loading image: ', e);
        }
    });
};