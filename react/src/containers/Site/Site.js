import React, { Component } from 'react';
import Navbar from "../../components/NavBar/NavBar";
import {Switch, Route} from "react-router-dom";
import Accueil from "./Accueil/Accueil";
import Application from "./Application/Application";
import Error from "../../components/Error/Error";
import Footer from "../../components/Footer/Footer";
import Contact from "./Contact/Contact";

class Site extends Component {
    render() {
        return (
            <>
                <div className="site">
                    <Navbar />
                    <Switch>
                        <Route path="/oiseaux" exact render={() => <Application />} />
                        <Route path="/contact" exact render={() => <Contact />} />
                        <Route path="/admin" component={() => {
                            window.location.href = 'http://localhost:8090/seor/server/back/login';
                            return null;}}/>
                        <Route path="/" exact render={() => <Accueil />} />
                        <Route render={() => <Error type="404"><h1 className="text-center">La page n'existe pas</h1></Error>} />
                    </Switch>
                    
                </div>
                <Footer />
            </>
        );
    }
}

export default Site;