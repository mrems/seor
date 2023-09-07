import React, { Component } from 'react';
import Titre from "../../../components/UI/Titres/TitreH1";
import Formulaire from "./Formulaire/Formulaire";
import axios from "axios";

class Contact extends Component {
    componentDidMount = () => {
        document.title = "SEOR";
    }

    handleEnvoiMail = (message) => {
        axios.post("http://localhost:8090/seor/server/front/sendMessage",message)
            .then(reponse=> {
                console.log(reponse)
            })
            .catch(error => {
                console.log(error)
            })
    }

    render() {
        return (
            <>
                <div>
                <Titre>Contact</Titre>
                <div className="container ">
                    <h4>Adresse :</h4>
                    SEOR <br></br>
                    13, ruelle des Orchidées
                    Cambuston <br></br>
                    97440 SAINT ANDRE <br></br>
                    Téléphone: 02 62 20 46 65 <br></br><br></br>
                    
                    <Formulaire sendMail = {this.handleEnvoiMail}/>
                </div>
                </div>
            </>
        );
    }
}

export default Contact;