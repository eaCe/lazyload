Redaxo 5 Addon - LazyLoad
=================================

Dieses Addon erstellt einen Mediatypen mit dem Namen „lazyimage“. Bei Verwendung dieses Typen werden Bilder in einer maximalen Höhe vom 100px und einem Weichzeichner ausgeliefert. Die Dateigröße liegt dadurch irgendwo zwischen 1kb und 5kb.

Wird auf der Settings-Seite des Addons die Option „Automatisch CSS und JavaScript einbinden“ gewählt, werden die benötigten Ressourcen im Frontend eingebunden.

Der img-Tag sollte dann, je nach dem, etwa so aussehen:

```html
<img src=“index.php?rex_media_type=lazyimage&rex_media_file=bild.jpg“ alt=“mein Bild“ data-src=“tatsächlicher-bild-pfad.jpg“ class=“b-lazy“>
```

oder: 

```html
<img src="meineseite.de/images/lazyimage/bild.jpg" data-src="meineseite.de/media/bild.jpg" alt="mein Bild" class="b-lazy">
```

Weiter können bisher schon ein paar Einstellungen vorgenommen werden.

Informationen dazu findet Ihr auch hier: [bLazy](http://dinbror.dk/blog/blazy/)


![Screenshot](https://raw.githubusercontent.com/eaCe/lazyload/assets/screen.jpg)

___
### Credits

- [bLazy](https://github.com/dinbror/blazy)