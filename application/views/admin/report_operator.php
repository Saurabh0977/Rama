<html>

<head>
    <link rel="stylesheet" type="text/css">
    <style>
        table,
        th,
        td {
            border: 1px solid black;

        }

        table {
            width: 80%;

        }

        table {
            border-collapse: collapse;
        }

        th {
            font-size: 12px;

        }

        .list th {
            background-color: steelblue;
            color: white;
        }

        .list {
            margin-top: 10px;
        }
    </style>
</head>

<body>


    <h3 class="heading1" align="center" style="padding:10px;">Operator Report</h3>
    <div>
        <?php 

							if (empty($expense)) {
								echo "<h2 align='center'>No Data found</h2>";
							} else {

								?>
        <h5 style="margin-left:80px;">
            <?php

											echo "Operator Name : ";
											echo ucfirst($expense[0]->NAME);

											?>

        </h5>
    </div>

    <table class="list" align="center">

        <thead>
            <tr>
                <th>ID</th>
                <th>DESCRIPTION</th>
                <th>SPENT ON</th>
                <th>EXPENSES ( Rs )</th>
            </tr>
        </thead>



        <?php 
							$i = 1;
							foreach ($expense as $expenses) {
								?>

        <tr>
            <td style="text-align:center;">
                <?php echo $i; ?>
            </td>
            <td>
                <?php echo $expenses->DESCRIPTION; ?>
            </td>
            <td align="center">
                <?php echo date('d/m/Y', strtotime($expenses->CREATED_AT)); ?>
            </td>
            <td style="text-align:right;padding-right:20px;">
                <?php 
															echo number_format($expenses->AMOUNT, 2); ?>
            </td>


        </tr>
        <?php 
							$i++;
						}
					}
					?>


    </table>
</body>

</html>