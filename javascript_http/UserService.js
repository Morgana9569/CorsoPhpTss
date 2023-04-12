
const base_url = "http://localhost/corsoPhpTss/form_in_php/rest_api"

export function getUser() {
    console.log("ciao",base_url);

    const promise = fetch(base_url+"/users.php")
    //console.log("promessa di fetch", promise)
        promise.then((response)=> {
            return response.json()
        })
        .then((json) => {
            //dati disponibili
            
            const lista = document.getElementById("lista_utenti")
            const elenco = json.data.map((user)=>{
                console.log("sono un utente",user)
                return "<li>("+user.user_id+")"+user.first_name+"</li>"
            }).join("\n")

            lista.innerHTML = elenco
            console.log(elenco)
        })


}