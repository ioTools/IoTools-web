<div style="text-align:center">
  <h2 class="mdl-color-text--grey-800">Tools</h2>
  <button class="style-button-red" onclick="newAttrezzatura()">NEW</button>
</div>

<div style="overflow:auto">
  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:95%;margin:10px">
    <thead>
      <tr style="text-align:left">
        <th class="style-td">ID</th>
        <th class="style-td">Tool</th>
        <th class="style-td">Special Equipment</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $checkingExists = false;

        $attr = getTools(null, $db_conn);
        for ($i=0; $i < count($attr); $i++){
          $checkingExists = true;
          $id = $attr[$i][0];
          $nome = $attr[$i][1];
          $speciale = $attr[$i][2];
          $speciale = ($speciale) ? "SI": "NO";
          echo '<tr>
              <td class="style-td">'.$id.'</td>
              <td class="style-td">'.$nome.'</td>
              <td class="style-td">'.$speciale.'</td>
              <td class="style-td"><a onclick="alertDeleteAttrezzatura('.$id.')" style="color:red;cursor:pointer;text-decoration:underline">Delete</a></td>
              </tr>';
        }
       ?>
    </tbody>
  </table>
    <div style="text-align:center">
    <?php
        if(!$checkingExists){
        echo "<h5 class='style-text-darkblue'>There aren't any tools yet</h5>";
        }
    ?>
    </div>
</div>

<script>
  var attrezzatura = '';
  function newAttrezzatura(){
    this.attrezzatura =
    '<div class="mdl-card mdl-shadow--8dp" style="border-radius:20px;padding:20px;width:85%;min-height:200px;display:inline-block;margin:20px;text-align:center">'+
    '<h3>Add new tools</h3>'+
    '<br>'+
    '<form method="post" action="core/controllers/newAttrezzatura.php" enctype="multipart/form-data">' +
    '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
    '<p class="mdl-color-text--grey-900">Tools</p>'+
    '<input class="mdl-textfield__input" type="text" id="attrezzatura" name="attrezzatura" style="outline:none" required="">'+
    '</div><br>'+
    '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
    '<select class="mdl-textfield__input" id="speciale" name="speciale" required="" style="outline:none">'+
    '<option value="1">SI</option>'+
    '<option value="0">NO</option>'+
    '</select>'+
    '</div><br>'+
    '<button class="style-button-red" name="salva" id="salva" type="submit">SAVE</button>'+
    '<button class="style-button-red" name="annulla" id="annulla" type="reset" onclick=newAttrezzaturaModal.close()>BACK</button>'+
    '</form>';
    newAttrezzaturaModal.open();
  }
  var newAttrezzaturaModal = new tingle.modal({
        closeMethods: ['overlay', 'button', 'escape'],
        closeLabel: "Chiudi",
        onOpen: function() {
            newAttrezzaturaModal.setContent(
                attrezzatura
            );
        },
        onClose: function() {
            console.log('modal closed');
        }
    });
</script>
