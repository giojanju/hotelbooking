import React, { Component } from 'react';
import Swiper from 'react-id-swiper';

export default class Slider extends Component {
	render() {
	    const params = {
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev'
			},
			autoplay: {
		        delay: 3500,
		        disableOnInteraction: false
		    },
	    }

	    return (
		    <Swiper {...params}>
		        <div><img src="/img/slide1.jpg" /></div>
		        <div><img src="/img/slide2.jpg" /></div>
		    </Swiper>
	    )
	}
}