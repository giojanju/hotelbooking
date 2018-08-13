import React from 'react';
import { Link } from 'react-router-dom';

const hotel = (props) => {
	let hotelInfoList = null;
	if (props.services && props.services.length > 0) {
		hotelInfoList = (
			<div className="d-flex">
				<div className="col-xs-6">
		            <ul className="list-unstyled">
		            	{props.services.map((cur, i) => {
		            		return i <= 2 ? <li key={i}><i className="fa fa-check-circle"></i>{cur.title}</li> : ''
		            	})}
		            </ul>
				</div>
				<div className="col-xs-6">
		            <ul className="list-unstyled">
		            	{props.services.map((cur, i) => {
		            		return i >= 3 ? <li key={i}><i className="fa fa-check-circle"></i>{cur.title}</li> : ''
		            	})}
		            </ul>
				</div>        
			</div>
		)
	}


	return (
		<div className="col-md-4">
			<div className="room-thumb">
				<img width="100%" src={`/media/${props.media[0].id}/${props.media[0].file_name}`} />
				<div className="mask">
					<div className="main main d-flex justify-content-between align-items-center">
						<h5>{props.name}</h5>
						<div className="price">$ {props.price}<span>a night</span></div>
					</div>
					<div className="content">
					    <p><span>{props.title}</span> 
					    	{props.descripion} 
					    </p>
		                {hotelInfoList}
					    <Link to={`/hotels/${props.id}`} className="btn btn-primary btn-block">Read More</Link>
					</div>
				</div>
			</div>
		</div>
	);
};

export default hotel;