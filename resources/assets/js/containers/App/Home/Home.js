import React, { Component } from 'react';
import Slider from '../../../components/Header/Slider/Slider';
import IncomeCounter from '../../../components/Header/IncomeCounter/IncomeCounter';
import Hotel from '../../../components/Hotel/Hotel';
import axios from '../../../axios';

import './Home.css';

class Home extends Component {
	constructor () {
		super();

		this.state = {
			hotels: [],
		};
	}

	componentDidMount() {
		axios.post('hotels/json', null).then(re => {
			if (re.data.succes) {
				this.setState({
					hotels: re.data.data,
				});

			}
		}).catch(er => {
			console.log(er);
		});

		console.log(this.state.hotels);	
	}

	render() {
		const { hotels } = this.state;

		return (
			<div>
				<Slider />
				<IncomeCounter />
				<section id="rooms">
					<div className="container">
						<div className="row">
							<div className="col-md-12 px-0 pt-5">
								<h2 className="lined-heading"><span>Guests Favorite Rooms</span></h2>
							</div>	
						</div>
						<div className="row">
							{hotels.map((hotel, index) => {
								return <Hotel key={index} hotel={hotel}/>
							})}
						</div>
					</div>
				</section>
			</div>
		);
	}
}

export default Home;