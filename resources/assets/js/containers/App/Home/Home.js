import React, { Component } from 'react';

import Hotel from '../../../components/Hotel/Hotel';

import './Home.css';

class Home extends Component {
	constructor () {
		super();

		this.state = {
			hotels: [
				{
					name: 'Hotel name',
					price: 99,
					title: 'A modern hotel room in Star Hotel',
					description: 'Nunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque',
					slug: 'hotel-name',
					image: '/img/hotel1.jpg',
					params: [
						'Incl. breakfast',
						'Private balcony',
						'Sea view',
						'Free Wi-Fi',
						'DIncl. breakfast',
						'Bathroom',
					],
				},
				{
					name: 'Hotel name 2',
					price: 120,
					title: 'A modern hotel room in Star Hotel',
					description: 'Nunc tempor erat in magna pulvinar fermentum. Pellentesque scelerisque',
					slug: 'hotel-name2',
					image: '/img/hotel1.jpg',
					params: [
						'Incl. breakfast',
						'Private balcony',
						'Sea view',
						'Free Wi-Fi',
						'DIncl. breakfast',
						'Bathroom',
					],
				}
			]
		};
	}

	render() {
		return (
			<section id="rooms">
				<div className="container">
					<div className="row">
						<div className="col-md-12 px-0 pt-5">
							<h2 className="lined-heading"><span>Guests Favorite Rooms</span></h2>
						</div>	
					</div>
					<div className="row">
						{this.state.hotels.map((hotel, index) => {
							return <Hotel key={index} hotel={hotel}/>
						})}
					</div>
				</div>
			</section>
		);
	}
}

export default Home;