{{ include('layouts/header.php', { title: 'Admin Journal' }) }}
<br>
<a href="{{base}}/admin/log/pdf" class="btn btn-primary" target="_blank">
     Exporter en PDF
</a>
<h1>Bibliothèque municipale</h1>
        <h1>Journal de bord</h1>        
        <table>
        <tr>
            <th>Name</th>
            <th>IP</th>
            <th>URL</th>
            <th>Date</th>
        </tr>
        {% for activity in activities %}
        <tr>
            <td>{{ activity.nom }}</a></td>
            <td>{{ activity.ip }}</td>
            <td>{{ activity.url }}</td>
            <td>{{ activity.date }}</td>
        </tr>
        {% endfor %}
    </table>

{{ include('layouts/footer.php') }}