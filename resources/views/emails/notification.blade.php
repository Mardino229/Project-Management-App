<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email</title>
</head>
<body>
    <div class="flex justify-center w-full p-4 mb-2">
        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
    </div>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <div>
        <a href="{{route("task-management")}}" class="text-blue-600 font-bold">Consultez votre liste de tâche. !!!</a>
    </div>
    <p>L'équipe de Teamsync à votre service. !!!</p>
</body>
</html>
