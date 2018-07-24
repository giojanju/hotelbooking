import React, { Component } from 'react';
import { NavLink } from 'react-router-dom';
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
	        isOpen: false
	    };
	
	    this.toggle = this.toggle.bind(this);
	}
    toggle() {
	    this.setState({
	      isOpen: !this.state.isOpen
	    });
	}

	render() {
		return (
			<section id="reservation-form">
				<div className="container">
					<Form>
						<div className="row">
							<div className="col-md-3">
								<FormGroup>
							        <Label for="email">Email</Label>
							        <Input type="text" name="email" id="email" placeholder="Your email" />
						        </FormGroup>
							</div>
							<div className="col-md-3">
						        <FormGroup>
							        <Label for="address">Address</Label>
							        <Input type="text" name="address" id="address" placeholder="Your address" />
						        </FormGroup>
							</div>
							<div className="col-md-3">
						        <FormGroup>
							        <Label for="rooms">Select</Label>
							        <Input type="select" name="rooms" id="rooms">
							            <option value="1">1</option>
							            <option value="2">2</option>
							            <option value="3">3</option>
							            <option value="4">4</option>
							            <option value="5">5</option>
							        </Input>
						        </FormGroup>
							</div>
							<div className="col-md-3">
						        <Button color="primary" block>Counting</Button>
							</div>
						</div>
					</Form>
				</div>
			</section>
		);
	}
}

export default IncomeCounter;