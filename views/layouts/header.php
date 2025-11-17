
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset }}/css/style.css">
</head>
<body>
    <nav>
        <ul>
            {% if session.privilege_id != 1 %}
                {% if session.user_id %}
                <li><a href="{{ base }}/client/order?id={{session.user_id}}">Accueil</a></li> 
                {% else %}
                <li><a href="{{ base }}">Accueil</a></li> 
                {% endif %}             
            <li><a href="{{base}}/user/create">S'inscrire</a></li> 
            {% endif %}
            {% if guest %}
            <li><a href="{{base}}/login">Se connecter</a></li> 
            {% else %} 
            <li><a href="{{base}}/logout">Se déconnecter</a></li> 
            {% endif %}   
            {% if session.privilege_id == 1 %} 
            <li><a href="{{base}}/admin/manage">Rédiger</a></li>
            <li><a href="{{base}}/admin/add">Ajouter</a></li>
            <li><a href="{{base}}/admin/log">Journal</a></li>
            {% endif %}
        </ul>
        <ul>
            <a href="{{base}}/client/show"><img src="{{ asset }}/img/basket-black.svg" alt="Panier" /></a>             
        </ul>  
    </nav>
   
    {% if guest is empty %}
        Bienvenue {{ session.name }}
    {% endif %}