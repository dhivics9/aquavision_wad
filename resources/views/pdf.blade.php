<!-- filepath: /D:/laragon/www/aquavision_wad/resources/views/pdf.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Embedded CSS for PDF styling -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center">{{ $title }}</h1>
    <p>{{ $date }}</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">{{ $dataOneTitle }}</th>
                @if (isset($dataTwoTitle))
                    <th scope="col">{{ $dataTwoTitle }}</th>
                @endif
                @if (isset($dataThreeTitle))
                    <th scope="col">{{ $dataTwoTitle }}</th>
                @endif
                <th scope="col">Analysis</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td scope="col">{{ $dataOne }}</td>
                @if (isset($dataTwo))
                    <th scope="col">{{ $dataTwo }}</th>
                @endif
                @if (isset($dataThree))
                    <th scope="col">{{ $dataThree }}</th>
                @endif
                <td>{{ $analysis }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
