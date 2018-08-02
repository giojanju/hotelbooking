import React, { Component } from 'react';

import axios from '../../../axios';
import './Pricing.css';

class Pricing extends Component {
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
				<h1 className="p-5">Pricing</h1>
			</div>
		);
	}
}

export default Pricing;