{{ include('layouts/header.php', {title:'Nouveau utilisateur'})}}
    
        
        {% if errors is defined %}
        <div class="error">
            <ul>
                {% for error in errors %}
                <li>{{ error }}</li>
                {% endfor %}
            </ul>
        </div>
        {% endif %}
    <div class="container">
        <form method="post">            
            <h2>Créer nouveau utilisateur</h2>
            <label>Nom
                <input type="text" name="nom" value="{{client.nom}}">
            </label>
            <label>Nom d'utilisateur
                <input type="text" name="nom_utilisateur" value="{{client.nom_utilisateur}}">
            </label>
            <label>Mot de passe
                <input type="text" name="password" value="{{client.password}}">
            </label>
            <label>Adresse
                <input type="text" name="adresse" value="{{client.adresse}}">
            </label>
            <label>Téléphon
                <input type="text" name="telephone" value="{{client.telephone}}">
            </label>
            <label>Courriel
                <input type="email" name="courriel" value="{{client.courriel}}">
            </label>
            <label>Privilege
                <select name="privilege_id">
                    <option value="">Select</option>
                    {% for privilege in privileges %}
                            <option value="{{privilege.id}}" {% if privilege.id == user.privilege_id %} selected {% endif %}>{{ privilege.privilege}}</option>
                    {% endfor %}
                </select>        
            <input type="submit" class="btn" value="Sauvegarder">
        </form>
    </div> 

</html>

{{ include('layouts/footer.php')}}