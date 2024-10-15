<!DOCTYPE html>
<html>
<head>
    <title>Fiche de Paie - {{ $employe->nom }} {{ $employe->prenom }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 12px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 0;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>KIMOASOFT</h1>
        <p>Adresse : Lomé, Togo - Tél: +228 91 06 72 54 / +228 70 35 73 90</p>
    </div>

    <h2>Fiche de Paie</h2>

    <table>
        <tr>
            <th>Nom</th>
            <td>{{ $employe->nom }}</td>
            <th>Prénom</th>
            <td>{{ $employe->prenom }}</td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $employe->telephone }}</td>
            <th>Email</th>
            <td>{{ $employe->email }}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td colspan="3">{{ $employe->adresse }}</td>
        </tr>
        <tr>
            <th>Poste</th>
            <td>{{ $employe->poste->titre }}</td>
            <th>Matricule</th>
            <td>{{ $employe->id }}</td>
        </tr>
    </table>


    <h3>Détails des Heures et du Salaire</h3>

    <table>
        <tr>
            <td><strong>Heures normales :</strong></td>
            <td>{{ $heuresNormales }} heures</td>
        </tr>
        <tr>
            <td><strong>Heures travaillées :</strong></td>
            <td>{{ $heuresTravailles }} heures</td>
        </tr>
        <tr>
            <td><strong>Heures de retard :</strong></td>
            <td>{{ $heuresRetard }} heures</td>
        </tr>
        <tr>
            <td><strong>Taux horaire :</strong></td>
            <td>{{ number_format($tauxHoraire, 2) }} FCFA/heure</td>
        </tr>
        <tr>
            <td><strong>Total à payer :</strong></td>
            <td>{{ number_format($totalAPayer, 2) }} FCFA</td>
        </tr>
    </table>


</body>
</html>
