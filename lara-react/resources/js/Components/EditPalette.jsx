import axios from 'axios';
import { useState } from 'react'

export default function EditPallete({p, setShowEdit, setLastUpdate, setLoader}) {

    const [title, setTitle] = useState(p.title);

    
    const edit = _ => {
        setLoader(true);
        setShowEdit(false);
        axios.put(p.updateUrl, {title})
        .then(_ => {
            setLastUpdate(Date.now());
            setLoader(false);
        })
        .catch(_=>{
            
            setLoader(false);
        })
    }
    

    return (
        <div className="modal" style={{
            display: 'block',
            backgroundColor: '#22222222'
        }}>
            <div className="modal-dialog modal-dialog-centered">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title">Edit palette</h5>
                        <button type="button" className="btn-close" onClick={_=> setShowEdit(false)}></button>
                    </div>
                    <div className="modal-body">
                    <div className="mb-3">
                    <label className="form-label">Title</label>
                    <input type="text" className="form-control" value={title} onChange={e => setTitle(e.target.value)} />
                </div>
                    </div>
                    <div className="modal-footer">
                        <button type="button" className="btn btn-outline-dark" onClick={_=> setShowEdit(false)}>Close</button>
                        <button type="button" className="btn btn-outline-info" onClick={edit}>Save</button>
                    </div>
                </div>
            </div>
        </div>
    )
}