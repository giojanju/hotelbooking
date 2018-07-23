import React, { Component } from 'react';
import { NavLink } from 'react-router-dom';
import { 
	Collapse, 
	Navbar, 
	NavbarToggler, 
	NavbarBrand, 
	Nav, 
	NavItem
} from 'reactstrap';
import './NavBar.css';


class Navigationbar extends Component {
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
			<Navbar color="light" light expand="md">
			    <div className="container">
			    	<NavLink to="/" className="navbar-brand"><img src="/img/logo.png" /></NavLink>
				    <NavbarToggler onClick={this.toggle} />
				    <Collapse isOpen={this.state.isOpen} navbar>
				        <Nav className="mr-auto" navbar>
				            <NavItem className="nav-item">
				                <NavLink className="nav-link" to="/">Home</NavLink>
				            </NavItem>
				            <NavItem className="nav-item">
				                <NavLink className="nav-link" to="/test">About</NavLink>
				            </NavItem>
				        </Nav>
				    </Collapse>
			    </div>
			</Navbar>
		);
	}
}

export default Navigationbar;