import 'bootstrap/dist/css/bootstrap.min.css';
import { useEffect, useState } from 'react';
import './App.scss';
import Create from './Components/006/Create';
import { create } from './Functions/localStorage';

const KEY = 'whishList';

function App() {

    const [createData, setCreateData] = useState(null);




    useEffect(() => {
        if (null === createData) {
            return;
        }
        create(KEY, createData);
    }, [createData]);


    return (
        <div className="container">
            <div className="row">
                <div className="col-4">
                    <Create />
                </div>
                <div className="col-8">
                    Column
                </div>
            </div>
        </div>
    );
}

export default App;