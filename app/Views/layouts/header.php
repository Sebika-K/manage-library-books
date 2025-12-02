<!DOCTYPE html>
<html>
<head>
        <title>Library Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #CDF6FF;
            margin: 0;
            padding: 20px;
        }

        h1, h2 {
            color: #333;
        }

        /* Orange button */
        .btn-primary {
            background-color: #F4862C;
            border: none;
            padding: 10px 18px;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background-color: #d46f1c;
        }

        /* Table styling */
        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 6px;
            overflow: hidden;
        }

        th {
            background-color: #F4862C;
            color: white;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background-color: #fdf3ea;
        }

        /* Form styling */
        form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 50%;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 14px;
            border: 1px solid #aaa;
            border-radius: 6px;
        }

        button {
            background-color: #F4862C;
            border: none;
            padding: 10px 18px;
            color: white;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        button:hover {
            background-color: #d46f1c;
        }

        .container {
            padding: 10px;
        }

        .flash {
            padding: 10px;
            background: #F4862C;
            color: white;
            width: fit-content;
            border-radius: 6px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📚 Library Book Manager</h2>
    <hr>