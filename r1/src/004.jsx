import 'bootstrap/dist/css/bootstrap.min.css';
import { useState } from 'react';
import './App.scss';
import randColor from './Functions/randColor';
import { v4 as uuidv4 } from 'uuid';

// const animals = [
//     { name: 'Racoon', color: 'skyblue', big: false },
//     { name: 'Fox', color: 'brown', big: false },
//     { name: 'Moose', color: 'yellow', big: true },
//     { name: 'Wolf', color: 'gray', big: false }
// ];


function App() {

    // const [h2Color, setH2Color] = useState('crimson');
    // const [count, setCount] = useState(1);

    const [wish, setWish] = useState('');
    const [size, setSize] = useState(0);
    const [wishList, setWishList] = useState([]);

    // const clickIt = () => {
    //     setH2Color(c => c === 'crimson' ? 'yellow' : 'crimson');
    // }


    // const add1 = () => {
    //     setCount(c => c + 1);
    // }

    const doWish = e => {
        setWish(e.target.value);
    }

    const doWishSize = e => {
        setSize(e.target.value);
    }

    const addWish = () => {
        setWishList(w => [...w,
        {
            id: uuidv4(),
            wish,
            size,
            color: randColor()
        }
        ]);
        setWish('');
        setSize(0);
    }

    const del = id => {
        setWishList(w => w.filter(w => id !== w.id));
    }

    return (
        <div className="App">
            <header className="App-header">
                <div className="card">
                    <div className="card-header">
                        <h2>Wish Book</h2>
                    </div>
                    <ul className="list-group list-group-flush">
                        {/* {
                            animals.map((a, i) =>
                                <li key={i} className={'list-group-item' + (a.big ? ' big' : '')}
                                    style={{ color: a.color }}>
                                    {a.name}
                                </li>)
                        } */}
                        {
                            wishList.map((a, i) =>
                                <li key={i} className="list-group-item"
                                    style={{ color: a.color }}>
                                    {a.wish} <b>{a.size}</b>
                                    <div className="del-button" onClick={() => del(a.id)}></div>
                                </li>)
                        }
                    </ul>
                    <div className="m-3">
                        <label className="form-label">Enter your wish</label>
                        <input type="text" className="form-control" onChange={doWish} value={wish} />
                    </div>
                    <div className="m-3">
                        <label className="form-label">How Big <i>{size}</i></label>
                        <input type="range" className="form-control" min="0" max="10" onChange={doWishSize} value={size} />
                    </div>
                    <button type="button" className="btn btn-outline-danger m-4" onClick={addWish}>add</button>
                </div>

                {/* <button type="button" className="btn btn-outline-warning mt-4" onClick={clickIt}>CLICK</button>
                <button type="button" className="btn btn-outline-danger mt-4" onClick={add1}>+ 1</button> */}
            </header>
        </div>
    );
}

export default App;