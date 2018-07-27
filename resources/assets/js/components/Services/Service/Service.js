import React from 'react';

const service = (props) => {
	return (
		<div className="col-md-4 text-center">
			<div><i className={props.service.icon}></i></div>
			<h5>{props.service.title}</h5>
		</div>
	);
};

export default service;