import axios from "axios";
import { useState } from "react"

export default function CreatePalette({storeUrl, setLastUpdate, setLoader}) {

    const [title, setTitle] = useState('');

    const create = _ => {
        setLoader(true);
        axios.post(storeUrl, {title})
        .then(_ => {
            setLastUpdate(Date.now());
            setTitle('');
            setLoader(false);
        })
    }

    return (
        <div className="card m-3">
            <h5 className="card-header">Create new palette</h5>
            <div className="card-body">
                <div className="mb-3">
                    <label className="form-label">Title</label>
                    <input type="text" className="form-control" value={title} onChange={e => setTitle(e.target.value)} />
                </div>
                <button type="button" className="btn btn-outline-dark" onClick={create}>Create</button>
            </div>
        </div>
    )
}