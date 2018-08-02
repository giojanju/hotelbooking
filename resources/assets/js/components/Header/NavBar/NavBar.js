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
	        isOpen: false,
	        fixed: '',
	    };
	
	    this.toggle = this.toggle.bind(this);
	}
    toggle() {
	    this.setState({
	      isOpen: !this.state.isOpen
	    });
	}

	componentDidMount(){
		window.addEventListener('scroll', (event) => {
		  	if (window.scrollY >= 42) {
		  		this.setState({
		  			fixed: 'fixed-top',
		  		})
		  	} else {
		  		this.setState({
		  			fixed: '',
		  		})
		  	}
		});
	}

	render() {
		return (
			<Navbar color="light" className={this.state.fixed} light expand="md">
			    <div className="container">
			    	<NavLink to="/" className={`navbar-brand`}><img src="/img/logo.png" /></NavLink>
				    <NavbarToggler onClick={this.toggle} />
				    <Collapse isOpen={this.state.isOpen} navbar>
				        <Nav className="mr-auto" navbar>
				            <NavItem className="nav-item">
				                <NavLink className="nav-link" to="/">Home</NavLink>
				            </NavItem>
				            <NavItem className="nav-item">
				                <NavLink className="nav-link" to="/test">About</NavLink>
				            </NavItem>
				            <NavItem className="nav-item">
				                <NavLink className="nav-link" to="/pricing">Pricing</NavLink>
				            </NavItem>
				        </Nav>
				    </Collapse>
			    </div>
			</Navbar>
		);
	}
}

export default Navigationbar;