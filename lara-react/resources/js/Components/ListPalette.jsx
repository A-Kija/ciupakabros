import { useEffect, useState } from "react"
import ItemPalette from "./ItemPalette";

export default function ListPalette({ listUrl, lastUpdate, setLastUpdate, setLoader }) {

    const [list, setList] = useState(null);

    useEffect(() => {
        setLoader(true);
        axios.get(listUrl)
            .then(res => {
                setList(res.data);
                setLoader(false);
            })
            .catch(error => {
                setLoader(false);
                if (error.response) {
                    setList({
                        error: error.response.statusText,
                        status: error.response.status
                    });
                } else {
                    setList({
                        error: 'Something goes wrong!'
                    });
                }
            });
    }, [lastUpdate]);

    if (null === list) {
        return (
            <h2 className="m-5">...LOADING</h2>
        );
    }

    if (list.error) {
        return (
            <h2 className="m-5">{list.status} {list.error}</h2>
        );
    }


    return (
        <div className="card m-3">
            <h5 className="card-header">List of palettes</h5>
            <div className="card-body">
                <ul className="list-group">
                    {console.log(list)}
                    {
                        list.map(p => <ItemPalette key={p.id} p={p} setLastUpdate={setLastUpdate} setLoader={setLoader} />)
                    }
                </ul>
            </div>
        </div>
    )
}