import 'bootstrap/dist/css/bootstrap.min.css';
import './App.scss';

const animals = [
    {name: 'Racoon', color: 'skyblue', big: false},
    {name: 'Fox', color: 'brown', big: false},
    {name: 'Moose', color: 'yellow', big: true},
    {name: 'Wolf', color: 'gray', big: false}
];


function App() {



    return (
        <div className="App">
            <header className="App-header">

                <div className="card">
                    <div className="card-header">
                        <h2>Forest Book</h2>
                    </div>
                    <ul className="list-group list-group-flush">
                        {
                            animals.map((a, i) => 
                            <li key={i} className={'list-group-item' + (a.big ? ' big' : '')} 
                            style={{color:a.color}}>
                                {a.name}
                            </li>)
                        }
                    </ul>
                </div>


            </header>
        </div>
    );
}

export default App;