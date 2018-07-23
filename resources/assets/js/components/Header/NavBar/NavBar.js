import React from 'react';
import { NavLink } from 'react-router-dom';
import './NavBar.css';

const navbar = () => (
	<nav className="navbar navbar-expand-md navbar-light bg-light">
	    <div className="container">
	    	<NavLink to="/" className="navbar-brand"><img src="/img/logo.png" /></NavLink>
		    <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span className="navbar-toggler-icon"></span>
		    </button>
		    <div className="collapse navbar-collapse" id="navbarSupportedContent">
		        <ul className="navbar-nav mr-auto">
		            <li className="nav-item">
		                <NavLink className="nav-link" to="/">Home</NavLink>
		            </li>
		            <li className="nav-item">
		                <NavLink className="nav-link" to="/test">About</NavLink>
		            </li>
		        </ul>
		    </div>
	    </div>
	</nav>
);

export default navbar;