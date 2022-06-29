import axios from "axios";
import React, { useEffect, useState } from "react";

export default function CreateStayComponent(props){
    const user_id = props.user_id ?? null
    const [data, setData] = useState([]);

    const getUsers  = async ()=>{
        const { data } = await axios.get('/api/users');
        setData(data);
    }


    useEffect(()=>{
        getUsers();
    },[]);

    return(
        <>
        <h2>{JSON.stringify(data)}</h2>
        </>
    )
}
