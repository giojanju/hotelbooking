import React from 'react';
import { Link } from 'react-router-dom';

const hotel = (props) => {
	let hotelInfoList = null;
	if (props.hotel.params.length > 0) {
		hotelInfoList = (
			<div className="d-flex">
				<div className="col-xs-6">
		            <ul className="list-unstyled">
		            	{props.hotel.params.map((cur, i) => {
		            		return i <= 2 ? <li key={i}><i className="fa fa-check-circle"></i>{cur}</li> : ''
		            	})}
		            </ul>
				</div>
				<div className="col-xs-6">
		            <ul className="list-unstyled">
		            	{props.hotel.params.map((cur, i) => {
		            		return i >= 3 ? <li key={i}><i className="fa fa-check-circle"></i>{cur}</li> : ''
		            	})}
		            </ul>
				</div>        
			</div>
		)
	}


	return (
		<div className="col-md-4">
			<div className="room-thumb">
				<img width="100%" src={props.hotel.image} />
				<div className="mask">
					<div className="main main d-flex justify-content-between align-items-center">
						<h5>{props.hotel.name}</h5>
						<div className="price">$ {props.hotel.price}<span>a night</span></div>
					</div>
					<div className="content">
					    <p><span>{props.hotel.title}</span> 
					    	{props.hotel.descripion} 
					    </p>
		                {hotelInfoList}
					    <Link to={`/hotels/${props.hotel.slug}`} className="btn btn-primary btn-block">Read More</Link>
					</div>
				</div>
			</div>
		</div>
	);
};

export default hotel;