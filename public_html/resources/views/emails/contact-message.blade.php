<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Nouveau message de contact</title>
</head>
<body style="font-family: Arial, sans-serif; color: #111827;">
<h1>Nouveau message depuis le site</h1>

<p>
    <strong>Destinataire :</strong>
    {{ $recipient['label'] }}
</p>

<p>
    <strong>Motif :</strong>
    {{ $subjectLabel }}
</p>

<hr>

<p>
    <strong>Nom :</strong>
    {{ $data['lastname'] }}
</p>

<p>
    <strong>Prénom :</strong>
    {{ $data['firstname'] }}
</p>

<p>
    <strong>Email :</strong>
    {{ $data['email'] }}
</p>

@if (! empty($data['phone']))
    <p>
        <strong>Téléphone :</strong>
        {{ $data['phone'] }}
    </p>
@endif

<hr>

<p>
    <strong>Message :</strong>
</p>

<p style="white-space: pre-line;">
    {{ $data['message'] }}
</p>
</body>
</html>
