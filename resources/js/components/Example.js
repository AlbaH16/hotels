import React from "react";

export default function ExampleComponent(props){
    const userid = props.userid ?? 'Zero'

    return(
        <>
        <h2>{userid}</h2>
        </>
    )
}
