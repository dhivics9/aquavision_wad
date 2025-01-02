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

        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>PH Level</td>
                    <td>{{ $data->ph_level }}</td>
                </tr>
                <tr>
                    <td>Turbidity</td>
                    <td>{{ $data->turbidity }}</td>
                </tr>
                <tr>
                    <td>Temperature</td>
                    <td>{{ $data->temperature }}</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>{{ $data->color }}</td>
                </tr>
                <tr>
                    <td>TDS</td>
                    <td>{{ $data->tds }}</td>
                </tr>
                <tr>
                    <td>Hardness</td>
                    <td>{{ $data->hardness }}</td>
                </tr>
                <tr>
                    <td>Nitrate</td>
                    <td>{{ $data->nitrate }}</td>
                </tr>
                <tr>
                    <td>Nitrite</td>
                    <td>{{ $data->nitrite }}</td>
                </tr>
                <tr>
                    <td>Ammonia</td>
                    <td>{{ $data->ammonia }}</td>
                </tr>
                <tr>
                    <td>Chloride</td>
                    <td>{{ $data->chloride }}</td>
                </tr>
                <tr>
                    <td>Sulfate</td>
                    <td>{{ $data->sulfate }}</td>
                </tr>
                <tr>
                    <td>Fluoride</td>
                    <td>{{ $data->fluoride }}</td>
                </tr>
                <tr>
                    <td>Iron</td>
                    <td>{{ $data->iron }}</td>
                </tr>
                <tr>
                    <td>Manganese</td>
                    <td>{{ $data->manganese }}</td>
                </tr>
                <tr>
                    <td>Coliform Total</td>
                    <td>{{ $data->coliform_total }}</td>
                </tr>
                <tr>
                    <td>E Coli</td>
                    <td>{{ $data->e_coli }}</td>
                </tr>
                
            @endforeach
        </tbody>
    </table>
</body>

</html>
