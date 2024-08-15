<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wempo-Tempo</title>

    <link rel="icon" href="https://icons.iconarchive.com/icons/iconarchive/childrens-book-animals/128/Camel-icon.png"
        type="image/png">

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #333;
            /* Dark background color */
            color: #fff;
            /* Light text color */
        }

        h1 {
            text-align: center;
            font-size: 2em;
        }

        @media screen and (max-width: 600px) {
            h1 {
                font-size: 1.5em;
            }
        }
    </style>
</head>

<body>
    <h1>I'm Online ^_^</h1>
</body>

<script>
    //logo remover
    function deleteTheLogo() {
        var allDivs = document.querySelectorAll('div');
        if (allDivs[allDivs.length - 1] && allDivs[allDivs.length - 1].querySelector('a')) {
            let a = allDivs[allDivs.length - 1].querySelector('a');
            if (a.querySelector('img')) {
                allDivs[allDivs.length - 1].remove();
            }
        }
    }
    window.onload = deleteTheLogo();
</script>

</html>
