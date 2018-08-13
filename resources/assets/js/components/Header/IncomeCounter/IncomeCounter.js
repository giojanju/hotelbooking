import React, { Component } from 'react';
import { NavLink } from 'react-router-dom';
import axios from '../../../axios';
import { 
	FormGroup,
	Form,
	Input,
	Label,
	Button
} from 'reactstrap';
import './IncomeCounter.css';

class IncomeCounter extends Component {

	constructor(props) {
		super(props);

		this.state = {
			email: '',
			address: '',
			rooms: '',
			errors: [],
			success: null,
		}

		this.handleFieldChange = this.handleFieldChange.bind(this);
		this.hasErrorFor = this.hasErrorFor.bind(this);
		this.renderErrorFor = this.renderErrorFor.bind(this);
		this.createNewRespond = this.createNewRespond.bind(this);
	}

	handleFieldChange(event) {
		this.setState({
			[event.target.name]: event.target.value,
		});
	}

	hasErrorFor (field) {
		return this.state.errors[field];
	}

	renderErrorFor (field) {
		if (this.hasErrorFor(field)) {
			return (
				<span className='invalid-feedback'>
	              	<strong>{this.state.errors[field][0]}</strong>
	            </span>
			);
		}
	}

	createNewRespond(event) {
		event.preventDefault();

		const data = {
			email: this.state.email,
			address: this.state.address,
			rooms: this.state.rooms,
		};

		axios.post('responds/create', data).then(re => {
			if (!re.data.success) {
				this.setState({
					errors: re.data.errors,
				})
			} else if (re.data.success) {
				this.setState({
					success: 'მონაცემები წარმატებით გაიგზავნა',
					email: '',
					address: '',
					rooms: '',
				});
			}
		})
		.catch(error => {
			this.setState({
				errors: error.response.data.errors
			})
		})
	}

	render() {

		let success = null;

		if (this.state.success) {
			success = (
				<div className="alert alert-success alert-dismissible fade show" role="alert">
				  	{this.state.success}
				</div>
			);
		}

		return (
			<section id="reservation-form">
				<div className="container">
					{success}
					<Form onSubmit={this.createNewRespond}>
						<div className="row">
							<div className="col-md-3">
								<FormGroup>
							        <Label for="email">ელ-ფოსტა</Label>
							        <Input 
							        	type="text" 
							        	onChange={this.handleFieldChange} 
							        	name="email" 
							        	id="email" 
							        	className={`form-control ${this.hasErrorFor('email') ? 'is-invalid' : ''}`}
							        	placeholder="თქვენი ელ-ფოსტა" />

							        {this.renderErrorFor('email')}
						        </FormGroup>
							</div>
							<div className="col-md-3">
						        <FormGroup>
							        <Label for="address">მისამართი</Label>
							        <Input 
							        	type="text" 
							        	onChange={this.handleFieldChange} 
							        	name="address" 
							        	id="address" 
							        	className={`form-control ${this.hasErrorFor('address') ? 'is-invalid' : ''}`}
							        	placeholder="სასტუმროს მისამართი" />
							        {this.renderErrorFor('address')}
						        </FormGroup>
							</div>
							<div className="col-md-3">
						        <FormGroup>
							        <Label for="rooms">ოთახების რაოდენობა</Label>
							        <Input onChange={this.handleFieldChange} type="select" name="rooms" id="rooms">
							            <option value="1">1</option>
							            <option value="2">2</option>
							            <option value="3">3</option>
							            <option value="4">4</option>
							            <option value="5">5</option>
							        </Input>
						        </FormGroup>
							</div>
							<div className="col-md-3">
						        <Button color="primary" block>გაგზავნა</Button>
							</div>
						</div>
					</Form>
				</div>
			</section>
		);
	}
}

export default IncomeCounter;