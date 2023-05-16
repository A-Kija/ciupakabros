import 'bootstrap/dist/css/bootstrap.min.css';

export default function App({ children }) {

    return (
        <>
        <nav className="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div className="container">
                <a className="navbar-brand" href="">
                    COLORS PALETTES
                </a>
                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <a className="nav-link" href="">
                                Palletes
                            </a>
                        </li>
                        <li>
                            <a className="nav-link" href="">
                                Colors
                            </a>
                        </li>
                    </ul>

                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <a className="nav-link" href="">Login</a>
                        </li>
                    </ul>
                </div>
        </nav>
        {children}
        </>
    );
}