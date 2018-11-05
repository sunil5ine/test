<html>
<head>
<!-- INCLUDE SESSION.JS JAVASCRIPT LIBRARY -->
<script src="https://credimax.gateway.mastercard.com/form/version/49/merchant/E13763950/session.js"></script>
<!-- APPLY CLICK-JACKING STYLING AND HIDE CONTENTS OF THE PAGE -->
<style id="antiClickjack">body{display:none !important;}</style>
</head>
<body>

<!-- CREATE THE HTML FOR THE PAYMENT PAGE -->

<div>Please enter your payment details:</div>
<div>Card Number: <input type="text" id="card-number" class="input-field" value="5387210000265097" ></div>
<div>Expiry Month:<input type="text" id="expiry-month" class="input-field" value="11"></div>
<div>Expiry Year:<input type="text" id="expiry-year" class="input-field" value="21"></div>
<div>Security Code:<input type="text" id="security-code" class="input-field" value="J39303139" ></div>
<div><button id="payButton" onclick="pay();">Pay Now</button></div>

<!-- JAVASCRIPT FRAME-BREAKER CODE TO PROVIDE PROTECTION AGAINST IFRAME CLICK-JACKING -->
<script type="text/javascript">
if (self === top) {
    var antiClickjack = document.getElementById("antiClickjack");
    antiClickjack.parentNode.removeChild(antiClickjack);
} else {
    top.location = self.location;
}

PaymentSession.configure({
    fields: {
        // ATTACH HOSTED FIELDS TO YOUR PAYMENT PAGE FOR A CREDIT CARD
        card: {
            number: "#card-number",
            securityCode: "#security-code",
            expiryMonth: "#expiry-month",
            expiryYear: "#expiry-year"
        }
    },
    //SPECIFY YOUR MITIGATION OPTION HERE
    frameEmbeddingMitigation: ["javascript"],
    callbacks: {
        initialized: function(response) {
            // HANDLE INITIALIZATION RESPONSE
        },
        formSessionUpdate: function(response) {
            // HANDLE RESPONSE FOR UPDATE SESSION
            if (response.status) {
                if ("ok" == response.status) {
                    console.log("Session updated with data: " + response.session.id);
  
                    //check if the security code was provided by the user
                    if (response.sourceOfFunds.provided.card.securityCode) {
                        console.log("Security code was provided.");
                    }
  
                    //check if the user entered a Mastercard credit card
                    if (response.sourceOfFunds.provided.card.scheme == 'MASTERCARD') {
                        console.log("The user entered a Mastercard credit card.")
                    }
                } else if ("fields_in_error" == response.status)  {
  
                    console.log("Session update failed with field errors.");
                    if (response.errors.cardNumber) {
                        console.log("Card number invalid or missing.");
                    }
                    if (response.errors.expiryYear) {
                        console.log("Expiry year invalid or missing.");
                    }
                    if (response.errors.expiryMonth) {
                        console.log("Expiry month invalid or missing.");
                    }
                    if (response.errors.securityCode) {
                        console.log("Security code invalid.");
                    }
                } else if ("request_timeout" == response.status)  {
                    console.log("Session update failed with request timeout: " + response.errors.message);
                } else if ("system_error" == response.status)  {
                    console.log("Session update failed with system error: " + response.errors.message);
                }
            } else {
                console.log("Session update failed: " + response);
            }
        }
      }
  });

function pay(card) {
    // UPDATE THE SESSION WITH THE INPUT FROM HOSTED FIELDS
    console.log(PaymentSession.updateSessionFromForm('card'));
}
</script>
</body>
</html>