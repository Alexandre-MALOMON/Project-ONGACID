<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
@php
use Carbon\Carbon;
setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
@endphp

<body style="background: #e5e5e5; padding: 30px;">

    <div style="max-width: 320px; margin: 0 auto; padding: 20px; background: #fff;border-radius: 20px;">
        <h3 style="text-align:center;">ONG ACID</h3>
        <div class="ticket-body">
            <table>
                <tbody style="align-item:center;">
                    <div>
                        Bonjour {{$payant['nom']}} {{$payant['prenom']}} voici votre passe</p>
                    </div>
                    <div>
                        <p>Lieu de la formation:  {{$payant['lieu']}}</p>
                    </div>
                    <div>
                        <p>Dqte de la formation:  {{date('d-m-Y',strtotime($payant['debut']))}}</p>
                    </div>
                    <div>
                        <p>Heure de la formation:  {{$payant['heure']}}</p>
                    </div>
                    @if ($payant['lien'])
                    <div>
                        <p>Lien de la formation:  <a href="{{$payant['lien']}}">Cliquez ici</a></p>
                    </div>
                    @endif
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
