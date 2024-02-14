# medw4

## ue03-server-side-rendering

In der `db.php` Username und Passwort setzen:

````php
$user = "";
$pwd = "";
````

## ue04-read-ajax

In der `tabledata.php` Username und Passwort setzen:

````php
$user = "";
$pwd = "";
````

In der `tabledata.js` URL ergänzen:

````javascript
url: 'http://127.0.0.1/.../tabledata.php'
````

## ue04-create-ajax

Anpassung wie unter **ue04-read-ajax** vornehmen. Das Skript ermöglicht ausschließlich das Erstellen eines Eintrages.
Die Ausgabe der Tabelle ist nicht implementiert.

## ue04-update-ajax

Anpassung wie unter **ue04-read-ajax** vornehmen. Das Erstellen eines Eintrages ist nicht implementiert.

## ue04-update-create-ajax

Anpassung wie unter **ue04-read-ajax** vornehmen. Das Löschen eines Studenten ist nicht implementiert. Außerdem ist das
Modal 2x enthalten, was etwas Quick & Dirty ist. Das könnte/sollte man konsolidieren.