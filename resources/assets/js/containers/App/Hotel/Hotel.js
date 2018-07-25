import React, { Component } from 'react';

import axios from '../../../axios';

class Home extends Component {
	constructor (props) {
		super(props);

		this.state = {
			hotel: [],
		};

		console.log(this.props)
	}

	componentDidMount() {
		const { match } = this.props;

		axios.post(`hotels/json/${parseInt(match.params.id)}`, null).then(re => {
			if (re.data.succes) {
				this.setState({
					hotel: re.data.data,
				});

			}
		}).catch(er => {
			console.log(er);
		});

		console.log(this.state.hotels);	
	}

	render() {
		return (<h1>Inner HOtel</h1>);
	}
}

export default Home;