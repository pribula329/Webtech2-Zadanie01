<?php
$vstupnePole = scandir('/home/xpribulal/public_html/pribulikZadanie01/files', 1);
$vstupnePole = array_diff($vstupnePole, array('.', '..'));
echo '
<section >
<h2>Uložené súbory</h2>
<div class="tabulka">
<div id="pokus"></div>
<table   class=" table sortable  table-striped" id="table">
<thead class="table-dark">
    <tr>
    <th scope="col">Názov súboru </th>
    <th scope="col">Veľkosť súboru </th>
    <th scope="col">Dátum uploadu súboru </th>
    </tr>
</thead>
<tbody >';
foreach ($vstupnePole as $subor) {
    $FileType = strtolower(pathinfo($subor,PATHINFO_EXTENSION));

    if($FileType==""){
        echo '
            <tr>
                <td>' .$subor.'</td>
                <td></td>
                <td></td>
            </tr>
            ';
    }

 else{
    echo '
            <tr>
                <td>' .$subor.'</td>
                <td>' .filesize("files/" . $subor)." B".'</td>
                <td>' .date("d F Y H:i:s.", fileatime("files/" . $subor)).'</td>
            </tr>';
     }
}
echo '
</tbody>
</table>
</div>
</section>';