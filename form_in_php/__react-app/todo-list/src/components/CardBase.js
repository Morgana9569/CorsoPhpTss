

//function CardBase(props) {
function CardBase({titolo, autore, descrizione}) {
//const {titolo, testo} = props;
    return (
        <div>
            <h3>{titolo}</h3>
            <h6>{autore}</h6>
            <p>{descrizione}</p>
        </div>
    );
}

export default CardBase;