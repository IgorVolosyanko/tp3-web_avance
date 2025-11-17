{{ include('layouts/header.php', {title:'manage'})}}
    <h1>Bibliothèque municipale</h1>
    
    <main>
    <div class="contener-card">
        <aside class="filter" data-filtre>
          <a href="#" data-categorie="Tous">Tous</a>
          <a href="#" data-categorie="Nouveautés">Nouveautés</a>
          <a href="#" data-categorie="Littérature">Littérature</a>
          <a href="#" data-categorie="Art de vivre">Art de vivre</a>
          <a href="#" data-categorie="BD, Jeunesse, Humour"
            >BD, Jeunesse, Humour</a
          >
          <a href="#" data-categorie="Culture et société">Culture et société</a>
          <a href="#" data-categorie="Loisirs, Tourisme, Nature"
            >Loisirs, Tourisme, Nature</a
          >
          <a href="#" data-categorie="Savoir et science">Savoir et science</a>
        </aside>
        
        <div class="grid" data-conteneur-livres>
            
            {% for book in books %}
             
            <div class="card">
                <img src="{{asset}}{{book.image}}" alt="">
                <p>{{book.titre}}</p>               
                <a href="{{base}}/admin/edit?id={{ book.id }}" class="btn block" style="width: 155px">Rédiger</a>
                <form action="{{base}}/admin/delete" method="POST">
                    <input type="hidden" name="id" value="{{book.id}}">
                    <input type="submit" value="Supprimer" class="btn">
                </form>                
            </div>    
            
            {% endfor %}
            
        </div>
    </div>
        </main>
    <br><br>
    
    
{{ include('layouts/footer.php')}}