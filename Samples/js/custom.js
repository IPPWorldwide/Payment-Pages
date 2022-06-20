/*jQuery(function($) {
    var cardValid = 0;
    $('#card_number').validateCreditCard(function(result) {
        var cardType = (result.card_type == null) ? '' : result.card_type.name;
        if (result.valid) {
            $("#card_type").attr(cardType);
            $('#card_number').attr('card-number', cardType);
            // $("#card_number").removeClass('required');
            $("#card_number").closest('.payment-filed').addClass('valid');
            cardValid = 1;
        } else {
            $("#card_type").attr('');
            $('#card_number').attr('card-number', '');
            // $("#card_number").addClass('required');
            $("#card_number").closest('.payment-filed').removeClass('valid');
            cardValid = 0;
        }
        if (cardType == 'Amex') {
            jQuery('.payment-card-filed .input-field').css('background-position', 'calc(100% - 10px) -129px');
        } else if (cardType == 'MasterCard') {
            jQuery('.payment-card-filed .input-field').css('background-position', 'calc(100% - 10px) -39px');
        } else if (cardType == 'Visa') {
            jQuery('.payment-card-filed .input-field').css('background-position', 'calc(100% - 10px) -89px');
        } else {
            jQuery('.payment-card-filed .input-field').css('background-position', 'calc(100% - 10px) 11px');
        }

        if (cardType == 'Amex') {
            jQuery('.vendor-icons').css('background-position', '0 -69px');
        } else if (cardType == 'MasterCard') {
            jQuery('.vendor-icons').css('background-position', '0 -34px');
        } else if (cardType == 'Visa') {
            jQuery('.vendor-icons').css('background-position', '0 1px');
        } else {
            jQuery('.vendor-icons').css('background-position', '0 -105px');
        }
    });
});
*/

jQuery(function($) {
   $("body").on("focus", "input, textarea", function() {
   paymentMethod();
   });
});
function paymentMethod(){
    var ccnum = document.getElementById('payw_cardno'),
        expiry = document.getElementById('payw_expmonth'),
        cvc = document.getElementById('payw_cvv'),
        submit = document.getElementById('payw_confirmPayment');
    payform.cardNumberInput(ccnum);
    payform.expiryInput(expiry);
    payform.cvcInput(cvc);
    ccnum.addEventListener('input', updateType);
    submit.addEventListener('click', function() {
        var valid = [],
            expiryObj = payform.parseCardExpiry(expiry.value);
        valid.push(fieldStatus(ccnum, payform.validateCardNumber(ccnum.value)));
        valid.push(fieldStatus(expiry, payform.validateCardExpiry(expiryObj)));
        valid.push(fieldStatus(cvc, payform.validateCardCVC(cvc.value)));
    });

    function updateType(e) {
        var cardType = payform.parseCardType(e.target.value);
        //console.log(cardType);
        //type.innerHTML = cardType || 'invalid';
        if (cardType == 'amex') {
            jQuery('.payment-card-filed .input-field,#payw_cardno').css('background-position', 'calc(100% - 10px) -129px');
        } else if (cardType == 'mastercard') {
            jQuery('.payment-card-filed .input-field,#payw_cardno').css('background-position', 'calc(100% - 10px) -39px');
        } else if (cardType == 'visa') {
            jQuery('.payment-card-filed .input-field,#payw_cardno').css('background-position', 'calc(100% - 10px) -89px');
        } else {
            jQuery('.payment-card-filed .input-field,#payw_cardno').css('background-position', 'calc(100% - 10px) 11px');
        }
        

    }

    function fieldStatus(input, valid) {
        if (valid) {
            removeClass(input.parentNode, 'error');
        } else {
            addClass(input.parentNode, 'error');
        }
        return valid;
    }

    function addClass(ele, _class) {
        if (ele.className.indexOf(_class) === -1) {
            ele.className += ' ' + _class;
        }
    }

    function removeClass(ele, _class) {
        if (ele.className.indexOf(_class) !== -1) {
            ele.className = ele.className.replace(_class, '');
        }
    }

}


