
const base_url = "http://localhost/corsoPhpTss/form_in_php/rest_api"

export function getUser() {
    console.log("ciao",base_url);

    const promise = fetch(base_url+"/users.php")
    console.log("promessa di fetch", promise)
        promise.then((response)=> {
            return response.json()
        })
        .then((json) => {
            //dati disponibili
            console.log(json);

            const lista = document.getElementById("lista_utenti")
        })

    

}