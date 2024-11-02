<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Economy Merge For v2</title>
    <meta name="description" content="This is a mini project to create the foundations of the financial system.">
</head>
<body>
    <style>
        .container {
            width: 1600px;
            margin-left: auto;
            margin-right: auto;
            letter-spacing: 1px;
        }
        table {
            width: 100%;
        }
        th,td {
            text-align: center;
            padding: 15px;
        }
        button {
            padding: 5px;
        }
        tr:nth-child(odd) {
            background-color: rgb(200,200,200);
        }
        .autocomplete-suggestions {
            position: absolute;
            border: 1px solid #d4d4d4;
            background-color: #ffffff;
            max-height: 250px;
            overflow-y: auto;
            width: 300px;
            z-index: 1000;
        }

        .autocomplete-suggestion {
            padding: 8px;
            cursor: pointer;
        }

        .autocomplete-suggestion:hover {
            background-color: #e9e9e9;
        }
    </style>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Name Bill</th>
                    <th>Name EC</th>
                    <th>Place</th>
                    <th>From</th>
                    <th>Type</th>
                    <th>Cost</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tab">

            </tbody>
        </table>
    </div>
    <div id="autocomplete-list" class="autocomplete-suggestions"></div>
    <script src="./js/main.js"></script>
</body>
</html>