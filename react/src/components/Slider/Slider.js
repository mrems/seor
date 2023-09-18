import "react-responsive-carousel/lib/styles/carousel.min.css"; 
import { Carousel } from 'react-responsive-carousel';
import "../../components/Slider/Slider.css" ;
import carousel1 from "../../assets/images/carousel1.jpg";
import carousel2 from "../../assets/images/carousel2.jpg";
import carousel3 from "../../assets/images/carousel3.jpg";
// import carousel4 from "../../assets/images/carousel4.jpg";

function Slider () {

    const datas = [
        {
            id: 1,
            image:carousel1,
            title:'Protègeons nos oiseaux',
            text: 'protèz nout bann zoizo'
        },
        {
            id: 2,
            image:carousel2,
            title:'Des espèces en danger',
            text: "band zespès i trouv pu"
        },
        {
            id: 3,
            image:carousel3,
            title:'Notre patrimoine',
            text: 'nout zoizo'
        },
        // {
        //     id: 4,
        //     image:carousel4,
        //     title:'Notre patrimoine',
        //     text: 'nout zoizo'
        // }
        
        ]

    return (

            <Carousel
                autoPlay 
                infiniteLoop
                interval={9000}
                transitionTime={4000}
                showStatus={false}
                animationHandler={'fade'}
                swipeable={false}

            >
                { datas.map (slide => (
                    <div key={slide.id}>
                        <img src={slide.image} alt=''/>
                        <div className='overlay'>
                            <h2 className='overlay_title'>{slide.title}</h2>
                            <p className='overlay_text'>{slide.text}</p>
                        </div>
                    </div>
                ))}
            </Carousel>
    )
}

export default Slider