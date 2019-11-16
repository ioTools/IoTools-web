<section id="login">
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--7-col" 
            style="text-align:center">
        <br><br><br><br>
        <h2 class="style-text-red">Accedi</h2>
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
                print_r($admins);
                /*for ($i=0; $i < count($admins); $i++){
                    echo "<option value='".$admins[$i][0]."'>".$admins[$i][3]."</option>";
                }*/
                ?>
            </select>
            <label class="mdl-textfield__label" for="admin">Administrators</label>
            </div>
            <br>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="password" id="password" name="password" required="">
            <label class="mdl-textfield__label" for="password">Password</label>
            </div>
            <div>
            <button class="style-button-red" type="submit">ENTRA</button><br>
            <button class="style-button-white" onclick="location.href='index.php'" type="reset">INDIETRO</button>
            </div>
        </form>

        </div>
        <div class="mdl-cell mdl-cell--5-col mdl-cell--hide-phone" style="background:url('img/abstract.svg');background-repeat:no-repeat;background-size:contain;text-align:center">
        <img src="imgs/iot.png" 
            class="style-home-image"
            onclick="openImage('iot.png')" 
            style="width:80%"></img>
        </div>
    </div>
</section>