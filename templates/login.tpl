{include file="header.tpl" }

<form action="verificar" method="post">

<h1>Ingrese a nuestra comunidad de Muay-Thai</h1>
    <div class="container">
        <label for="email">E-Mail</label>
        <input type="email" id="email" placeholder="E-Mail" name="email" required>

        <label for="pass">Password</label>
        <input type="password" id="pass" placeholder="Contraseña" name="pass" required>
<div class="alert-error">
{if $error}
    {$error}
    </div>
{/if}
        <button type="submit">Login</button>
    </div>
</form>


{include file="footer.tpl" }
