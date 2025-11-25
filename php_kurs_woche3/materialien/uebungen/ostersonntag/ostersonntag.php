<!DOCTYPE html>
<html lang="de">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Ostersonntag, Auswertung</title>
   <style>
      table,
      td {
         border: 1px solid black;
      }
   </style>
</head>

<body>
   <h2>Ostersonntag</h2>
   <?php
   /* Einbinden der Datei mit der Funktion ostersonntag() */
   include "ostersonntag.inc.php";

   /* Hat der Benutzer die beiden Jahreszahlen in der falschen Reihenfolge eingegeben,
      werden sie getauscht. */

   // Die Funktion intval() erzeugt aus den Strings, welche ein Formular liefert explizit den Datentyp Integer.
   $anfang = intval($_POST["anfang"]);
   $ende = intval($_POST["ende"]);

   // ? Hier bitte den Code zum Tauschen der Jahreszahlen einfügen
   if ($anfang > $ende) {
      [$anfang, $ende] = [$ende, $anfang];
   }


   $results = [];
   for ($jahr = $anfang; $jahr <= $ende; $jahr++) {
      ostersonntag($jahr, $tag, $monat);  // Referenzen

      $results[] = [
         'jahr'  => $jahr,
         'datum' => "$tag.$monat.$jahr"
      ];
   }
   // ? Und hier bitte den Code für die Tabelle einfügen
   ?>

   <table>
      <thead>
         <tr>
            <th>Jahr</th>
            <th>Datum</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($results  as $res): ?>
            <tr>
               <td><?= htmlspecialchars($res['jahr']) ?></td>
               <td><?= htmlspecialchars($res['datum']) ?></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>

   <?php


   /* Für jedes Jahr gibt es einen Durchlauf einer for-Schleife,
   jeweils mit einem Aufruf der Funktion ostersonntag() */

   // ? Nutzen Sie als Variablen für die Datumswerte bitte die Bezeichner $jahr, $monat bzw. $tag.


   /* In den beiden Variablen $tag und $monat sind nach jedem Aufruf der Funktion ostersonntag()
   die Werte für den Tag und den Monat des betreffenden Jahres per Referenz gespeichert. */

   ?>


</body>

</html>