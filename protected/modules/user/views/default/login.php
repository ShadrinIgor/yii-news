<form action="" method="post">
<table>
    <tr>
        <th>E-mail:</th>
        <td><input type="text" name="auth[email]" value="<?= ( !empty($data) ) ? $data["email"] : "" ?>" /></td>
    </tr>
    <tr>
        <th>Пароль:</th>
        <td><input type="password" name="auth[password]" /></td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" name="send_form" value="Войти" />
        </td>
    </tr>
</table>
</form>