import React, { Component } from 'react';
import { NavLink } from 'react-router-dom';

import './Footer.css';

class Footer extends Component {
	render() {
		return (
			<footer id="footer">
				<div className="container">
					<div className="row">
						<div className="col-md-4">
							<h6>ABOUT</h6>
							<p>
								Flexitravel is a Georgian tour operator for travelers seeking life-changing travel experiences and adventures. Our experience allows us to provide tours not only in Georgia, but in the region of whole Caucasus- Armenia and Azerbaijan. We offer top-quality services on the basis of our team’s rich experience in all the fields of 
							</p>
						</div>
						<div className="col-md-4">
							<h6>SUBSCRIBE</h6>

							<p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpa!</p>
							<form>
						        <div className="form-group">
						          	<input name="newsletter" type="text" id="newsletter" value="" className="form-control" placeholder="Please enter your E-mailaddress" />
						        </div>
						        <button type="submit" className="btn btn-lg btn-black btn-block">Submit</button>
						    </form>
						</div>
						<div className="col-md-4">
							<h6>CONTACT</h6>
							<p>Email: info@sharehotel.ge</p>
							<p>Phone: 555 555 555</p>
						</div>
					</div>
				</div>
				<div className="footer-bottom">
					<div className="container">
						<div className="d-flex align-items-center justify-content-between">
							<div>&copy; 2018 Starhotel All Rights Reserved</div>
							<div><a href="#">Contact</a></div>
						</div>
					</div>
				</div>
			</footer>
		);
	}
}

export default Footer;