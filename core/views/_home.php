<div style="overflow:auto">
    <h3 class="mdl-color-text--grey-800" style="text-align:center">Global History</h3>
    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:95%;margin:10px">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tools</th>
          <th>Equipe</th>
          <th>Departed</th>
          <th>Maps</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $checkingExists = false;

        $attr = getEvento(null, $db_conn);
        for ($i=0; $i < count($attr); $i++){
          $checkingExists = true;
          $id = $attr[$i][0];
          $idAttrezzo = $attr[$i][1];
          $time = $attr[$i][2];
          $idFurgone = $attr[$i][3];
          $lat = $attr[$i][4];
          $long = $attr[$i][5];
          echo '<tr>
              <td class="style-td">'.$id.'</td>
              <td class="style-td">'.getTools($idAttrezzo, $db_conn)[0][1].'</td>
              <td class="style-td">'.getVans($idFurgone, $db_conn)[0][1].'</td>
              <td class="style-td">'.$time.'</td>
              <td class="style-td"><a href="" onclick="alert('."'Position: ".$lat.", ".$long."'".')">Position</a></td>
              <td class="style-td"><a onclick="alertDeleteWorkers('.$id.')" style="color:red;cursor:pointer;text-decoration:underline">Delete</a></td>
              </tr>';
        }
       ?>
        
      </tbody>
    </table>
</div>