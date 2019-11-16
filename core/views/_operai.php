<div style="text-align:center">
  <h2 class="mdl-color-text--grey-800">Workers</h2>
  <button class="style-button-red" onclick="newOperai()">NEW</button>
</div>

<div style="overflow:auto">
  <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp" style="width:95%;margin:10px">
    <thead>
      <tr style="text-align:left">
        <th class="style-td">ID</th>
        <th class="style-td">Name</th>
        <th class="style-td">Surname</th>
        <th class="style-td">Phone number</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $checkingExists = false;

        $attr = getWorkers(null, $db_conn);
        for ($i=0; $i < count($attr); $i++){
          $checkingExists = true;
          $id = $attr[$i][0];
          $nome = $attr[$i][1];
          $cognome = $attr[$i][2];
          $cellulare = $attr[$i][3];
          $idSquadra = $attr[$i][4];
          echo '<tr>
              <td class="style-td">'.$id.'</td>
              <td class="style-td">'.$nome.'</td>
              <td class="style-td">'.$cognome.'</td>
              <td class="style-td">'.$cellulare.'</td>
              <td class="style-td">'.$idSquadra.'</td>
              <td class="style-td"><a onclick="alertDeleteWorkers('.$id.')" style="color:red;cursor:pointer;text-decoration:underline">Delete</a></td>
              </tr>';
        }
       ?>
    </tbody>
  </table>
    <div style="text-align:center">
    <?php
        if(!$checkingExists){
        echo "<h5 class='style-text-darkblue'>There aren't workers yet</h5>";
        }
    ?>
    </div>
</div>

<script>
  var operai = '';
  function newOperai(){
    this.operai =
    '<div class="mdl-card mdl-shadow--8dp" style="border-radius:20px;padding:20px;width:85%;min-height:200px;display:inline-block;margin:20px;text-align:center">'+
    '<h3>Add new worker</h3>'+
    '<br>'+
    '<form method="post" action="core/controllers/newWorker.php" enctype="multipart/form-data">' +
    '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">'+
    '<p class="mdl-color-text--grey-900">Name</p>'+
    '<input class="mdl-textfield__input" type="text" id="nome" name="nome" style="outline:none" required="">'+
    '</div><br>'+
    '<p class="mdl-color-text--grey-900">Surname</p>'+
    '<input class="mdl-textfield__input" type="text" id="cognome" name="cognome" style="outline:none" required="">'+
    '</div><br>'+
    '<p class="mdl-color-text--grey-900">Phone</p>'+
    '<input class="mdl-textfield__input" type="text" id="cellulare" name="cellulare" style="outline:none" required="">'+
    '</div><br>'+
    '<button class="style-button-red" name="salva" id="salva" type="submit">SAVE</button>'+
    '<button class="style-button-red" name="annulla" id="annulla" type="reset" onclick=newOperaiModal.close()>BACK</button>';
    newOperaiModal.open();
  }
  var newOperaiModal = new tingle.modal({
        closeMethods: ['overlay', 'button', 'escape'],
        closeLabel: "Chiudi",
        onOpen: function() {
            newOperaiModal.setContent(
                operai
            );
        },
        onClose: function() {
            console.log('modal closed');
        }
    });
</script>
