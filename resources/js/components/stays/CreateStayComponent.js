import axios from "axios";
import React, { useState, useEffect, useRef } from "react";
import Select from "react-select";

export default function CreateStayComponent(props) {
    const [selectedHotel, setSelectedHotel] = useState(null);
    const [selectedRoom, setSelectedRoom] = useState(null);

    const [hotels,setHotels] = useState([]);
    const [rooms,setRooms] = useState([]);

    const stay = useRef({room_id:'',user_id:''})

    const user_id = parseInt(props.user_id )?? null;

    const getHotels = async () => {
        const { data } = await axios.get("/api/hotels");
        setHotels(data);
    };

    const getRooms = async ($hotel)=>{
        const { data } = await axios.get('/api/rooms/'+$hotel.id);
        setRooms(data);
    }

    useEffect(() => {
        getHotels();
    }, []);

    function setStay($room){
        stay.current.room_id = $room.id
        stay.current.user_id = user_id
    }

    function saveStay(){
        axios.post('/api/storeStay',stay.current)
            .then(response=>{
                if(response.status==201){
                    alert('Se ha registrado la visita')
                    window.location.replace('/perfil-usuario/'+user_id)
                }
            })
    }

    return (
        <>
        <div className="uk-container uk-container-xlarge">
            <div className="uk-child-width-1-1@s uk-child-width-2-3@l uk-text-center" uk-grid='true'>
                <div className="uk-card uk-card-default uk-child-width-1-">
                    <div className="uk-card-body">
                        <div>
                        <h5 className="uk-h5 uk-text-bold">Selecciona el hotel<sub>*</sub></h5>
                        <Select
                            defaultValue={selectedHotel}
                            onChange={getRooms}
                            options={hotels}
                            placeholder='Selecciona un hotel'
                            getOptionLabel ={(option)=>option.name}
                            getOptionValue ={(option)=>option.id}
                        />
                        </div>
                        <div>
                        <h5 className="uk-h5 uk-text-bold">Selecciona la validación<sub>*</sub></h5>
                        <Select
                            defaultValue={selectedRoom}
                            onChange={setStay}
                            options={rooms}
                            placeholder='Selecciona una habitación'
                            getOptionLabel = {(option)=>option.number}
                            getOptionValue = {(option)=>option.id}
                        />
                        </div>
                        <button className="uk-button uk-button-primary uk-border-rounded" onClick={saveStay}>Click</button>
                    </div>
                </div>
            </div>
        </div>

        </>
    );
}
