import React, { Component } from 'react';
import Titre from "../../../components/UI/Titres/TitreH1";
import axios from "axios";
import Oiseau from "./Oiseau/Oiseau";

const hostname = "http://localhost:8090/seor/server/"
// const hostname = "seor.great-site.net/"

class Application extends Component {
    state = {
        oiseaux : null,
        filtreStatut : null,
        filtreAlimentation : null,
        listeStatuts : null,
        listeAlimentations : null,
        jojo : null,
        gege : null,
        dede : null
    }

    loadData = () => {
        const statut = this.state.filtreStatut ? this.state.filtreStatut : "-1";
        const alimentation = this.state.filtreAlimentation ? this.state.filtreAlimentation : "-1";
        axios.get(`${hostname}front/oiseaux/${statut}/${alimentation}`)
            .then(reponse => {
                this.setState({oiseaux:Object.values(reponse.data)});
            })
    }

    componentDidMount = () => {
        this.loadData();
        axios.get(`${hostname}front/alimentation`)
            .then(reponse => {
                this.setState({listeAlimentations:Object.values(reponse.data)});
            })
        axios.get(`${hostname}front/statut`)
            .then(reponse => {
                this.setState({listeStatuts:Object.values(reponse.data)});
            })
        
    }

    componentDidUpdate = (oldProps,oldState) => {
        if(oldState.filtreStatut !== this.state.filtreStatut || oldState.filtreAlimentation !== this.state.filtreAlimentation ) {
            this.loadData();
        }
    }

    handleSelectionStatut = (idStatut) => {
        if(idStatut === "-1") this.handleResetFiltreStatut() 
        else this.setState({filtreStatut : idStatut});
    }

    handleSelectionAlimentation = (idAlimentation) => {
        if(idAlimentation === "-1") this.handleResetFiltreAlimentation()
        else this.setState({filtreAlimentation : idAlimentation});
    }
    
    handleResetFiltreStatut = () => {
        this.setState({filtreStatut:null})
    }
    handleResetFiltreAlimentation = () => {
        this.setState({filtreAlimentation:null})
    }

    render() {

        
        // let nomStatutFiltre="";   
        //     if(this.state.filtreStatut){
        //     nomStatutFiltre = (this.state.listeStatuts[this.state.filtreStatut-1].statut)
        //     }
        // let nomAlimentationFiltre="";   
        //     if(this.state.filtreAlimentation){
        //     nomAlimentationFiltre = (this.state.listeAlimentations[this.state.filtreAlimentation-1].alimentation)
        //     }


        return (
            <>
                <Titre>Les Oiseaux de l'île</Titre>
                {/* <div className="container-Fluid">
                    <span>Filtres : </span>
                    <select onChange={(event) => this.handleSelectionStatut(event.target.value)} >
                        <option value="-1" selected={this.state.filtreStatut=== null && "selected"}>Statut</option>
                        {
                            this.state.listeStatuts && this.state.listeStatuts.map(statut => {
                                return <option 
                                    key={statut.statut_id}
                                    value={statut.statut_id}
                                    selected={this.state.filtreStatut=== statut.statut_id && "selected"}
                                    >{statut.statut}</option>
                            })
                        }
                    </select>
                    <select onChange={(event) => this.handleSelectionAlimentation(event.target.value)}>
                        <option value="-1" selected={this.state.filtreAlimentation=== null && "selected"}>Alimentation</option>
                        {
                            this.state.listeAlimentations && this.state.listeAlimentations.map(alimentation => {
                                return <option 
                                    key={alimentation.alimentation_id}
                                    value={alimentation.alimentation_id}
                                    selected={this.state.filtreAlimentation=== alimentation.alimentation_id && "selected"}
                                    >{alimentation.alimentation}</option>
                            })
                        }
                    </select>

                    {
                    this.state.filtreStatut &&
                        <Bouton 
                            typeBtn="btn-secondary"
                            clic = {this.handleResetFiltreStatut}
                            >
                            {nomStatutFiltre} &nbsp;
                            <svg width="1em" height="1em" viewBox="0 0 16 16" className="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fillRule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                            </svg>
                        </Bouton>
                    }
                    {
                        this.state.filtreAlimentation &&
                        <Bouton 
                            typeBtn="btn-secondary"
                            clic = {this.handleResetFiltreAlimentation}
                            >{nomAlimentationFiltre} &nbsp;
                            <svg width="1em" height="1em" viewBox="0 0 16 16" className="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fillRule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                            </svg>
                            </Bouton>
                    }
                </div><br></br> */}

                <div >
                    <div style={{margin:"0 auto",
                                display:"grid",
                                gridTemplateColumns:"repeat(auto-fill, 280px)",
                                justifyContent:"center",
                                gap:"20px", }}>
                        {
                            this.state.oiseaux && 
                            this.state.oiseaux.map(oiseau => {
                                return (
                                    <div  key={oiseau.id}>
                                        <Oiseau 
                                            {...oiseau} 
                                            filtreStatut = {this.handleSelectionStatut}
                                            filtreAlimentation = {this.handleSelectionAlimentation}
                                            jojo = {this.state.filtreStatut}
                                            gege = {this.state.filtreAlimentation}
                                            reset = {this.handleResetFiltreStatut}
                                            rereset = {this.handleResetFiltreAlimentation}
                                            dede = {this.state.oiseaux}
                                            />
                                    </div>
                                )
                            })
                        }
                    </div>
                </div>
            </>
        );
    }
}

export default Application;