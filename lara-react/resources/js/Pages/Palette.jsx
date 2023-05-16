import CreatePalette from "@/Components/CreatePalette";
import App from "@/Layouts/App";

export default function Palette({storeUrl}) {


    return (
        <App>
            <div className="container">
                <div className="row">
                    <div className="col-4">
                        <CreatePalette storeUrl={storeUrl} />
                    </div>
                    <div className="col-8">
                        Column
                    </div>

                </div>
            </div>
        </App>

    );

}