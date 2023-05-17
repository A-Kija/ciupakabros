import CreatePalette from "@/Components/CreatePalette";
import ListPalette from "@/Components/ListPalette";
import Loader from "@/Components/Loader";
import App from "@/Layouts/App";
import '../../css/style.scss';
import { useState } from "react";
import Messages from "@/Components/Messages";

export default function Palette({storeUrl, listUrl}) {

    const [lastUpdate, setLastUpdate] = useState(Date.now());
    const [loader, setLoader] = useState(false);

    return (
        <App>
            <div className="container">
                <div className="row">
                    <div className="col-4">
                        <CreatePalette storeUrl={storeUrl} setLastUpdate={setLastUpdate} setLoader={setLoader} />
                    </div>
                    <div className="col-8">
                        <ListPalette listUrl={listUrl} lastUpdate={lastUpdate} setLastUpdate={setLastUpdate} setLoader={setLoader} />
                    </div>
                </div>
            </div>
            {
                loader ? <Loader /> : null
            }
            <Messages />
        </App>

    );

}