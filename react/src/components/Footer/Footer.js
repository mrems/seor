import React from "react";
// import seor from "../../assets/images/footer/seor.png";
// import cr from "../../assets/images/footer/cr.png";
// import onf from "../../assets/images/footer/onf.png";

// import {NavLink} from "react-router-dom";
// import classes from "./Footer.module.css";
// import "../../components/Footer/Footer.module.css" ;

const footer = (props) => (
    <>
        <footer>
        
          
          <div >
              <div className=" row justify-content-center media">
              <ul className="col-md-12 text-center pt-5 pb-3">
                <li><i className="fa-brands fa-facebook"></i></li>
                <li><i className="fa-brands fa-instagram"></i></li>
                <li><i className="fa-brands fa-youtube"></i></li>
              </ul>
              </div>
              <div className="copyright pt-3 pb-3 text-center">
                <p> Copyright SEOR © 2023 </p>
              </div>
          </div>
          
        </footer>
    </>
);

export default footer;