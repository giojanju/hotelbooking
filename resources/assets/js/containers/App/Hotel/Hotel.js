import React, { Component } from 'react';

import axios from '../../../axios';
import Swiper from 'react-id-swiper';
import './Hotel.css';

class Home extends Component {
	constructor (props) {
		super(props);

		this.state = {
			hotel: [],
		};
	}

	componentDidMount() {
		const { match } = this.props;

		axios.post(`hotels/json/${parseInt(match.params.id)}`, null).then(re => {
			if (re.data.success) {
				this.setState({
					hotel: re.data.data,
				});

			}
		}).catch(er => {
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

	    const { media } = this.state.hotel;
	    let mediaImgs = null;

	    if (media !== undefined) {
	    	mediaImgs = media.map(img => {
	    		return  (<div key={img.id}>
	    					<img width="100%" src={`/media/${img.order_column}/${img.file_name}`} />
	    				</div>);
	    	});
	    }

		return (
			<div>
				<section id="inner-cover">
					<div className="container">
						<h3>Tour detail</h3>
					</div>
				</section>
				<section id="inner-hotel-content">
					<div className="container">
						<div className="row">
							<div className="col-md-8">
								<Swiper {...params}>
							        {mediaImgs}
							    </Swiper>
							</div>
							<div className="col-md-4">
								right
							</div>
						</div>
					</div>
					<div className="container">
						<div className="row">
							<div className="col-md-7">
								<div>
									<div className="col-md-12 px-0 pt-5">
										<h2 className="lined-heading">
											<span>დეტალური ინფორმაცია</span>
										</h2>
									</div>	
								</div>
							</div>
							<div className="col-md-5">
								<div>
									<div className="col-md-12 px-0 pt-5">
										<h2 className="lined-heading">
											<span>აღწერა</span>
										</h2>
										<div className="mt-5">
											<p>{this.state.hotel.description}</p>
										</div>
									</div>	
								</div>
							</div>						
						</div>
					</div>
				</section>
			</div>
		);
	}
}

export default Home;