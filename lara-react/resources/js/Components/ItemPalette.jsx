import axios from 'axios';
import EditPallete from './EditPalette';
import { useState } from 'react';

export default function ItemPalette({p, setLastUpdate, setLoader}) {

    const [showEdit, setShowEdit] = useState(false);
    
    const destroy = _ => {
        setLoader(true)
        axios.delete(p.deleteUrl)
        .then(res => {
            setLoader(false)
            setLastUpdate(Date.now());
        })
        .catch(_=> setLoader(false))
    }

    const edit = _ => {
        setShowEdit(true);
    }


    return (
        <li className="list-group-item d-flex justify-content-between align-items-center">
            <h4 style={{ width: '300px' }}>{p.title}</h4>
            <span className="badge bg-dark rounded-pill">0</span>
            <div>
            <button type="button" className="btn btn-outline-info m-1" onClick={edit}>edit</button>
            <button type="button" className="btn btn-outline-danger m-1" onClick={destroy}>delete</button>
            </div>
             {
                showEdit ? <EditPallete p={p} setShowEdit={setShowEdit} setLastUpdate={setLastUpdate} setLoader={setLoader} /> : null
             }
        </li>
    )
}