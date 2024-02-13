<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    <?php if ($action == "create"){ ?>
        <input type="hidden" name="action" value="create"/>
    <?php }
    else { ?>
        <input type="hidden" name="action" value="edit"/>
        <input type="hidden" name="id" value="<?php echo $formData[0] ?>"/>
    <?php } ?>
    <div class="mb-3">
        <label for="firstname" class="form-label">Vorname</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo (isset($formData[1])) ? $formData[1] : "" ?>">
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Nachname</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo (isset($formData[2])) ? $formData[2] : "" ?>">
    </div>
    <div class="mb-3">
        <label for="dob" class="form-label">Geburtsdatum</label>
        <input type="date" class="form-control" id="dob" name="dob" value="<?php echo (isset($formData[3])) ? $formData[3] : "" ?>">
    </div>
    <button type='submit' class='btn btn-primary'>Speichern</button>
    <a href='dbDemo-href-form-school.php' class='btn btn-secondary'>Abbrechen</a>
</form>