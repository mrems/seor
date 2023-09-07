import React, { Component } from 'react';
import Titre from "../../../components/UI/Titres/TitreH1";
import oiseau1 from "../../../assets/images/oiseau1.jpg";
import oiseau2 from "../../../assets/images/oiseau2.jpg";
import oiseau3 from "../../../assets/images/oiseau3.jpg";
import Bouton from '../../../components/UI/Bouton/Bouton';
import Slider from '../../../components/Slider/Slider'


class Accueil extends Component {
    componentDidMount = () => {
        document.title = "SEOR";

    }

    render() {

        return (
            <div>
                <Slider/>
                <Titre className='display-3'>Recensement et observations </Titre>
                <div className="container">
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, placeat! 
                        Accusantium quaerat consequuntur assumenda est accusamus vel delectus libero ipsam 
                        doloremque non maxime tempora aut, dolorum, dolore minus dolorem neque?
                    </p>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, placeat! 
                        Accusantium quaerat consequuntur assumenda est accusamus vel delectus libero ipsam 
                        doloremque non maxime tempora aut, dolorum, dolore minus dolorem neque?
                        Quisque penatibus at! Hic quibusdam laboriosam convallis integer. Mi nostrum 
                        conubia hendrerit congue diamlorem, nam, eveniet interdum et, fringilla. Placerat.
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, placeat! 
                        Accusantium quaerat consequuntur assumenda est accusamus vel delectus libero ipsam 
                        doloremque non maxime tempora aut, dolorum, dolore minus dolorem neque?
                        Quisque penatibus at! Hic quibusdam laboriosam convallis integer. Mi nostrum 
                        conubia hendrerit congue diamlorem, nam, eveniet interdum et, fringilla. Placerat.

                    </p><br></br><br></br>
                    <div>
                        <a href = 'https://buy.stripe.com/test_3cseVfbeR5wK81idQQ' className="text-decoration-none">
                        <Bouton typeBtn="btn btn-lg btn-success btn-block mb-5">
                            FAIRE UN DON POUR NOUS SOUTENIR
                        </Bouton></a>
                    </div><br></br>
                    <div className="row align-items-center">
                        <div className="col-12 col-md-6">
                            <img src={oiseau1} alt='logo du site' className="img-fluid p-4" />
                        </div>
                        <div className="col-12 col-md-6">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, placeat! 
                            Accusantium quaerat consequuntur assumenda est accusamus vel delectus libero ipsam 
                            doloremque non maxime tempora aut, dolorum, dolore minus dolorem neque?
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, placeat! 
                            Accusantium quaerat consequuntur assumenda est accusamus vel delectus libero ipsam 
                            doloremque non maxime tempora aut, dolorum, dolore minus dolorem neque?Dictum ultricies 
                            habitant nihil felis mauris. Autem doloribus necessitatibus, distinctio veritatis voluptatum,
                            sint maxime neque turpis ipsam torquent delectus felis.Dictum ultricies habitant nihil felis 
                            mauris. Autem doloribus necessitatibus, distinctio veritatis voluptatum, sint maxime neque 
                            turpis ipsam torquent delectus felis.
                        </div>
                        <div className="col-12 col-md-6">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, placeat! 
                            Accusantium quaerat consequuntur assumenda est accusamus vel delectus libero ipsam 
                            doloremque non maxime tempora aut, dolorum, dolore minus dolorem neque?
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, placeat! 
                            Accusantium quaerat consequuntur assumenda est accusamus vel delectus libero ipsam 
                            doloremque non maxime tempora aut, dolorum, dolore minus dolorem neque?Dictum ultricies 
                            habitant nihil felis mauris. Autem doloribus necessitatibus, distinctio veritatis voluptatum,
                            sint maxime neque turpis ipsam torquent delectus felis.Dictum ultricies habitant nihil felis 
                            mauris. Autem doloribus necessitatibus, distinctio veritatis voluptatum, sint maxime neque 
                            turpis ipsam torquent delectus felis.
                        </div>
                        <div className="col-12 col-md-6">
                            <img src={oiseau2} alt='logo du site' className="img-fluid p-4" />
                        </div><br></br><br></br>
                        <div className="col-12 col-md-6">
                            <img src={oiseau3} alt='logo du site' className="img-fluid p-4" />
                        </div>
                        <div className="col-12 col-md-6">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, placeat! 
                            Accusantium quaerat consequuntur assumenda est accusamus vel delectus libero ipsam 
                            doloremque non maxime tempora aut, dolorum, dolore minus dolorem neque?
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio, placeat! 
                            Accusantium quaerat consequuntur assumenda est accusamus vel delectus libero ipsam 
                            doloremque non maxime tempora aut, dolorum, dolore minus dolorem neque?Dictum ultricies 
                            habitant nihil felis mauris. Autem doloribus necessitatibus, distinctio veritatis voluptatum,
                            sint maxime neque turpis ipsam torquent delectus felis.Dictum ultricies habitant nihil felis 
                            mauris. Autem doloribus necessitatibus, distinctio veritatis voluptatum, sint maxime neque 
                            turpis ipsam torquent delectus felis.
                        </div>
                    </div><br></br><br></br>
                    <div>
                        <a href = 'https://buy.stripe.com/test_3cseVfbeR5wK81idQQ' className="text-decoration-none">
                        <Bouton typeBtn="btn-lg btn-success btn-block mt-5">
                            FAIRE UN DON POUR NOUS SOUTENIR
                        </Bouton></a>
                    </div>
                </div>
            </div>
        );
    }
}

export default Accueil;