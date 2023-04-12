
export function UserList(array_users, element_selector) {
    //dati disponibili

    const lista = document.getElementById(element_selector)
    const elenco = array_users.map((user) => {

        return "<li>(" + user.id_user + ")" + user.first_name + " " + user.last_name + "</li>"
    }).join("\n")

    lista.innerHTML = elenco
}

//UserTable() //function expression
export const UserTable = (array_users, element_selector) => {
    //template literal
    const html = `<table border="1">
        <tr>
            <th>
                Nome
            </th>
        </tr>`
        +
        array_users.map((user) => {

            return `<tr>
            <td>
                ${user.first_name}
            </td>
        </tr>`
        }).join("\n")
        +
        `</table >`

        document.getElementById(element_selector).innerHTML = html

}