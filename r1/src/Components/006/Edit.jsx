import { useEffect, useState } from 'react';

function Edit({ setEditData, modalData, setModalData }) {

    const [wish, setWish] = useState('');
    const [size, setSize] = useState(5);

    useEffect(() => {
        if (null === modalData) {
            return;
        }
        setWish(modalData.wish);
        setSize(modalData.size);

    }, [modalData]);

    const doWish = e => {
        setWish(e.target.value);
    }

    const doWishSize = e => {
        setSize(e.target.value);
    }

    const edit = () => {
        setEditData({
            wish,
            size,
            id: modalData.id
        });
        setModalData(null);
    }

    if (null === modalData) {
        return null;
    }

    return (
        <div className="modal">
            <div className="modal-dialog modal-dialog-centered">
                <div className="modal-content">
                    <div className="modal-header">
                        <h5 className="modal-title">Edit</h5>
                        <button type="button" className="btn-close" onClick={() => setModalData(null)}></button>
                    </div>
                    <div className="modal-body">
                        <div className="card">
                            <div className="card-body">
                                <div className="m-3">
                                    <label className="form-label">Enter your wish</label>
                                    <input type="text" className="form-control" onChange={doWish} value={wish} />
                                </div>
                                <div className="m-3">
                                    <label className="form-label">How Big <i>{size}</i></label>
                                    <input type="range" className="form-control" min="0" max="10" onChange={doWishSize} value={size} />
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div className="modal-footer">
                        <button type="button" className="btn btn-outline-secondary" onClick={() => setModalData(null)}>close</button>
                        <button type="button" className="btn btn-outline-primary" onClick={edit}>save</button>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default Edit;