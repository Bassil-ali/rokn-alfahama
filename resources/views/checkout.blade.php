<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>paymentCHeckout</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal&display=swap');

        * {
            font-family: Tajawal;
        }

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
            width: 900px;
            background-color: #ffffff;
            box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
            height: 127px;
        }

        .button {
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
    <script type="text/javascript" src="https://js.authorize.net/v3/AcceptUI.js" charset="utf-8">
    </script>
    {{-- <script type="text/javascript" src="https://jstest.authorize.net/v3/AcceptUI.js" charset="utf-8">
    </script> --}}
    <div class="center-screen">
        <div class="inner-center">
            <h2> {{ __('add your payment infotmation') }} </h2>
            <div>
                <form id="paymentForm" method="POST" action="/complete-payment/{{ request()->id }}">
                    @csrf
                    <input type="hidden" name="dataValue" id="dataValue" />
                    <input type="hidden" name="dataDescriptor" id="dataDescriptor" />
                    <button type="button" class="AcceptUI button"
                        data-billingAddressOptions='{"show":true, "required":false}' data-apiLoginID="9SFx6RK9vVb"
                        data-clientKey="6qn8LhgVL7mzX9ft7UmQ4jB9xxwKbAuJbRy5c959ech73LKp3HpXS56vAXK4d36r"
                        data-acceptUIFormBtnTxt="Submit" data-acceptUIFormHeaderTxt="Card Information"
                        data-responseHandler="responseHandler">
                        {{ __('add') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function responseHandler(response) {
            if (response.messages.resultCode === "Error") {
                var i = 0;
                while (i < response.messages.message.length) {
                    console.log(response.messages);
                    alert(
                        response.messages.message[i].code + ": " +
                        response.messages.message[i].text
                    );
                    console.log(
                        response.messages.message[i].code + ": " +
                        response.messages.message[i].text
                    );
                    i = i + 1;
                }
            } else {
                paymentFormUpdate(response.opaqueData);
            }
        }


        function paymentFormUpdate(opaqueData) {
            document.getElementById("dataDescriptor").value = opaqueData.dataDescriptor;
            document.getElementById("dataValue").value = opaqueData.dataValue;

            // If using your own form to collect the sensitive data from the customer,
            // blank out the fields before submitting them to your server.
            // document.getElementById("cardNumber").value = "";
            // document.getElementById("expMonth").value = "";
            // document.getElementById("expYear").value = "";
            // document.getElementById("cardCode").value = "";

            document.getElementById("paymentForm").submit();
        }
    </script>
</body>


</html>
