import React, { Component } from 'react';
import Titre from "../../../components/UI/Titres/TitreH1";
import Formulaire from "./Formulaire/Formulaire";
import axios from "axios";

// const hostname = "http://localhost:8090/seor/server/"
const hostname = "seor.great-site.net/server"

class Contact extends Component {
    componentDidMount = () => {
        document.title = "SEOR";
    }

    handleEnvoiMail = (message) => {
        axios.post(`${hostname}front/sendMessage`,message)
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
                <div className="container d-flex justify-content-center">
                   
                    
                    <Formulaire sendMail = {this.handleEnvoiMail}/>
                </div>
                </div>
            </>
        );
    }
}

export default Contact;