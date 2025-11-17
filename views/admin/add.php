{{ include('layouts/header.php', {title:'Ajouter un livre'})}}
<h1>Bibliothèque municipale</h1>

<div class="grid" >
     
        <div class="container">
        <form method="post">            
            <h2>Ajouuter un livre</h2>
            <label>Titre
                <input type="text" name="titre">
            </label>
            <label>Description
                <input type="text" name="description">
            </label>
            <label>Pages
                <input type="text" name="pages">
            </label>
            <label>Image
                <input type="text" name="image">
            </label>
            <label>Catégorie
                <input type="text" name="categorie">
            </label>
            <label>Auteur
                <input type="textl" name="auteur">
            </label>
            <label>Éditeur
                <input type="text" name="editeur">
            </label>
                   
            <input type="submit" class="btn" value="Ajouter">
        </form>
        </div> 
 </div>
{{ include('layouts/footer.php')}}