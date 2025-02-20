<?php

// dito nakalagay ang controller para magamit sa laravel
namespace App\Http\Controllers;

use Illuminate\Http\Request;

// controller para sa computation
class OperationController extends Controller
{
    // function para sa pag-compute ng dalawang operations gamit ang apat na numbers.
    public function calculate($operation1, $num1, $num2, $operation2, $num3, $num4)
    {
        // function para sa operation na gagawin
        function performOperation($operation, $num1, $num2)
        {
            // di pwedeng mag-divide sa zero kaya magdidisplay ng error message
            if ($operation === 'divide' && $num2 == 0) {
                return ['error' => 'Error: You cannot divide by zero.'];
            }

            // switch case para sa options ng operation na gagamitin/gagawin
            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    $result = $num1 / $num2;
                    break;
                default:
                    return ['error' => 'Error: Wrong operation.'];
            }

            return ['result' => $result];
        }

        // para sa first computation
        $firstCalculation = performOperation($operation1, $num1, $num2);
        if (isset($firstCalculation['error'])) {
            return response($firstCalculation['error'], 400);
        }
        $firstResult = $firstCalculation['result'];

        // and para naman sa second computation
        $secondCalculation = performOperation($operation2, $num3, $num4);
        if (isset($secondCalculation['error'])) {
            return response($secondCalculation['error'], 400);
        }
        $secondResult = $secondCalculation['result'];

        // dito dedepende kung anong kulay ng background ang lalabas (green kung even, blue kung odd)
        $firstBgColor = ($firstResult % 2 == 0) ? 'green' : 'blue';
        $secondBgColor = ($secondResult % 2 == 0) ? 'green' : 'blue';

        // dito naman is para sa text (orange kung even, blue kung odd)
        $num1Color = ($num1 % 2 == 0) ? 'orange' : 'blue';
        $num2Color = ($num2 % 2 == 0) ? 'orange' : 'blue';
        $num3Color = ($num3 % 2 == 0) ? 'orange' : 'blue';
        $num4Color = ($num4 % 2 == 0) ? 'orange' : 'blue';

        // para sa pag-display ng result gamit HTML at Bootstrap para sa styling
        return "
<html>
<head>
    <title>Computation</title>
    <!-- Bootstrap CSS para sa styling -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'>
</head>
<body class='container mt-4'>
    <h2 class='mb-4'>Jericho Cansino, BSIT 3E</h2>

    <!-- para sa pag-display ng first operation -->
    <div class='mb-3'>
        <h3>Operation 1: $operation1</h3>
        <p>Value 1: <span class='fw-bold' style='color: $num1Color;'>$num1</span></p>
        <p>Value 2: <span class='fw-bold' style='color: $num2Color;'>$num2</span></p>
        <p>Result:</p>
        <!-- dito lalabas yung result ng first computation -->
        <div class='d-inline-block p-3 fs-5 fw-bold border text-white text-center' style='background-color: $firstBgColor; width: 120px;'>
            $firstResult
        </div>
    </div>

    <!-- and para naman sa second operation -->
    <div>
        <h3>Operation 2: $operation2</h3>
        <p>Value 1: <span class='fw-bold' style='color: $num3Color;'>$num3</span></p>
        <p>Value 2: <span class='fw-bold' style='color: $num4Color;'>$num4</span></p>
        <p>Result:</p>
        <!-- dito naman lalabas yung result ng second computation -->
        <div class='d-inline-block p-3 fs-5 fw-bold border text-white text-center' style='background-color: $secondBgColor; width: 120px;'>
            $secondResult
        </div>
    </div>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>";
    }
}
