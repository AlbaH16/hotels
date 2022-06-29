import axios from "axios";
import React, { useEffect, useState } from "react";

export default function CreateStayComponent(props) {
    const user_id = props.user_id ?? null;


    function handleForm(){
        console.log(user_id)
    }

    return (
        <>
            <button onClick={handleForm}>Click</button>
        </>
    );
}
