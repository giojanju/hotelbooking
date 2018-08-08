import React, { Component } from 'react';
import Service from '../../../components/Services/Service/Service';
import axios from '../../../axios';
import './Services.css';

class Services extends Component {
	constructor(props) {
		super(props);

		this.state = {
			services: [],
		};
	}

	componentDidMount() {
		axios.post('services/json', null).then(re => {
			if (re.data.succes) {
				this.setState({
					services: re.data.data,
				});
			}
		}).catch(er => {
			console.log(er)
		})
	}

	render() {
		return (
			<div className="services-inner">
				<section id="services-cover">
					<h3>გაზარდე შემოსავალი და მეტი თავისუფალი დრო</h3>
				</section>
				<section id="services" className="mt-5">
					<div className="container">
						<h2 className="text-center">Our Services</h2>
						<div className="row">
							{this.state.services.map((service, index) => {
								return <Service key={index} service={service} />
							})}
						</div>
					</div>	
				</section>
			</div>
		);
	}
}

export default Services;