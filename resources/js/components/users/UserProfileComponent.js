import axios from "axios";
import React, { useEffect, useState } from "react";

export default function UserProfileComponent(props) {
    const user_id = props.user_id ?? null;
    const user_email = props.user_email.email ?? '';
    const [rooms, setRooms] = useState([]);
    const stays = []

    const getRoomsPerUser = async () => {
        const { data } = await axios.get("/api/userStays/"+user_id);

        data.forEach(user => {
            setRooms(user.rooms);
        });
    };

    rooms.map((room,index)=>{
        stays.push(<li key={index}>Se ha hospedado en la habitación {room.number} del Hotel {room.hotel['name']}</li>)
    })

    useEffect(() => {
        getRoomsPerUser();
    }, []);

    return (
        <>
        <div className="uk-card uk-card-default uk-card-body">
            <h2 className="uk-h2 uk-text-secondary">Perfil del usuario {user_email}</h2>
            <ul className="uk-list uk-list-striped">
                {
                stays
                }
            </ul>
        </div>
        </>
    );
}
