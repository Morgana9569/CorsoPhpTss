//require

import { getUser } from "./UserService.js";
import { UserList } from "./RenderView.js";
import { UserTable } from "./RenderView.js";

//-> promessa
getUser()
    .then((json) => {
       UserList(json,'lista_utenti_1')
    })

const user_locale = [
    {
        "first_name": "Amedeo",
        "last_name": "Verdi",
        "birthday": "2017-03-17",
        "birth_city": "sfdsf",
        "id_regione": 16,
        "id_provincia": 15,
        "gender": "M",
        "username": "giuseppe@xcvxc",
        "password": "a3ea3259dd51c5d28ac011a8dbf78e79",
        "id_user": 15
    },
   
    {
        "first_name": "Ranuncolo",
        "last_name": "Rivola",
        "birthday": "1999-03-01",
        "birth_city": "sdfdsfs",
        "id_regione": 18,
        "id_provincia": 17,
        "gender": "M",
        "username": "a@b.it",
        "password": "a3ea3259dd51c5d28ac011a8dbf78e79",
        "id_user": 21
    }

]


UserTable (user_locale,'lista_utenti_2')
// getUser().then((json) => {
//     alert(json[0])
// })
    ;