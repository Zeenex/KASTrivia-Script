function payWithPaystack() {

    var handler = PaystackPop.setup({ 
        key: 'pk_test_6d51db1c6c0b1960c24c6b92e78e6b2625efebfb', //put your public key here
        email: 'zeenos2003@gmail.com', //put your customer's email here
        amount: 15000, //amount the customer is supposed to pay
        metadata: {
            custom_fields: [
                {
                    display_name: "Okoro Afam",
                    variable_name: "mobile_number",
                    value: "+2347031155011" //customer's mobile number
                }
            ]
        },
        callback: function (response) {
            //after the transaction have been completed
            //make post call  to the server with to verify payment 
            //using transaction reference as post data
            $.post("verify.php", {reference:response.reference}, function(status){
                if(status == "success")
                    //successful transaction
                    alert('Transaction was successful');
                else
                    //transaction failed
                    alert(response);
            });
        },
        onClose: function () {
            //when the user close the payment modal
            alert('Transaction cancelled');
        }
    });
    handler.openIframe(); //open the paystack's payment modal
}