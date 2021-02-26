<?php
$directoryArray = scandir('/home/xpribulal/public_html/pribulikZadanie01/files', 1);
$directoryArray = array_diff($directoryArray, array('.', '..'));
echo '
<section>
<h2>Uložené súbory</h2>
<div class="tabulka">
<table   class=" table table-striped sortable " id="table">
<thead class="table-dark">
    <tr>
    <th scope="col">Názov súboru </th>
    <th scope="col">Veľkosť </th>
    <th scope="col">Dátum nahrania </th>
    </tr>
</thead>
<tbody >';
foreach ($directoryArray as $file) {

    $date = date_create();
    echo '
            <tr>
                <td>' .$file.'</td>
                <td>' .filesize("files/" . $file)." Bytes".'</td>
                <td>' .date("d F Y H:i:s.", fileatime("files/" . $file)).'</td>
            </tr>';
}
echo '
</tbody>
</table>
</div>
</section>';