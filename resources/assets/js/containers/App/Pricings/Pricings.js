import React, { Component } from 'react';
import Slider from '../../../components/Header/Slider/Slider';
import Pricing from '../../../components/Pricing/Pricing';

import axios from '../../../axios';
import './Pricings.css';

class Pricings extends Component {
	constructor(props) {
		super(props);

		this.state = {
			pricing: [],
		};
	}

	componentDidMount() {
		// call to axion
	}

	render() {
		return (
			<div>
				<Slider />
				<section id="pricing">
					<div className="container">
						<h2>სამი სხვადასხვა მომსახურების პაკეტი</h2>
						<div className="row">
							<Pricing />
							<div className="col-md-4">
								2
							</div>
							<div className="col-md-4">
								3
							</div>
						</div>
					</div>
				</section>
			</div>
		);
	}
}

export default Pricings;