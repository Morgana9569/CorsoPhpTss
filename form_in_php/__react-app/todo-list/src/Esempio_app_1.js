import './App.css';
import CardBase from './components/CardBase'


function App() {

const booklist = [
  {
    titolo:"Harry Potter",
    autore:"J.K. Rowling",
    descrizione:"descrizione libro"
  },
  {
    titolo:"Il grande Gatsby",
    autore:"Scott Fitzgerald",
    descrizione:"descrizione libro"
  },
  {
    titolo:"Il giovane Holden",
    autore:"Salinger",
    descrizione:"descrizione libro"
  },
  {
    titolo:"Le cronache di Narnia",
    autore:"C. S. Lewis",
    descrizione:"descrizione libro"
  },
  {
    titolo:"Il signore degli anelli",
    autore:"J. R. R. Tolkien",
    descrizione:"descrizione libro"
  }
]
//trasformo le info in componenti
const card_list = booklist.map((book,key) => <CardBase key={key} titolo= {book.titolo} autore={book.autore} descrizione = {book.descrizione} />)
//const card_list = booklist.map (function(book){return <CardBase titolo= {book.titolo} descrizione = {book.descrizione} />})

  return (
    <section>
    <div className="App">
      {card_list}
    </div>
    {/*  riga di separazione */}
    <hr/>
    <div className="App">
      {booklist.map((book) => <CardBase key={book.titolo} titolo= {book.titolo} autore={book.autore} descrizione = {book.descrizione} />)}
    </div>
    </section>
  );
}

export default App;


