import rand from '../../Functions/rand';
import BebrasName from './BebrasName';

function Bebras({color, lt, name}) {

    const fun = () => {
        let a = '';
        for (let i = 1; i < 9; i++) {
            a = a + i
        }
        return a;
    }

    return (
        <>
            <h1>
                <i style={{
                    color: color,
                    letterSpacing: lt,
                    backgroundColor: rand(0, 1) ? 'coral' : 'pink'
                }}>Bebras</i>
            </h1>
            <BebrasName name={name} />
        </>
    );
}

export default Bebras;