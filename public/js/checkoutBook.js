function checkoutBook() {
    const books = document.querySelectorAll("#book");
    books.forEach((book) => {
        transactId = Math.floor(Math.random() * 100000000).toString();
        book.addEventListener("click", function (e) {
            e.preventDefault();
            const url = this.getAttribute("href");
            const montant = this.querySelector("#price_book").value;
            CinetPay.setConfig({
                apikey: "1440358268643e4bea9c47f5.88203224", //   YOUR APIKEY
                site_id: "139022", //YOUR_SITE_ID
                notify_url: "http://ongacid.org/notify/",
                mode: "PRODUCTION", //PRODUCTION
            });
            CinetPay.getCheckout({
                transaction_id: transactId, // YOUR TRANSACTION ID
                amount: montant,
                currency: "XOF",
                channels: "ALL",
                description: "Paiement pour un agenda de formation",
                //Fournir ces variables pour le paiements par carte bancaire
                customer_name: "Joe", //Le nom du client
                customer_surname: "Down", //Le prenom du client
                customer_email: "down@test.com", //l'email du client
                customer_phone_number: "088767611", //l'email du client
                customer_address: "BP 0024", //addresse du client
                customer_city: "Antananarivo", // La ville du client
                customer_country: "CM", // le code ISO du pays
                customer_state: "CM", // le code ISO l'état
                customer_zip_code: "06510", // code postal
            });

            CinetPay.waitResponse(function (data) {
                if (data.status == "REFUSED") {
                    if (alert("Votre paiement a échoué")) {
                        window.location.reload();
                    }
                } else if (data.status == "ACCEPTED") {
                    const token = document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content;
                    const bodys = {
                        montant: montant,
                        transaction_id: transactId,
                        payment_method: data.payment_method,
                        status: data.status,
                    };

                    fetch(url, {
                        headers: {
                            Accept: "application/json",
                            "Content-type": "application/json",
                            "X-CSRF-TOKEN": token,
                        },
                        method: "post",
                        body: JSON.stringify(bodys),
                    })
                        .then((response) => {})
                        .catch((error) => {
                            console.log(error);
                        });

                    if (alert("Votre paiement a été effectué avec succès")) {
                        window.location.reload();
                    }
                }
            });

            CinetPay.onError(function (data) {
                console.log(data);
            });
        });
    });
}
checkoutBook();
