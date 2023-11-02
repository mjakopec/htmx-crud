<?php
/*This  is form for new entry - it is linked with insert script*/
echo "<form class='row g-3 centered'>
<input class='form-control' type='hidden' name='id'><br/>
    <div class='col-md-6'>
    <label class='form-label'>Ime</label>
    <input class='form-control' type='text' name='fname' ><br/>
    </div>
    <div class='col-md-6'>
    <label class='form-label'>Prezime</label>
    <input class='form-control' type='text' name='lname' ><br/>
    </div>
    <div class='col-md-6'>
    <label class='form-label'>Email</label>
    <input class='form-control' type='text' name='email' ><br/>
    </div>
    <div class='col-md-12'>
    <input class='btn btn-danger' type='button' hx-target='#holder' hx-swap='innerHTML' hx-get='./actions/blank.php' value='Cancel'>
    <input class='btn btn-primary' type='button' hx-swap='beforeend' hx-target='tbody' hx-post='./actions/insert.php' value='Insert'>
    </div>
</form>";