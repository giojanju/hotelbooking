import React, { Component } from 'react';
import Swiper from 'react-id-swiper';

import axios from '../../../axios';

export default class Slider extends Component {
	
	constructor (props) {
		super(props);

		this.state = {
			sliders: [],
		};
	}

	componentDidMount () {
		axios.post('sliders/json').then(re => {
			this.setState({
				sliders: re.data.data,
			})
		})
		.catch(er => {
			console.log(er);
		});
	}

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
		    	{this.state.sliders.map(me => {
			        return <div key={me.id}><img src={`media/${me.media[0].order_column}/${me.media[0].file_name}`} /></div>
				})}
		    </Swiper>
	    )
	}
}