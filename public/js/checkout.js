function checkoutDon() {
    const forms = document.getElementById("form");
    transactId = Math.floor(Math.random() * 100000000).toString();
    forms.addEventListener("submit", function (e) {
        e.preventDefault();
        var montant = document.getElementById("montant").value;

        if (montant == "") {
            var errors = document.getElementById("error");
            errors.innerHTML = "Veuillez remplir ce champ";
        } else {
            CinetPay.setConfig({
                apikey: "1440358268643e4bea9c47f5.88203224", //   YOUR APIKEY
                site_id: "139022", //YOUR_SITE_ID
                notify_url: "http://ongacid.org/notify/",
                mode: "PRODUCTION",
            });
            CinetPay.getCheckout({
                transaction_id: transactId, // YOUR TRANSACTION ID
                amount: montant,
                currency: "XOF",
                channels: "ALL",
                description: "Don",
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
                    //window.location.reload();
                    if (alert("Votre paiement a échoué")) {
                        window.location.reload();
                    }
                } else if (data.status == "ACCEPTED") {
                    const url = forms.getAttribute("action");
                    const token = document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content;
                    const lastname = document.getElementById("lastname").value;
                    const firstname =
                        document.getElementById("firstname").value;
                    const email = document.getElementById("email").value;
                    const contact = document.getElementById("contact").value;
                    const montant = document.getElementById("montant").value;
                    const categoryDon_id = document.getElementById("don").value;
                    const bodys = {
                        categoryDon_id: categoryDon_id,
                        lastname: lastname,
                        firstname: firstname,
                        contact: contact,
                        email: email,
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
                        .then((response) => {
                            /*  response.json().then(datas => {
                           // count.innerHTML = datas.count;
                        }); */
                        })
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
        }
    });
}

//formation
function checkoutFormation() {
    const form_inscription = document.getElementById("form_inscription");
    transactId = Math.floor(Math.random() * 100000000).toString();
    form_inscription.addEventListener("submit", function (e) {
        e.preventDefault();
        const montant = document.getElementById("prix").value;

        if (montant == "") {
            var errors = document.getElementById("error");
            errors.innerHTML = "Veuillez remplir ce champ";
        } else {
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
                    const url = form_inscription.getAttribute("action");
                    const token = document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content;

                    const lastname =
                        document.getElementById("nom_inscri").value;
                    const firstname =
                        document.getElementById("prenom_inscri").value;
                    const email = document.getElementById("email_inscri").value;
                    const contact =
                        document.getElementById("contact_inscri").value;
                    //const montant = document.getElementById("prix").value;
                    const formation_id = document.getElementById("don").value;
                    const bodys = {
                        formation_id: formation_id,
                        nom: lastname,
                        prenom: firstname,
                        contact: contact,
                        email: email,
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
                        .then((response) => {
                            /*  response.json().then(datas => {
                           // count.innerHTML = datas.count;
                        }); */
                        })
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
        }
    });
}

checkoutDon();
checkoutFormation();
