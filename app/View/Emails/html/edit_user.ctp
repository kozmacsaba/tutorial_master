A kovetekzo fel hasznalo modositotta az adait <b><?= $username ?></b>.
<br><br>
Ezzek az adatok modsultak:<br>
<table>
    <?php if(!empty($first_name)): ?>
    <tr>
        <td><b>First name:</b> <?= $first_name ?></td>
    </tr>
    <?php endif; ?>
    <?php if(!empty($last_name)): ?>
    <tr>
        <td><b>Last name:</b> <?= $last_name ?></td>
    </tr>
    <?php endif; ?>
    <?php if(!empty($edit_username)): ?>
    <tr>
        <td><b>Username:</b> <?= $edit_username ?></td>
    </tr>
    <?php endif; ?>
    <?php if(!empty($email)): ?>
    <tr>
        <td><b>E-mail:</b> <?= $email; ?></td>
    </tr>
    <?php endif; ?>
</table>
<br>
