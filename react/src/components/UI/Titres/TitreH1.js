import React from "react";

const titreH1 = (props) => {
    
    let monCss = ` p-1  text-center `;
    return <><h1 className={monCss} style={{ 
        color: '#3575b5',
        }}>{props.children}</h1>
        {/* <hr 
    style={{ 
        background: '#3575b5',
        border: 'none',
        width: '20%',
        marginLeft: 'auto',
        height:'3px',
        marginBottom: '140px',
        marginTop: '40px'
    }}
    ></hr> */}
    </>
};

export default titreH1;