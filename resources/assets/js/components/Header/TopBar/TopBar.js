import React from 'react';
import './TopBar.css';

const topbar = () => (
	<div className="top-bar-container">
		<div className="container">
			<div className="row">
				<div className="col-md-6">
					<div className="contact-info">
						<nav className="nav">
							<a className="nav-link pl-3 phone" href="#"><i className="fa fa-phone"></i> 555 555 555</a>
							<a className="nav-link" href="#"><i className="fa fa-envelope"></i> info@gmail.com</a>
						</nav>
					</div>
				</div>
				<div className="col-md-6">
					<div className="social-info">
						<nav className="nav float-right">
							<a className="nav-link p-2" href="#"><i className="fa fa-facebook"></i></a>
							<a className="nav-link p-2" href="#"><i className="fa fa-twitter"></i></a>
							<a className="nav-link p-2" href="#"><i className="fa fa-youtube-play"></i></a>
						</nav>
					</div>
				</div>
			</div>
		</div>	
	</div>
);

export default topbar;