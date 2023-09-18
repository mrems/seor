import React from "react";
import Bouton from "../../../../components/UI/Bouton/Bouton";


const Oiseau = (props) => (
    
    <>
        <div className="card mb-1" >
            <div className="card_side card_side--front">  
                <h3 className="card-header text-center" 
                    onClick={()=> {
                        var coco = document.getElementsByClassName("card");
                        function iscoco(oiseau){return oiseau.id === props.id ;} 
                        var jo = props.dede.findIndex(iscoco)
                        coco[jo].classList.toggle('rotate'); }}
                >{props.nom}</h3>
                <div className="text-center mt-3" style={{"height": "200px"}} >
                    <img src={props.image} alt={props.nom} className="img-fluid h-100" />
                </div>
                <div className="card-body pb-0">
                    <h3>Statut : <Bouton 
                        typeBtn={props.jojo>0 ? "btn-success" : "btn-primary"} 
                        clic = {() => {
                        props.filtreStatut(props.statut.idStatut)
                        if(props.jojo>0) { props.reset()}
                        }}>{props.statut.statut.toUpperCase()}</Bouton></h3>
                </div>
                <div className="card-body pt-1">
                    <h3>Alimentation : </h3>
                    {props.alimentations.map(alimentation => {  
                        return <Bouton 
                            typeBtn={alimentation.idAlimentation===props.gege ? "btn-success" : "btn-primary"}
                            css="m-1" 
                            clic= {() => {
                                props.filtreAlimentation(alimentation.idAlimentation)
                                if(alimentation.idAlimentation===props.gege) { props.rereset()}
                            }}
                            key={alimentation.idAlimentation}
                            >{alimentation.alimentation.toUpperCase()}</Bouton> })
                    }
                </div>
            </div>
            <div className="card_side card_side--back">
                <h3 className="card-header text-center"
                    onClick={()=> {
                        var coco = document.getElementsByClassName("card");
                        function iscoco(oiseau){return oiseau.id === props.id ;} 
                        var jo = props.dede.findIndex(iscoco)     
                        coco[jo].classList.toggle('rotate'); }}
                >{props.nom}</h3>
                <div className="card-body">
                    <div className="card-text"><p>{props.description}</p></div><br></br>
                    <h5 className="mb-0">{props.statut.descriptionStatut}</h5>
                </div>
            </div>  
        </div>
    </>
);

export default Oiseau;