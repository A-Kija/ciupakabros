import '../../css/style.scss';

function Nice({color, text, ls, animals}) {

    return (
        <>
        <h1 style={{
            color,
            letterSpacing: ls + 'px'
        }}>{text}</h1>

        {
            animals.map((a, i) => <h3 key={i}>{a}</h3>)
        }

        </>

    );
}

export default Nice;