<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>
        O nome da pessoa é: {{ $data['nome'] }} <br>

        {{ $mensagem }} <br>

        @foreach($alunos as $aluno)
        O nome do aluno é: {{$aluno}} <br>

            @if($aluno == 'Gustavo')
                <strong>Esse é o melhor aluno</strong> <br>
            @endif

        @endforeach
    </p>
</body>
</html>
