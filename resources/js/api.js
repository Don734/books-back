import axios from "axios";

let instance = null;

const API = () => {
    if (!instance) {
        instance = {
            product: {
                import: (file) => {
                    axios.post("/api/products/import", {
                        file
                    })
                        .then(res => res.data)
                }
            }
        }
    }

    return instance;
}

export default new API();
