import axios from "axios";
import React, { useEffect, useState } from "react";

export default function CreateStayComponent(props) {
    const user_id = props.user_id ?? null;
    const [data, setData] = useState([]);

    const getUsers = async () => {
        const { data } = await axios.get("/api/users");
        setData(data);
    };

    useEffect(() => {
        getUsers();
    }, []);

    return (
        <>
            <div className="uk-overflow-auto">
                <table className="uk-table uk-table-middle uk-table-hover uk-table-small">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Género</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Estatus Sentimental</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        {data.map((user, index) => (
                            <tr key={user.id}>
                                <td>{user.email}</td>
                                <td>{user.gender}</td>
                                <td>{user.birth_date}</td>
                                <td>{user.relationship_status}</td>
                                <td>
                                    <div className="uk-margin-small">
                                        <div className="uk-button-group">
                                            <a className="uk-button uk-button-primary" href={'/perfil-usuario/'+user.id}>Ver Perfil</a>
                                            <a className="uk-button uk-button-primary" href={'/registrar-visitas/'+user.id}>Registrar Visita</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    );
}
