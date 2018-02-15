
    <form action="index.php"
          method="post">
        <fieldset>
            <legend>Il te reste <?= $this::MAXTRIALS - $this->missed ?> essais pour sauver ta peau
            </legend>
            <div>
                <label for="triedLetter">Choisis ta lettre</label>
                <select name="triedLetter"
                        id="triedLetter">
                    <?php
                    for($i=0;$i<sizeof($this->allLetters);$i++){
                        $letter = $this->allLetters[$i];
                        echo "<option value='$letter'>$letter</option>";
                    }
                    ?>
                </select>
                <input type="hidden"
                       name="datas"
                       value='<?= $this->setSerializedDatas() ?>'>
                <input type="submit"
                       value="essayer cette lettre">
            </div>
        </fieldset>
    </form>