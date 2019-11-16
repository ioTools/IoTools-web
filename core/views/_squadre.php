<div style="text-align:center">
  <h2 class="mdl-color-text--grey-800">Squad</h2>
  <button class="style-button-red" onclick="newSquadre()">NEW</button>
</div>

<div style="overflow:auto">
  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:95%;margin:10px">
    <thead>
      <tr style="text-align:left">
        <th class="style-td">ID</th>
        <th class="style-td">Squad</th>
        <th class="style-td">Van</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $checkingExists = false;

        $attr = getSquad(null, $db_conn);
        for ($i=0; $i < count($attr); $i++){
          $checkingExists = true;
          $id = $attr[$i][0];
          $squadra = $attr[$i][1];
          $furgone = $attr[$i][2];
          echo '<tr>
              <td class="style-td">'.$id.'</td>
              <td class="style-td">'.$squadra.'</td>
              <td class="style-td">'.$furgone.'</td>
              <td class="style-td"><a onclick="alertDeleteSquadra('.$id.')" style="color:red;cursor:pointer;text-decoration:underline">Delete</a></td>
              </tr>';
        }
       ?>
    </tbody>
  </table>
    <div style="text-align:center">
    <?php
        if(!$checkingExists){
        echo "<h5 class='style-text-darkblue'>There aren't any squad yet</h5>";
        }
    ?>
    </div>
</div>

<script>
  var squadra = '';
  function newSquadre(){
    this.squadra =
    '<div class="mdl-card mdl-shadow--8dp" style="border-radius:20px;padding:20px;width:85%;min-height:200px;display:inline-block;margin:20px;text-align:center">'+
    '<h3>Add new squad</h3>'+
    '<br>'+
    '<form method="post" action="core/controllers/newSquadra.php" enctype="multipart/form-data">' +
    '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
    '<p class="mdl-color-text--grey-900">Squad name</p>'+
    '<input class="mdl-textfield__input" type="text" id="squadra" name="squadra" style="outline:none" required="">'+
    '</div><br>'+
    '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
    '<select class="mdl-textfield__input" id="furgone" name="furgone" required="" style="outline:none">'+
    <?php
      $furgone = getVans(null, $db_conn);
      $selected = '';
      for ($i=0;$i<count($furgone);$i++){
        if ($i == count($furgone) -1){
          $selected = 'selected';
        }
        echo "'".'<option value="'.$furgone[$i][0].'" '.$selected.'>'.$furgone[$i][1]."</option>'+";
        $selected = '';
      }
     ?>
    '</select>'+
    '</div><br>'+
    '<button class="style-button-red" name="salva" id="salva" type="submit">SAVE</button>'+
    '<button class="style-button-red" name="annulla" id="annulla" type="reset" onclick=newSquadraModal.close()>BACK</button>';
    newSquadraModal.open();
  }
  var newSquadraModal = new tingle.modal({
        closeMethods: ['overlay', 'button', 'escape'],
        closeLabel: "Chiudi",
        onOpen: function() {
            newSquadraModal.setContent(
                squadra
            );
        },
        onClose: function() {
            console.log('modal closed');
        }
    });
</script>
