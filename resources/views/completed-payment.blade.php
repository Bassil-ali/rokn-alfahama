<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>payment completed</title>
    <style>
        body {
            background-color: rgb(241, 241, 241);
        }

        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;

        }

        .inner-center {
            height: 140px;
            width: 900px;
            background-color: #ffffff;
            box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
        }

        .error-happend {
            border: red 1px solid;
            color: red;

        }

        .success-happend {
            border: rgb(100 191 71) 1px solid;
            color: rgb(100 191 71);

        }


        .button {
            text-decoration: none;
            background: #c99820;
            color: #FFF;
            border-radius: 50px;

            line-height: 1.4;
            transition: 300ms;
            background: var(--c3);
            /* display: block; */
            border-radius: 0;
            font-size: 1.09rem;
            background: linear-gradient(35deg, #efc64c 0%, #7c4707 118.6%, #e9bb42 77.21%, #efc64c 100%);
            display: inline-block;
            border: 1px solid var(--c2);
            padding: .5rem .8rem;
            border-radius: 6px;
            font-size: .9rem;
        }

        button.button {

            background: #c99820;
            color: #FFF;
            border-radius: 50px;

            line-height: 1.4;
            transition: 300ms;
            background: var(--c3);
            /* display: block; */
            border-radius: 0;
            font-size: 1.09rem;
            background: linear-gradient(35deg, #efc64c 0%, #7c4707 118.6%, #e9bb42 77.21%, #efc64c 100%);
        }

        button.button:hover {
            color: rgb(41, 40, 40);
            cursor: pointer;
        }

    </style>
</head>

<body>
    <div class="center-screen">
        <div class="inner-center">
            @if ($status != 200)
                <div class="error-happend">
                    <h1> {{ $description }}</h1>
                </div>
            @else
                <div class="success-happend">
                    <h1> {{ $description }}</h1>
                </div>

            @endif
            <div style="margin-top: 10px">
                <a class="button" href="/main">main</a>
            </div>

        </div>
    </div>
</body>


</html>
