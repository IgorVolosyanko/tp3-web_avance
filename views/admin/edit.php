{{ include('layouts/header.php', {title:'Client Show'})}}
<h1>Bibliothèque municipale</h1>

<div class="grid" >
      
      {% if book.id %}
        <div class="card">
            <img src="{{asset}}{{book.image}}" alt="img">
            <h3>{{book.titre}}</h3>
            <p style="max-width: 200px">{{book.description}}</p>           
        </div> 
      {% endif %} 
        <div class="form-describe">
            <form method="post">            
                <h2>Rédiger la description</h2>
                <label>Nouvelle description
                <br>
                <textarea type="text" name="description" cols="40" rows="20" 
                placeholder="{{book.description}}"></textarea value="{{book.description}}">                    
                </label>                                                 
                <br>
                <input type="submit" class="btn" value="Modifier">
            </form>
        </div> 
 </div>
{{ include('layouts/footer.php')}}