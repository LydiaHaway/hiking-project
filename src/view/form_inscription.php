<form class="form-user" method="POST" action="form_inscription">
    <div class="form-row">
        <label for="firstname">Prénom </label>
        <input type="text" name="firstname">
    </div>

        <div class="form-row">
        <label for="lastname">Nom </label>
        <input type="text" name="lastname">
    </div>

        <div class="form-row">
        <label for="nickname">Login </label>
        <input type="text" name="nickname">
    </div>

        <div class="form-row">
        <label for="email">Email </label>
        <input type="email" name="email">
    </div>

        <div class="form-row">
        <label for="password">Mot de passe </label>
        <input type="password" name="password">
    </div>

    <input type="hidden" name="is_admin" value="0">

    <div class="form-row">
    <button type="submit">S'inscrire</button>
    </div>
</form>