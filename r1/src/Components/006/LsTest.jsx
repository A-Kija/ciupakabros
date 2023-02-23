import { useState } from "react";

function LsTest() {

    const [show, setShow] = useState('');
    const [showColor, setShowColor] = useState('white');

    const write = () => {
        localStorage.setItem('animal', 'RACOON');
        localStorage.setItem('color', JSON.stringify({id: 555, spalva: 'crimson'}));
    }

    const read = () => {
        const what = localStorage.getItem('animal');
        setShow(what);
        const styleColor = JSON.parse(localStorage.getItem('color'));
        setShowColor(styleColor.spalva);
    }

    const destroy = () => {
        localStorage.removeItem('animal');
        localStorage.removeItem('color');
    }



    return (
        <>

        <h1 style={{color: showColor}}>{show}</h1>

        <button className="btn btn-outline-success m-4" onClick={write}>write</button>
        <button className="btn btn-outline-primary m-4" onClick={read}>read</button>
        <button className="btn btn-outline-danger m-4" onClick={destroy}>delete</button>
        </>
    );

}

export default LsTest