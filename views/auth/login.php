{{ include('layouts/header.php', {title:'Se connecter'})}}
    <div class="container">
        
        {% if errors is defined %}
        <div class="error">
            <ul>
                {% for error in errors %}
                <li>{{ error }}</li>
                {% endfor %}
            </ul>
        </div>
        {% endif %}
        
        <form method="post">
            <h2>Se connecter</h2>
            <label>Nom d'utilisateur
                <input type="name" name="nom_utilisateur" value="{{user.nom_utilisateur}}">
            </label>
            <label>Password
                <input type="password" name="password" >
            </label>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
{{ include('layouts/footer.php')}}