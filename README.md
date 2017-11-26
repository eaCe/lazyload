Redaxo 5 Addon - LazyLoad
=================================

Dieses Addon erstellt einen Mediatypen mit dem Namen „lazyimage“. Bei Verwendung dieses Typen werden Bilder in einer maximalen Höhe vom 100px und einem Weichzeichner ausgeliefert. Die Dateigröße liegt dadurch irgendwo zwischen 1kb und 5kb.

Wird auf der Settings-Seite des Addons die Option „Automatisch CSS und JavaScript einbinden“ gewählt, werden die benötigten Ressourcen im Frontend eingebunden.

Der img-Tag sollte dann, je nach dem, etwa so aussehen:

```html
<img src="index.php?rex_media_type=lazyimage&rex_media_file=bild.jpg" alt="mein Bild" data-src="tatsächlicher-bild-pfad.jpg" class="b-lazy">
```

oder: 

```html
<img src="meineseite.de/images/lazyimage/bild.jpg" data-src="meineseite.de/media/bild.jpg" alt="mein Bild" class="b-lazy">
```

### Base64 

Um den initialen Ladevorgang zu beschleunigen stehen nun zwei Funktionen im Frontend zur Verfügung. Diese geben einen base64 String zurück und können direkt im src Attribut ausgegeben werden.

Die kleinste und schnellste Lösung gibt einen leeren base64-Bild-String zurück:
```php
lazyload::getEmptyBase64();
```
Die zweite Variante gibt das zuvor verkleinerte und verschwommene Bild als base64-String zurück.
```php
lazyload::getBase64('images/lazyimage/bild.jpg');
```
oder:
```php
lazyload::getBase64('index.php?rex_media_type=lazyimage&rex_media_file=bild.jpg');
```

### Events 

Nach dem erfolgreichen Laden eines Bildes wird das „lazyLoaded“ Event getriggert. Dieser gibt auch das Bildelement zurück auf das wie folgt zugegriffen werden kann.

```javascript
window.addEventListener("lazyLoaded", function (event)
{
    console.log(event.detail);
});
```
oder:
```javascript
jQuery(window).on("lazyLoaded", function (event)
{
    console.log(event.originalEvent.detail);
});
```

### Sonstiges

Weiter können bisher schon ein paar Einstellungen vorgenommen werden.

Informationen dazu findet Ihr auch hier: [bLazy](http://dinbror.dk/blog/blazy/)


![Screenshot](https://raw.githubusercontent.com/eaCe/lazyload/assets/screen.jpg)

___
### Credits

- [bLazy](https://github.com/dinbror/blazy)