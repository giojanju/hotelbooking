import React, { Component } from 'react';
import Slider from '../../../components/Header/Slider/Slider';
import Pricing from '../../../components/Pricing/Pricing';

import axios from '../../../axios';
import './Pricings.css';

class Pricings extends Component {
	constructor(props) {
		super(props);

		this.state = {
			pricing: [
				{
					title: 'ერთჯერადი მომსახურება',
					text: 'ჩვენ გთავაზობთ ერთჯერად სერვისებს',
					price: 'ფასი: 250 ლარი',
				},
				{
					title: 'უნივერსალური',
					text: 'ჩვენ ვმართავთ ბინას და ვიღებთ საკომისიოს მთლიანი შემოსავლიდან',
					price: '15%-დან',
				},
				{
					title: 'ფიქსირებული',
					text: 'მთლიანად ვმართავთ ბინას და ვიხდით წინასწარ შეთანხმებულ თანხას ყოველთვიურად',
					price: 'წინასწარ შეთანხმებული თანხა',
				}
			],
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
							{this.state.pricing.map((price, index) => {
								return <Pricing key={index} price={price} />
							})}
						</div>
					</div>
				</section>
			</div>
		);
	}
}

export default Pricings;