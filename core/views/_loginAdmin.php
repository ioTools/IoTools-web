<section id="login">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--7-col" 
            style="text-align:center">
        <br><br><br><br>
        <h2 class="style-text-red">Login</h2>
        <form action="" method="POST" style="text-align:center">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input style-text-color-grey" id="admin" name="admin" required="" style="outline:none">
                <option value="empty">---</option>
                <?php
                // variabile $error_message situata in dbConnection.php
                if ($error_message) {
                    echo "
                    <script>
                        window.onload = function(){
                        flatAlert('Accesso', 'Impossibile connettersi al database', 'error', 'index.php');
                        }
                    </script>";
                }
           
                $admins = getAdmins(null, $db_conn);
                for ($i=0; $i < count($admins); $i++){
                    echo "<option value='".$admins[$i][0]."'>".$admins[$i][3]."</option>";
                }
                ?>
            </select>
            <label class="mdl-textfield__label" for="admin">Administrators</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="password" id="password" name="password" required="">
            <label class="mdl-textfield__label" for="password">Password</label>
            </div>
            <p>
                Do you want to log in as a worker? <a href="login.php?user=vans" style="cursor:pointer">Click here</a>
            </p>
            <div>
            <button class="style-button-red" type="submit">LOGIN</button><br>
            <button class="style-button-white" onclick="location.href='index.php'" type="reset">BACK</button>
            </div>
        </form>

        </div>
        <div class="mdl-cell mdl-cell--5-col mdl-cell--hide-phone" style="background:url('imgs/abstract.svg');background-repeat:no-repeat;background-size:contain;text-align:center">
        <img src="imgs/admin.png" 
            class="style-home-image"
            onclick="openImage('admin.png')" 
            style="width:90%"></img>
        </div>
    </div>
</section>

<?php
  if(isset($_POST['password'])){
    // text_filter dell'input
    $id = text_filter($_POST["admin"]);
    if ($id == 'empty'){
      echo "
      <script>
      flatAlert('Seleziona l\'account', '', 'error', 'login.php?user=admin');
      </script>";
      return;
    }
    // md5 della password
    $password = text_filter_encrypt($_POST["password"]);
    // controlla la password
    $admin = checkAdminPassword($id, $password, $db_conn);
    if ($admin == false){
      echo "
      <script>
      flatAlert('Password errata', '', 'error', 'login.php?user=admin');
      </script>";
    }else{
      $_SESSION['ID'] = $admin[0][0];
      $_SESSION['Email'] = $admin[0][3];
      $_SESSION['user'] = "admin";
      $_SESSION['logged'] = true;
      echo "
      <script>
      flatAlert('Accesso eseguito con successo', '', 'success', 'core/log.php');
      </script>";
    }
  }

 ?>
